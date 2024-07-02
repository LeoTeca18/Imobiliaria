<?php

namespace App\Http\Controllers;

use App\Models\alugueres;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\terrenos;
use App\Models\vivendas;
use App\Models\apartamentos;
use App\Models\compras;

class ClienteController extends Controller
{
    //
    public function cadastro(Request $request)
    {
    $cliente = $request->all();
    $cliente['senha'] = bcrypt($request->senha);
    $cliente = Clientes::create($cliente); 
    }
   
    //Proprietários
    public function listarImoveisP()
    {
        $terrenos = Terrenos::where('estado', 0)->get();
        $vivendas = Vivendas::where('estado', 0)->get();
        $apartamentos = Apartamentos::where('estado', 0)->get();
        
        return view('proprietario/iniP', compact('terrenos', 'vivendas', 'apartamentos'));
    }
    
    //Clientes
    public function listarImoveis()
    {
        $terrenos = Terrenos::where('estado', 0)->get();
        $vivendas = Vivendas::where('estado', 0)->get();
        $apartamentos = Apartamentos::where('estado', 0)->get();
        
        return view('cliente/ver', compact('terrenos', 'vivendas', 'apartamentos'));
    }

    public function listarDestaques()
    {
        $terreno = Terrenos::where('estado', 0)->first();
        $vivenda = Vivendas::where('estado', 0)->first();
        $apartamento = Apartamentos::where('estado', 0)->first();
        
        return view('cliente/iniC', compact('terreno', 'vivenda', 'apartamento'));
    }

    public function pesquisar(Request $request)
    {
        $query = $request->get('query', '');

        // Realize a pesquisa nos modelos
        $terrenos = Terrenos::where('nome', 'LIKE', "%{$query}%")->where('estado', 0)->get();
        $vivendas = Vivendas::where('nome', 'LIKE', "%{$query}%")->where('estado', 0)->get();
        $apartamentos = Apartamentos::where('nome', 'LIKE', "%{$query}%")->where('estado', 0)->get();

        return view('cliente/pesquisa', compact('terrenos', 'vivendas', 'apartamentos', 'query'));
    }

    public function exibirDetalhes($id)
    {
        // Procura o imóvel por ID nos três modelos
        $terreno = Terrenos::find($id);
        $vivenda = Vivendas::find($id);
        $apartamento = Apartamentos::find($id);


        return view('cliente.info', compact('terreno'));
    }

    public function escolherTipoCliente()
    {
        return view('geral.escolha');
    }

    //Proprietários
    public function imoveisVendidos()
    {
        $compras = compras::all();
        return view('proprietario/vendidos', compact('compras'));
    }
    
    public function imoveisAlugados()
    {
        $alugueres = alugueres::all();
        return view('proprietario/alugados', compact('alugueres'));
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
        
        public function Avisita($id)
        {
            $terreno = terrenos::find($id);
    
            if (!$terreno) {
                abort(404, 'não encontrado');
            }
    
              $terreno->estado = 3;
              $terreno->save();
      
              return redirect()->back()->with('Agendado');
          }

          public function Areserva($id)
          {
              $terreno = terrenos::find($id);
      
              if (!$terreno) {
                  abort(404, 'não encontrado');
              }
      
                $terreno->estado = 2;
                $terreno->save();
        
                return redirect()->back()->with('Reservado');
            }
 }