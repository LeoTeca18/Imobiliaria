<?php

namespace App\Http\Controllers;

use App\Models\apartamentos;
use App\Models\terrenos;
use App\Models\vivendas;
use Illuminate\Http\Request;

class ComparacaoController extends Controller
{
    /**
     * Exibir página de comparação de imóveis
     */
    public function index(Request $request)
    {
        $ids = $request->query('ids', '');
        $idsArray = explode(',', $ids);
        
        $imoveis = [];
        
        foreach ($idsArray as $id) {
            if (strpos($id, 'apartamento-') === 0) {
                $realId = str_replace('apartamento-', '', $id);
                $imovel = apartamentos::find($realId);
                if ($imovel) {
                    $imovel->tipo = 'Apartamento';
                    $imoveis[] = $imovel;
                }
            } elseif (strpos($id, 'terreno-') === 0) {
                $realId = str_replace('terreno-', '', $id);
                $imovel = terrenos::find($realId);
                if ($imovel) {
                    $imovel->tipo = 'Terreno';
                    $imoveis[] = $imovel;
                }
            } elseif (strpos($id, 'vivenda-') === 0) {
                $realId = str_replace('vivenda-', '', $id);
                $imovel = vivendas::find($realId);
                if ($imovel) {
                    $imovel->tipo = 'Vivenda';
                    $imoveis[] = $imovel;
                }
            }
        }
        
        return view('cliente.comparacao', compact('imoveis'));
    }

    /**
     * API para obter dados de comparação
     */
    public function apiComparacao(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'string'
        ]);

        $imoveis = [];
        
        foreach ($request->ids as $id) {
            if (strpos($id, 'apartamento-') === 0) {
                $realId = str_replace('apartamento-', '', $id);
                $imovel = apartamentos::find($realId);
                if ($imovel) {
                    $imoveis[] = [
                        'id' => $id,
                        'nome' => $imovel->nome,
                        'tipo' => 'Apartamento',
                        'preco' => $imovel->preco,
                        'area' => $imovel->area,
                        'bairro' => $imovel->bairro,
                        'topologia' => $imovel->topologia,
                        'andar' => $imovel->andar,
                        'img' => $imovel->img
                    ];
                }
            } elseif (strpos($id, 'terreno-') === 0) {
                $realId = str_replace('terreno-', '', $id);
                $imovel = terrenos::find($realId);
                if ($imovel) {
                    $imoveis[] = [
                        'id' => $id,
                        'nome' => $imovel->nome,
                        'tipo' => 'Terreno',
                        'preco' => $imovel->preco,
                        'area' => $imovel->area,
                        'bairro' => $imovel->bairro,
                        'img' => $imovel->img
                    ];
                }
            } elseif (strpos($id, 'vivenda-') === 0) {
                $realId = str_replace('vivenda-', '', $id);
                $imovel = vivendas::find($realId);
                if ($imovel) {
                    $imoveis[] = [
                        'id' => $id,
                        'nome' => $imovel->nome,
                        'tipo' => 'Vivenda',
                        'preco' => $imovel->preco,
                        'area' => $imovel->area,
                        'bairro' => $imovel->bairro,
                        'qtdQuarto' => $imovel->qtdQuarto ?? 0,
                        'tipo_vivenda' => $imovel->tipo,
                        'img' => $imovel->img
                    ];
                }
            }
        }
        
        return response()->json($imoveis);
    }
}
