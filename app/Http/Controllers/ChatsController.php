<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Events\Receive;
use App\Models\AutoResponder;
use App\Services\ChatService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\WhatsappInstance;
use App\Models\WhatsappContact;
use App\Models\WhatsappMessage;
use Exception;
use Response;

class ChatsController extends Controller
{
    // public function chats(Request $request)
    // {
    //     $chats = WhatsappInstance::where('status', '=', 1)->get();

    //     $data = [
    //         'chats' => $chats,
    //     ];

    //     return view('chats', $data);
    // }
    public function chats(Request $request)
    {
        $chats = WhatsappInstance::where('status', '=', 1)->get();

        $data = [
            'chats' => $chats,
        ];

        return view('chats.index', $data);
    }

    public function chat(Request $request, $id)
    {
        $instance = WhatsappInstance::find($id);
        if ($instance->status == 0) {
            return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
        }
        $contacts = ChatService::getChatData($id);
        $profile = $instance->instance_profile ?? auth()->user()->profile;

        $data = [
            'contacts' => $contacts,
            'instance_id' => $id,
            'profile' => $profile,
        ];

        return view('chats.chat', $data);
    }

    public function searchContacts(Request $request, $id)
    {
        $instance = WhatsappInstance::find($id);
        if ($instance->status == 0) {
            return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
        }
        $searchTerm = $request->input('searchTerm');
        $contacts = ChatService::getChatData($id, $searchTerm);
        $profile = $instance->profile ?? auth()->user()->profile;

        return response()->json(['contacts' => $contacts, 'instance_id' => $id, 'profile' => $profile]);
    }

    public function message(Request $request)
    {
        $decodedJson = json_decode($request->getContent(), true);
        if (isset($decodedJson['imageUrl']) && $decodedJson['imageUrl'] != null && isset($decodedJson['sessionQr']) && $decodedJson['sessionQr'] != null) {
            $instance = WhatsappInstance::where('session_name', '=', $decodedJson['sessionQr'])->first();
            $instance->qr_code = $decodedJson['imageUrl'];
            $instance->save();
        }
        event(new Receive($decodedJson, 'QR-channel', 'QR'));

        return response()->json(['message' => 'Connected Successfully', 'session' => $decodedJson['sessionQr']]);
    }

    public function statusSession(Request $request)
    {
        $decodedJson = json_decode($request->getContent(), true);
        if ($decodedJson['status'] == 'successChat') {
            $instance = WhatsappInstance::where('session_name', '=', $decodedJson['session'])->first();
            if ($instance->status == 0) {
                $instance->status = 1;
                $instance->qr_code = null;
                $instance->save();
            }
        }
        event(new Receive($decodedJson, 'QR-channel', 'QR'));

        return response()->json(['message' => 'status Connected Successfully']);
    }

    public function selfInfo(Request $request)
    {
        $decodedJson = json_decode($request->getContent(), true);
        if ($decodedJson['status'] == 'successChat') {
            $instance = WhatsappInstance::where('session_name', '=', $decodedJson['session'])->first();
            $instance->instance_username = $decodedJson['name'];
            $instance->instance_phone = $decodedJson['phone'];
            $instance->instance_profile = $decodedJson['profile'];
            $instance->save();
        }

        return response()->json(['message' => 'Instance Updated Successfully']);
    }

    public function disconnection(Request $request)
    {
        $decodedJson = json_decode($request->getContent(), true);
        if ($decodedJson['state'] == 'DISCONNECTED') {
            DB::table('whatsapp_instances')
                ->where('instance_phone', $decodedJson['phone'])
                ->update(['status' => 0]);
        }
    }

    public function unplug(Request $request, $id)
    {
        $instance = WhatsappInstance::find($id);
        if (empty($instance)) {
            return response()->json(['message' => 'Instance not found']);
        }
        $url = env('MESSAGE_API_URL') . '/whatsapp/close-session';
        try {
            $response = Http::get($url);
            if ($response['success'] == true) {
                $instance->status = 0;
                $instance->save();
                // Return a JSON response indicating that the message was sent
                return response()->json(['success' => true, 'message' => 'Session unplug successfully']);
            } else {

                // Return a JSON response indicating the failure to send the message
                return response()->json(['message' => 'Failed to unplug']);
            }
        } catch (\Exception $e) {
            Log::error($e);
            // Handle any exceptions that may occur during the HTTP request
            return response()->json(['message' => 'An error occurred while unplugging the session'], 500);
        }
    }

