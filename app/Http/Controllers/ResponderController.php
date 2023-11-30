<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\WhatsappInstance;
use App\Models\AutoResponder;


class ResponderController extends Controller
{
    public function index()
    {
        $responders = AutoResponder::paginate(10);

        $data = [
            'responders' => $responders,
        ];
        return view('responders.index', $data);
    }

    public function create()
    {
        $instances = WhatsappInstance::all();

        $data = [
            'instances' => $instances,
        ];
        return view('responders.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([  
                'session' => 'required',
                'keyword' => 'required',
            ]);
            
            $input = $request->all();

            if (empty($input['response']) && empty($input['upload_file'])) {
                return redirect()->back()->with('status', 'Forneça uma resposta automática');
            }
            
            // Check if a file was uploaded
            $base64Data = null;
            $filename = null;
            if ($request->hasFile('upload_file')) {
                $file = $request->file('upload_file');

                $uuid = (string) Str::uuid();
                $filename = $uuid . '_.' . $file->getClientOriginalExtension();
                // Store the file in the public storage directory
                $file->storeAs('public', $filename);
                // Read the file and convert it to base64
                $base64Data = base64_encode(file_get_contents($file->path()));

                $url = url(env('MESSAGE_API_URL') . '/storage/'.$filename);
                $input['response_file'] = $url;
            }

            $responder = AutoResponder::create($input);
            
            // $data = [
            //     'id' => $responder->id,
            //     'session' => $input['session'],
            //     'keyword' => $input['keyword'],
            //     'response' => $input['response'] ?? null,
            //     'response_file' => $input['response_file'] ?? null,
            //     'base64Data' => $base64Data,
            //     'filename' => $filename,
            // ];
            // // Your code to send the data to the Node.js server and handle the transaction there

            // $url = env('MESSAGE_API_URL') . '/auto-replies';

            // $response = Http::post($url, $data);

            DB::commit();
            return redirect()->route('instances')->with('status', 'Resposta automática criada com sucesso');      
        } catch (\Exception $e) {
            // Something went wrong, so we'll roll back the transaction
            DB::rollBack();

            // Handle the exception or error (log it, show a user-friendly message, etc.)
            Log::error($e);

            return redirect()->back()->with('status', 'Erro ao criar a resposta');
        }
    }

    public function show($id)
    {
        $responder = AutoResponder::find($id);
        if(empty($responder)) {
            return redirect()->back()->with('status', 'resposta não é encontrado');
        }
        $data = [
            'responder' => $responder,
        ];
        return view('responders.show', $data);
    }

    public function edit($id)
    {
        $instances = WhatsappInstance::all();

        $responder = AutoResponder::find($id);
        
        if(empty($responder)) {
            return redirect()->back()->with('status', 'resposta não é encontrado');
        }

        $data = [
            'instances' => $instances,
            'responder' => $responder,
        ];

        return view('responders.edit', $data);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([  
                'session' => 'required',
                'keyword' => 'required',
            ]);
            
            
            $responder = AutoResponder::find($id);
            
            if(empty($responder)) {
                return redirect()->back()->with('status', 'falha na atualização');
            }
            
            $input = $request->all();
            
            if (empty($input['response']) && empty($input['upload_file'])) {
                return redirect()->back()->with('status', 'Forneça uma resposta automática');
            }
            // Check if an image base64 was uploaded
            $url = null;
            $base64Data = null;
            $filename = null;
            
            // Check if a file was uploaded
            if ($request->hasFile('upload_file')) {
                $file = $request->file('upload_file');
                
                $uuid = (string) Str::uuid();
                $filename = $uuid . '_.' . $file->getClientOriginalExtension();
                $file->storeAs('public', $filename);
                // Read the file and convert it to base64
                $base64Data = base64_encode(file_get_contents($file->path()));

                $url = url(env('MESSAGE_API_URL') . '/uploads/responseFile/'.$filename);
            } 

            $responder->session = $validatedData['session'] ?? $responder->session;
            $responder->keyword = $validatedData['keyword'] ?? $responder->keyword;
            $responder->percentage = $input['percentage'] ?? $responder->percentage;
            $responder->response = $input['response'];
            $responder->response_file = $url;

            // Your code to send the data to the Node.js server and handle the transaction there

            $responder->save();

            // $data = [
            //     'session' => $responder->session,
            //     'keyword' => $responder->keyword,
            //     'response' => $responder->response,
            //     'response_file' => $responder->response_file,
            //     'base64Data' => $base64Data,
            //     'filename' => $filename,
            // ];
            // // Your code to send the data to the Node.js server and handle the transaction there

            // $url = env('MESSAGE_API_URL') . '/auto-replies/' . $id;

            // $response = Http::put($url, $data);

            DB::commit();
            return redirect()->route('responders.index')->with('status', 'atualização de resposta com sucesso');  
        } catch (\Exception $e) {
            // Something went wrong, so we'll roll back the transaction
            DB::rollBack();
    
            // Handle the exception or error
            Log::error($e);
    
            return redirect()->back()->with('status', 'Erro ao atualizar a resposta');
        }
    }
    
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $responder = AutoResponder::find($id);
            
            if(empty($responder)) {
                return redirect()->back()->with('status', 'resposta não é encontrado');
            }

            // Your code to send the data to the Node.js server and handle the transaction there

            $responder->delete();

            // $url = env('MESSAGE_API_URL') . '/auto-replies/' . $id;

            // $response = Http::delete($url);

            DB::commit();
            return redirect()->route('responders.index')->with('status', 'exclusão de resposta bem sucedido');
        } catch (\Exception $e) {
            // Something went wrong, so we'll roll back the transaction
            DB::rollBack();
    
            // Handle the exception or error
            Log::error($e);
    
            return redirect()->back()->with('status', 'Erro ao excluir a resposta');
        }
    }
}
