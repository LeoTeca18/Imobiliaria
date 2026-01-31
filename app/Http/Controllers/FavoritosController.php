<?php

namespace App\Http\Controllers;

use App\Models\apartamentos;
use App\Models\terrenos;
use App\Models\vivendas;
use App\Models\clientes;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    /**
     * Exibir lista de favoritos do cliente
     */
    public function index()
    {
        // Recuperar IDs dos favoritos do localStorage via JavaScript
        return view('cliente.favoritos');
    }

    /**
     * Adicionar imóvel aos favoritos
     */
    public function adicionar(Request $request)
    {
        $request->validate([
            'imovel_id' => 'required|integer',
            'tipo' => 'required|in:apartamento,terreno,vivenda'
        ]);

        // Lógica para salvar favorito no banco (opcional)
        return response()->json([
            'success' => true,
            'message' => 'Imóvel adicionado aos favoritos!'
        ]);
    }

    /**
     * Remover imóvel dos favoritos
     */
    public function remover(Request $request)
    {
        $request->validate([
            'imovel_id' => 'required|integer',
            'tipo' => 'required|in:apartamento,terreno,vivenda'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Imóvel removido dos favoritos!'
        ]);
    }
}