    public function createSession(Request $request, $id)
    {
        $instance = WhatsappInstance::find($id);
        if (empty($instance)) {
            return response()->json(['message' => 'Instance not found']);
        }
        $data = [
            'sessionName' => $instance->session_name,
        ];
        // Define the URL of the endpoint
        $url = env('MESSAGE_API_URL') . '/whatsapp/create-session';

        // Make a POST request to the endpoint
        // $response['status'] = 200;
        $response = Http::post($url, $data);

        // Check if the request was successful (status code 200)
        if ($response['success'] == true) {
            // Return a JSON response indicating that the message was sent
            return response()->json(['success' => true, 'message' => 'Session created successfully']);
        } else if (empty($response)) {

            // Return a JSON response indicating the failure to send the message
            return response()->json(['message' => 'QR Code is generating']);
        } else {

            // Return a JSON response indicating the failure to send the message
            return response()->json(['message' => 'Failed to create session']);
        }
    }

    public function send(Request $request)
    {
        // Validate the request data (you can add more validation rules as needed)
        $this->validate($request, [
            'instance_id' => 'required',
            'whatsapp_user_id' => 'required',
            'sender_id' => 'required',
            'messageTime' => 'required',
            'phone' => 'required',
        ]);

        try {
            $instance = WhatsappInstance::find($request->input('instance_id'));
            if (empty($instance)) {
                // Phone number is not unique
                return redirect()->route('instances')->with('status', 'Instância não encontrada');
            }
            if ($instance->status == 0) {
                return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
            }

            // Start a database transaction
            DB::beginTransaction();
            if (auth()->user()->id == $request->input('sender_id')) {
                $whatsappContact = WhatsappContact::find($request->input('whatsapp_user_id'));
                $whatsappContact->lastMessageTime = date('Y-m-d H:i:s');
                $whatsappContact->save();
                // Create a new WhatsappMessage instance and populate it with the request data
                $whatsappMessage = new WhatsappMessage();
                $whatsappMessage->whatsapp_user_id = $request->input('whatsapp_user_id');
                $whatsappMessage->sender_id = $request->input('sender_id');
                $whatsappMessage->messageTime = $request->input('messageTime');
                $whatsappMessage->messageText = $request->input('message');
                $whatsappMessage->status = 1;

                // Prepare the data to send in the request
                $data = [
                    'to' => $request->input('phone') . '@c.us',
                    'message' => $request->input('message'),
                    'messageType' => $request->input('messageType'),
                    'messageImg' => $request->input('messageImg'),
                    'messageAudio' => $request->input('messageAudio'),
                    'messageVideo' => $request->input('messageVideo'),
                    'messageDocument' => $request->input('messageDocument'),
                    'messageRecording' => $request->input('messageRecording'),
                    'fileType' => $request->input('fileType'),
                    'fileName' => $request->input('fileName'),
                    'extension' => $request->input('extension'),
                ];
                // Handle different media types
                $mediaTypes = ['messageImg', 'messageAudio', 'messageVideo', 'messageDocument', 'messageRecording'];

                foreach ($mediaTypes as $inputName) {
                    if ($request->has($inputName)) {
                        $base64Data = $request->input($inputName);
                        $extension = $request->input('extension'); // Get the extension from the form
                        $decodedData = base64_decode($base64Data);

                        if ($decodedData !== false) {
                            // Construct the subdirectory path
                            $subdirectory = 'whatsapp';

                            // Generate a unique filename within the subdirectory
                            $filename = $subdirectory . '/' . $request->input('fileName') . '-' . Str::uuid()->toString() . '.' . $extension;
                            // Save the file using Storage::disk
                            Storage::disk('public')->put($filename, $decodedData);
                            $data['fullPath'] = Storage::disk('public')->path($filename);
                            // Build the full URL to access the media
                            $fullUrl = url(Storage::disk('public')->url($filename));
                            // Check if the inputName is one of messageImg, messageAudio, or messageVideo
                            if (in_array($inputName, ['messageImg', 'messageAudio', 'messageVideo'])) {
                                $whatsappMessage->messageMedia = $fullUrl; // Save the filename in the database
                            } else {
                                $whatsappMessage->{$inputName} = $fullUrl; // Save the filename in the database
                            }
                        }
                    }
                }
                // Define the URL of the endpoint
                $url = env('MESSAGE_API_URL') . '/whatsapp/send-message';

                // Make a POST request to the endpoint
                // $response['status'] = 200;
                $response = Http::post($url, $data);

                // Check if the request was successful (status code 200)
                if ($response['erro'] == false) {
                    // Save the instance to the database
                    $whatsappMessage->save();
                    // Update the status of messages to 1
                    DB::table('whatsapp_messages')
                        ->where('whatsapp_user_id', $request->input('whatsapp_user_id'))
                        ->where('status', '=', 0)
                        ->update(['status' => 1]);

                    // Commit the database transaction
                    DB::commit();

                    // Return a JSON response indicating that the message was sent
                    return response()->json(['success' => true, 'message' => 'Message sent successfully', 'response' => $response, 'data' => $data]);
                } else {
                    // The request to the external service was not successful
                    // Roll back the database transaction
                    DB::rollBack();

                    // Return a JSON response indicating the failure to send the message
                    return response()->json(['message' => 'Failed to send message to WhatsApp', 'response' => $response], 500);
                }
            }
        } catch (\Exception $e) {
            // An exception occurred
            // Roll back the database transaction
            DB::rollBack();

            // Log the exception for debugging
            Log::error($e);

            // Return a JSON response indicating an error
            return response()->json(['message' => 'An error occurred while processing the request', 'error' => $e], 500);
        }
    }

