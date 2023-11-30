<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::paginate(5);
        $data = [
            'operators' => $operators
        ];
        return view('operadores', $data);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'login' => 'required|string:operators,login|max:255',
                'password' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'is_admin' => 'boolean',
                'is_active' => 'boolean',
            ]);

            Operator::create($validatedData);

            return redirect('/operadores')->with('success', 'Operator created successfully');
        } catch (\Exception $e) {
            return redirect('/nuevoOperador')->with('status', 'Error creating operator: ' . $e->getMessage())->withInput();
        }
    }
}
