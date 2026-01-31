<?php

namespace App\Http\Controllers;

use App\Models\apartamentos;
use App\Models\terrenos;
use App\Models\vivendas;
use App\Models\compras;
use App\Models\alugueres;
use App\Models\reservas;
use App\Models\clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Exibir dashboard com estatísticas
     */
    public function index()
    {
        // Contar total de imóveis disponíveis
        $totalImoveis = apartamentos::where('estado', 0)->count() +
                       terrenos::where('estado', 0)->count() +
                       vivendas::where('estado', 0)->count();

        // Vendidos este mês
        $vendidosMes = compras::whereMonth('created_at', date('m'))
                             ->whereYear('created_at', date('Y'))
                             ->count();

        // Clientes ativos
        $clientesAtivos = clientes::whereNotNull('email')->count();

        // Imóveis por categoria
        $imoveisPorCategoria = [
            'apartamentos' => apartamentos::where('estado', 0)->count(),
            'vivendas' => vivendas::where('estado', 0)->count(),
            'terrenos' => terrenos::where('estado', 0)->count(),
        ];

        // Imóveis recentemente adicionados
        $recentesApartamentos = apartamentos::where('estado', 0)
                                            ->orderBy('id', 'desc')
                                            ->take(3)
                                            ->get();
        
        $recentesVivendas = vivendas::where('estado', 0)
                                    ->orderBy('id', 'desc')
                                    ->take(3)
                                    ->get();

        $recentesTerrenos = terrenos::where('estado', 0)
                                    ->orderBy('id', 'desc')
                                    ->take(3)
                                    ->get();

        // Estatísticas de preços
        $precoMedioApartamentos = apartamentos::where('estado', 0)->avg('preco');
        $precoMedioVivendas = vivendas::where('estado', 0)->avg('preco');
        $precoMedioTerrenos = terrenos::where('estado', 0)->avg('preco');

        return view('cliente.dashboard', compact(
            'totalImoveis',
            'vendidosMes',
            'clientesAtivos',
            'imoveisPorCategoria',
            'recentesApartamentos',
            'recentesVivendas',
            'recentesTerrenos',
            'precoMedioApartamentos',
            'precoMedioVivendas',
            'precoMedioTerrenos'
        ));
    }

    /**
     * API para obter estatísticas
     */
    public function apiEstatisticas()
    {
        $stats = [
            'total_imoveis' => apartamentos::where('estado', 0)->count() +
                              terrenos::where('estado', 0)->count() +
                              vivendas::where('estado', 0)->count(),
            'vendidos_mes' => compras::whereMonth('created_at', date('m'))->count(),
            'alugados_mes' => alugueres::whereMonth('created_at', date('m'))->count(),
            'reservas_ativas' => reservas::where('estado', 'ativa')->count(),
            'clientes_total' => clientes::count(),
        ];

        return response()->json($stats);
    }
}
