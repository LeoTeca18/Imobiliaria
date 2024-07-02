<?php

namespace App\Http\Controllers;

use App\Models\alugueres;
use Illuminate\Http\Request;
use App\Models\terrenos;
use App\Models\vivendas;
use App\Models\apartamentos;
use App\Models\clientes;
use App\Models\compras;
use App\Models\reservas;
use App\Models\visitas;

class FuncionarioController extends Controller
{
    //Negociante
    public function listarImoveis()
    {
        $terrenos = Terrenos::all();
        $vivendas = Vivendas::all();
        $apartamentos = Apartamentos::all();
        return view('funcionario/negociante/iniN', compact('terrenos', 'vivendas', 'apartamentos'));
    }
    
    public function imoveisVendidos()
    {
        $compras = compras::with('cliente')->with('funcionario')->get();
        return view('funcionario/negociante/vendidos', compact('compras'));
    }
    
    public function imoveisAlugados()
    {
        $alugueres = alugueres::with('cliente')->with('funcionario')->get();
        
        return view('funcionario/negociante/Alugados', compact('alugueres'));
    }
    
    public function imoveisReservados()
    {
        $reservas = reservas::with('cliente')->with('funcionario')->get();
        return view('funcionario/negociante/reservasN', compact('reservas'));
    }

    public function imoveisVisitados()
    {
        $visitas = visitas::with('cliente')->with('funcionario')->get();
        return view('funcionario/negociante/visitasN', compact('visitas'));
    }
    
    public function compra($id)
    {
        $terreno = terrenos::find($id);

        if (!$terreno) {
            abort(404, 'não encontrado');
        }

          $terreno->estado = 1;
          $terreno->save();
  
          return redirect()->back()->with('Comprado!');
      }

      public function alugar($id)
      {
          $terreno = terrenos::find($id);
  
          if (!$terreno) {
              abort(404, 'não encontrado');
          }
  
            $terreno->estado = 4;
            $terreno->save();
    
            return redirect()->back()->with('Alugado!');
        }
        
    //Gestor
    public function listarProprietarios()
    {
        $proprietarios = Clientes::where('tipo', 'proprietario')
        ->where('pedido', 0)
        ->get();
        return view('funcionario/gestor/iniG', compact('proprietarios'));
    }

    public function pedidosAceites()
    {
        $proprietarios = Clientes::where('tipo', 'proprietario')
        ->where('pedido', 1)
        ->get();
        return view('funcionario/gestor/aceites', compact('proprietarios'));
    }

    public function validarPedido($id)
    {
        $clientes = clientes::find($id);

        if (!$clientes) {
            abort(404, 'Proprietário não encontrado');
        }

        // Atualiza o valor da coluna 'pedido' para 1
          // Atualiza o valor da coluna 'pedido' para 1
          $clientes->pedido = 1;
          $clientes->save();
  
          return redirect()->back()->with('success', 'Pedido validado com sucesso!');
      }
}