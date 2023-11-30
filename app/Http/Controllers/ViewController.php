<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhatsappInstance;
use App\Models\Integration;
use App\Models\User;
use App\Models\Payment;
use Response;

class ViewController extends Controller
{
    public function users() {
        $users = User::paginate(10);
        $data = [
            'users' => $users
        ];
        return view('listaDeUsuarios', $data);
    }
    public function user($id) {
        $user = User::find($id);
        if (!$user) {
            return redirect('listaDeUsuarios')->with('status', 'Usuário não encontrado');
        }
        $data = [
            'user' => $user
        ];
        return view('listaDeUsuario', $data);
    }
    public function payments() {
        $payments = Payment::with('user')->paginate(10);
        $data = [
            'payments' => $payments
        ];
        return view('pagamento', $data);
    }
    public function whatsappChats(Request $request, $id)
    {
        return view('plugChats/chats');
    }
    public function whatsappTemplate(Request $request, $id)
    {
        return view('template/index');
    }
    public function Integracao(Request $request) 
    {
        $integrations = Integration::paginate(10);
        $instances = WhatsappInstance::where('status', '1')->get();
        $data = [
            'integrations' => $integrations,
            'instances' => $instances
        ];
        return view('Integracao', $data);
    }
    public function Integracao2(Request $request, $id) 
    {
        try{
            $integration = Integration::find($id);
            // Extracting instances from comma-separated string to an array
            $instanceIds = explode(',', $integration->instances);
            
            // Fetch instances using their IDs
            $instances = WhatsappInstance::whereIn('id', $instanceIds)->get();

            $data = [
                'integration' => $integration,
                'instances' => $instances,
            ];
            return view('Integracao2', $data);
        }
        catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect(route('Integracao2', $id))->with('status', $e->getMessage());
        }
    }
}