    public function autoReply(Request $request)
    {
        try {
            DB::beginTransaction(); // Start a database transaction

            // Get the JSON message from the request
            $data = json_decode($request->getContent(), true);

            // Extract required data
            $phone = (int)str_replace('@c.us', '', $data['from']);
            $session = $data['session'];
            $newContactId = $phone . $session;

            // Iterate over the message chunks and publish them separately
            // Find the record in WhatsappContact based on its 'id' column
            $whatsappInstance = WhatsappInstance::where('session_name', '=', $session)->first();
            $whatsappContact = WhatsappContact::find($newContactId);
            if (!empty($whatsappContact)) {
                $whatsappContact->lastMessageTime = date('Y-m-d H:i:s');
                $whatsappContact->save();
                // Create a new WhatsappMessage instance and populate it with the request data
                $whatsappMessage = new WhatsappMessage();
                $whatsappMessage->whatsapp_user_id = $newContactId;
                $whatsappMessage->sender_id = $whatsappInstance->user_id;
                $whatsappMessage->messageTime = date('h:i A');
                $whatsappMessage->status = 1;

                if ($data['type'] == 'chat') {
                    $whatsappMessage->messageText = $data['content'];
                }
                if ($data['type'] == 'image') {
                    $whatsappMessage->messageMedia = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'ptt') {
                    $whatsappMessage->messageRecording = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'document') {
                    $whatsappMessage->messageDocument = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }

                $whatsappMessage->save();

                // Update the status of messages to 1
                DB::table('whatsapp_messages')
                    ->where('whatsapp_user_id', $newContactId)
                    ->where('status', '=', 0)
                    ->update(['status' => 1]);
                $data['success'] = true;

                $required_content = [
                    'session' => $data['session'],
                    'from' => $data['from'],
                    'content' => $data['content'],
                    'type' => $data['type'],
                    'caption' => $data['caption'],
                    'fileName' => $data['fileName'],
                    'success' => $data['success'],
                    'userId' => $newContactId,
                    'profile' => $whatsappInstance->instance_profile,
                ];
                event(new Receive($required_content, 'reply-channel', 'reply'));
                // $messageContent = $data['content'];
                // $messageChunks = str_split($messageContent, 8192); // Split into 4096-byte chunks (adjust as needed)
                // foreach ($messageChunks as $chunk) {
                //     $chunkData = $data; // Clone the original data
                //     $chunkData['content'] = $chunk; // Replace content with the chunk
                //     // Publish the chunk using Pusher
                // }

                DB::commit(); // Commit the database transaction
                return response()->json(['message' => 'Message replied and saved successfully', 'data' => $data]);
            }
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the database transaction in case of an exception
            // Handle the exception or log it as needed
            Log::error($e);
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function receive(Request $request)
    {
        try {
            DB::beginTransaction(); // Start a database transaction

            // Get the JSON message from the request
            $data = json_decode($request->getContent(), true);

            // Extract required data
            $phone = (int)str_replace('@c.us', '', $data['from']);
            $session = $data['_session'];
            $newContactId = $phone . $session;
            $notifyName = $data['notifyName'];

            $profilePicFull = null;
            if (isset($data['sender']['profilePicThumbObj']['imgFull'])) {
                $profilePicFull = $data['sender']['profilePicThumbObj']['imgFull'];
            }

            // Iterate over the message chunks and publish them separately
            // Find the record in WhatsappContact based on its 'id' column
            $whatsappContact = WhatsappContact::find($newContactId);
            if (!empty($whatsappContact)) {
                // You can access the properties of $whatsappContact as needed
                $whatsappContact->lastMessageTime = date('Y-m-d H:i:s');
                $whatsappContact->username = $notifyName;
                $whatsappContact->profile = $profilePicFull ? $profilePicFull : $whatsappContact->profile;
                $whatsappContact->save();

                if ($data['type'] == 'image' || $data['type'] == 'document' || $data['type'] == 'audio' || $data['type'] == 'ptt' || $data['type'] == 'video') {
                    // Save the base64 content as a file using Laravel Storage
                    $fileContent = base64_decode($data['mediaContent']);
                    $fileExtension = explode('/', $data['mimetype'])[1];
                    if ($data['type'] == 'audio' || $data['type'] == 'ptt') {
                        $mimePart = explode(';', $data['mimetype'])[0];
                        $fileExtension = explode('/', $mimePart)[1];
                    }
                    // Use the provided filename or generate a unique one
                    $fileName = $data['filename'] ?? (Str::uuid()->toString() . '.' . $fileExtension);

                    // Determine the subdirectory based on the type
                    $subdirectory = 'whatsapp'; // You can change this based on the type

                    // Generate a unique filename within the subdirectory
                    $fullPath = $subdirectory . '/' . Str::uuid()->toString() . '' . $fileName;

                    // Save the file using Storage::disk
                    Storage::disk('public')->put($fullPath, $fileContent);

                    // Build the full URL to access the media
                    $blobUrl = url(Storage::disk('public')->url($fullPath));

                    // Update $data['content'] with the blob URL
                    $data['content'] = $blobUrl;
                    $data['body'] = $blobUrl;
                }

                // Create a new WhatsappMessage instance and populate it with the request data
                $whatsappMessage = new WhatsappMessage();
                $whatsappMessage->whatsapp_user_id = $newContactId;
                $whatsappMessage->sender_id = $phone;
                $whatsappMessage->messageTime = date('h:i A');

                if ($data['type'] == 'chat') {
                    $whatsappMessage->messageText = $data['content'];
                }
                if ($data['type'] == 'image') {
                    $whatsappMessage->messageMedia = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'audio') {
                    $whatsappMessage->messageMedia = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'video') {
                    $whatsappMessage->messageMedia = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'ptt') {
                    $whatsappMessage->messageRecording = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }
                if ($data['type'] == 'document') {
                    $whatsappMessage->messageDocument = $data['content'];
                    $whatsappMessage->messageText = $data['caption'] ?? '';
                }

                $whatsappMessage->save();

                $data['success'] = true;

                $required_content = [
                    'from' => $data['from'],
                    'notifyName' => $data['notifyName'],
                    'sender' => $data['sender'] ?? null,
                    'content' => $data['content'] ?? null,
                    'type' => $data['type'],
                    'mimetype' => $data['mimetype'] ?? null,
                    'filename' => $data['filename'] ?? null,
                    'size' => $data['size'] ?? null,
                    'caption' => $data['caption'] ?? null,
                    'success' => $data['success'],
                    '_session' => $data['_session'],
                    'userId' => $newContactId,
                    'defaultImg' => $whatsappContact->profile,
                ];
                event(new Receive($required_content, 'receive-channel', 'receive'));
                // $messageContent = $data['content'];
                // $messageChunks = str_split($messageContent, 8192); // Split into 4096-byte chunks (adjust as needed)
                // foreach ($messageChunks as $chunk) {
                //     $chunkData = $data; // Clone the original data
                //     $chunkData['content'] = $chunk; // Replace content with the chunk
                //     // Publish the chunk using Pusher
                // }

                DB::commit(); // Commit the database transaction
                return response()->json(['message' => 'Message received and saved successfully', 'data' => $data]);
            } else {
                // Create the error message array
                $errorMessage = ['content' => 'Message chunk received but does not get saved', 'data' => $data];

                // Return an error JSON response
                event(new Receive($errorMessage, 'receive-channel', 'receive'));
                return response()->json(['message' => 'Message received failed']);
            }
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the database transaction in case of an exception
            // Handle the exception or log it as needed
            Log::error($e);
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function add_recipient(Request $request, $instance_id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'phone' => 'required', // Check uniqueness in the "whatsapp_contacts" table
        ]);
        $instance = WhatsappInstance::find($instance_id);
        if (empty($instance)) {
            // Phone number is not unique
            return redirect()->route('instances')->with('status', 'Instância não encontrada');
        }
        if ($instance->status == 0) {
            return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
        }
        $contactId = $validatedData['phone'] . $instance->session_name;
        // Check if a contact with the same phone number already exists
        $existContact = WhatsappContact::find($contactId);
        if ($existContact) {
            // Phone number is not unique
            return redirect()->route('chat', ['id' => $instance_id])->with('status', 'O contato já existe!');
        }

        // Create a new WhatsApp contact
        $newContact = new WhatsappContact();
        $newContact->id = $validatedData['phone'] . $instance->session_name;
        $newContact->instance_id = $instance_id;
        $newContact->phone = $validatedData['phone'];
        $newContact->username = $validatedData['phone'];

        // Save the new contact to the database
        $newContact->save();

        return redirect()->route('chat', ['id' => $instance_id])->with('status', 'Contato adicionado com sucesso!');
    }

    public function delete_recipient(Request $request, $instance_id, $id)
    {
        $instance = WhatsappInstance::find($instance_id);
        if (empty($instance)) {
            // Phone number is not unique
            return redirect()->route('instances')->with('status', 'Instância não encontrada');
        }
        if ($instance->status == 0) {
            return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
        }
        $contact = WhatsappContact::find($id);
        if (empty($contact)) {
            redirect()->route('chat', ['id' => $instance_id])->with('status', 'Contato não encontrado!');
        } else {
            $contact->delete();

            return redirect()->route('chat', ['id' => $instance_id])->with('status', 'Contato excluído com sucesso!');
        }
    }

    public function get_session_messages(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'instanceId' => 'required',
            'whatsapp_user_id' => 'required|string',
        ]);
        $instance = WhatsappInstance::find($validatedData['instanceId']);
        if (empty($instance)) {
            // Phone number is not unique
            return redirect()->route('instances')->with('status', 'Instância não encontrada');
        }
        if ($instance->status == 0) {
            return redirect()->route('instances')->with('status', 'Chat Session Has Been Expired!');
        }
        // Update the status of messages to 1
        DB::table('whatsapp_messages')
            ->where('whatsapp_user_id', $validatedData['whatsapp_user_id'])
            ->where('status', '=', 0)
            ->update(['status' => 1]);

        // Retrieve messages that match whatsapp_user_id
        $messages = DB::table('whatsapp_messages')
            ->where('whatsapp_messages.whatsapp_user_id', $validatedData['whatsapp_user_id'])
            ->get();

        // Retrieve messages that match whatsapp_user_id
        $recipient = WhatsappContact::find($validatedData['whatsapp_user_id']);

        $recipient->notification = $recipient->unreadMessagesCount();

        // Return a JSON response
        return response()->json(['message' => 'Message get successfully', 'messages' => $messages, 'recipient' => $recipient]);
    }

