<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function create() {
        return view('createUser');
    }
    public function edit($id) {
        $user = User::find($id);
        if (!$user) {
            return redirect('listaDeUsuarios')->with('status', 'Usuário não encontrado');
        }
        $data = [
            'user' => $user
        ];
        return view('updateUser', $data);
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('listaDeUsuarios')->with('status', 'Usuário criado com sucesso');
        } catch (\Exception $e) {
            return redirect('users.create')->with('status', 'Error creating operator: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, $id) 
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class)->ignore($id), // Ignores the given user ID for uniqueness check
                ],
            ]);
            $user = User::find($id);
            if (!$user) {
                return redirect('listaDeUsuarios')->with('status', 'Usuário não encontrado');
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect('listaDeUsuarios')->with('status', 'Usuário atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect('users.edit', $id)->with('status', 'Error creating operator: ' . $e->getMessage());
        }
    }
    public function delete(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('listaDeUsuarios')->with('status', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            return redirect()->route('listaDeUsuarios')->with('status', 'Erro ao excluir usuário: ' . $e->getMessage());
        }
    }
}
