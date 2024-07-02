<?php

namespace App\Http\Controllers;

use App\Models\administrador;
use Illuminate\Http\Request;
use App\Models\terrenos;
use App\Models\vivendas;
use App\Models\apartamentos;
use App\Models\clientes;
use App\Models\funcionario;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function listarDestaques()
    {
        $terreno = Terrenos::where('estado', 0)->first();
        $vivenda = Vivendas::where('estado', 0)->first();
        $apartamento = Apartamentos::where('estado', 0)->first();
        
        return view('geral/home', compact('terreno', 'vivenda', 'apartamento'));
    }

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
            'senha' => 'required|string|min:6',
        ]);

        clientes::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ]);

        return 'Cadastro realizado com sucesso!';
    }

    public function showLoginForm()
    {
        return view('geral.login');
    }

    // Processar o login
    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $credentials = $request->only('email', 'senha');

      
        if (Auth::guard('cliente')->attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('ADM/iniA'); // Redireciona para a página desejada após o login
        }

        // Autenticação falhou
        return redirect()->back()->with('erro', 'Credenciais inválidas. Verifique seu email e senha.');
    }

    // Processar o logout
    public function logout(Request $request)
    {
        clientes::logout();
        funcionario::logout();
        return redirect('/');
    }
 
     // Mostrar o formulário de escolha do tipo de usuário
     public function showUserTypeForm()
     {
         return view('geral.escolha');
     }
 
     // Processar a escolha do tipo de usuário
     public function escolha(Request $request)
     {
            $request->validate([
            'tipo' => 'required|string|in:proprietario,normal',
            ]);
    
            $cliente = clientes::user();
            $cliente->tipo = $request->input('tipo');
            $cliente->save();  
     }
    
}