    public function remove_notification(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'whatsapp_user_id' => 'required|string',
        ]);
        // Update the status of messages to 1
        DB::table('whatsapp_messages')
            ->where('whatsapp_user_id', $validatedData['whatsapp_user_id'])
            ->where('status', '=', 0)
            ->update(['status' => 1]);

        return response()->json(['message' => 'Message already seen']);
    }

    public function instances(Request $request)
    {
        $instances = WhatsappInstance::all();

        $data = [
            'instances' => $instances,
        ];
        return view('instances.index', $data);
    }

    public function getInstances()
    {
        $instances = WhatsappInstance::all();

        return response()->json(['instances' => $instances]);
    }

    public function add_instance(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'session' => 'required',
            'speed' => 'required',
        ]);

        // Check if a contact with the same phone number already exists
        if (WhatsappInstance::where('session_name', $validatedData['session'])->exists()) {
            // Phone number is not unique
            return redirect()->route('instances')->with('status', 'O nome da sessão já existe!');
        }

        // Create a new WhatsApp contact
        $newInstance = new WhatsappInstance();
        $newInstance->user_id = auth()->user()->id;
        $sessionName = str_replace(' ', '', trim($validatedData['session']));
        $newInstance->session_name = $sessionName;
        $newInstance->speed = $validatedData['speed'];
        // Save the new contact to the database
        $newInstance->save();

        // Redirect to the "instances" route with a success message
        return redirect()->route('instances')->with('status', 'Instância criada com sucesso!');
    }

    public function delete_instance(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $instance = WhatsappInstance::find($id);

            if (empty($instance)) {
                redirect()->route('instances')->with('status', 'Instância não encontrado!');
            }
            // $sessionNames = [$instance->session_name];

            // $url = env('MESSAGE_API_URL') . '/auto-replies/session_names';

            // $response = Http::delete($url, ['session_names' => $sessionNames]);

            $instance->delete();

            DB::commit();
            return redirect()->route('instances')->with('status', 'Instância excluído com sucesso!');
        } catch (\Exception $e) {
            // Something went wrong, so we'll roll back the transaction
            DB::rollBack();

            // Handle the exception or error
            Log::error($e);

            return redirect()->back()->with('status', 'Erro ao excluir a Instância');
        }
    }

    function CreateChannelQR(Request $request)
    {
        try {
            $token = '4iwkxsPQQqrbuNtkaUse9NrlxnHlONks';

            $channelResponse = Http::accept('application/json')
                ->withToken($token)
                ->get(config('app.WHAPI_API_URL') . 'health');

            if ($channelResponse->successful() && !empty($channelResponse->object())) {
                $channelResponse = $channelResponse->object();
                if (!empty($channelResponse) && !empty($channelResponse->user)) {
                    $channelUser = $channelResponse->user;
                    $instance = WhatsappInstance::find($request->instance_id);
                    $instance->instance_phone = $channelUser->id;
                    $instance->instance_username = $channelUser->name;
                    $instance->status = 1;
                    $instance->save();

                    return ['url' => '', 'time_out' => 0, 'refresh' => true];
                }
            }

            $response = Http::accept('application/json')
                ->withToken($token)
                ->get(config('app.WHAPI_API_URL') . 'users/login');

            if ($response->successful() && !empty($response->object())) {
                $response = $response->object();

                if (!empty($response) && !empty($response->base64)) {
                    return ['url' => $response->base64, 'time_out' => $response->expire];
                }
            }
        } catch (Exception $e) {
            Log::error($e);
        }
        return ['url' => '', 'time_out' => 5];
    }

    function EventWebhook(Request $request, $instanceID)
    {
        $token = '4iwkxsPQQqrbuNtkaUse9NrlxnHlONks';

        Log::info("EventWebhook >> ", $request->all());

        $eventType = $request->event['type'];
        if ($eventType != 'messages') {
            return false;
        }

        $instanceSessionName = WhatsappInstance::where('id', $instanceID)->value('session_name');
        if (empty($instanceSessionName)) {
            return false;
        }
        $matchMessageData = AutoResponder::where('session', $instanceSessionName)->pluck('response', 'keyword')->toArray();

        // dd($matchMessageData);
        $messages = $request->messages;
        foreach ($messages as $message) {
            if ($message['from_me'] || $message['type'] != 'text') {
                continue;
            }

            $recipientID = $message['chat_id'];
            $messageText = $message['text']['body'];

            if (in_array($messageText, array_keys($matchMessageData))) {
                Http::accept('application/json')
                    ->withToken($token)
                    ->post(config('app.WHAPI_API_URL') . 'messages/text', [
                        "to" => $recipientID,
                        "body" => $matchMessageData[$messageText],
                        "view_once" => false
                    ]);
                Log::info("EventWebhook Send Done...");
            }
        }
    }
}
