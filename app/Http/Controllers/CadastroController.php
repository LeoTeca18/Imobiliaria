<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\User;

class CadastroController extends Controller
{
    //
    public function cadastro()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'pswd' => 'required|string|min:6',
        ]);

        clientes::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('pswd')),
        ]);

        return 'Cadastro realizado com sucesso!';
    }
}