<?php

namespace App\Http\Controllers;
use App\Models\clientes;
use App\Models\agencias;
use App\Models\apartamentos;
use App\Models\funcionario;
use App\Models\vivendas;
use App\Models\terrenos;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function index(){
        $clientes = clientes::all();
        return view('clientes.index', compact('$clientes'));  
    }

    public function listarClientes()
    {
        $clientes = clientes::all();
        return view('ADM/clientes', compact('clientes'));
    }

    public function listarImoveis()
    {
        $vivendas = vivendas::with('cliente')->get();
        $apartamentos = apartamentos::with('cliente')->get();
        $terrenos = terrenos::with('cliente')->get();
        return view('ADM/imoveis', compact('vivendas', 'apartamentos', 'terrenos'));
    }
    
    public function listarAgencias()
    {
        $agencias = agencias::all();
        $funcionarios = funcionario::with('agencia')->get();
        $totalC = clientes::count();
        $vivendas = vivendas::count();
        $apartamentos = apartamentos::count();
        $terrenos = terrenos::count();
        $totalI = $vivendas + $apartamentos + $terrenos; 
        return view('ADM/iniA', compact('agencias', 'funcionarios', 'totalC','totalI'));
    }

}