<?php

use App\Models\administrador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\ComparacaoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Geral-------------------------------------------------------------------
Route::get('/', [HomeController::class, 'listarDestaques'])->name('cliente.imoveis');

Route::get('/login', function () {
    return view('geral/login');
});

Route::post('login', [HomeController::class, 'login']);

Route::post('logout', [HomeController::class, 'logout'])->name('logout');

Route::post('/cada', [HomeController::class, 'store'])->name('cadastro.store');

Route::get('/cadastro', [CadastroController::class, 'cadastro']);

Route::post('/cadas', [CadastroController::class, 'store']);

Route::get('escolha', [HomeController::class, 'showUserTypeForm'])->name('choose-user-type');

Route::post('escolhar', [HomeController::class, 'escolha']);
#Cliente-------------------------------------------------------------------
Route::get('/cliente', function () {
    return view('cliente/iniC');
});

Route::get('/cliente', [ClienteController::class, 'listarDestaques'])->name('cliente.imoveis');

Route::get('/ver', [ClienteController::class, 'pesquisar'])->name('cliente.imoveis');

Route::get('/pesquisar', [ClienteController::class, 'pesquisar'])->name('pesquisar.imovel');

Route::get('/info/{id}', [ClienteController::class, 'exibirDetalhes'])->name('imovel.detalhes');

Route::get('/escolha', [ClienteController::class, 'escolherTipoCliente'])->name('escolha');

Route::put('Cliente/{terreno}', [ClienteController::class, 'comprar'])->name('terrenos.comprar');

Route::get('/pesquisa', function () {
    return view('cliente/pesquisa');
});

Route::get('/comprados', function () {
    return view('cliente/comprados');
});

Route::get('/reservas', function () {
    return view('cliente/reservas');
});

Route::get('/visita', function () {
    return view('cliente/visita');
});

Route::get('/alugadosC', function () {
    return view('cliente/alugados');
});

Route::get('/info', function () {
    return view('cliente/info');
});

#Proprietário-------------------------------------------------------------------
Route::get('/proprietario/iniP', [ClienteController::class, 'listarImoveisP'])->name('proprietario.imoveis');

Route::get('/proprietario/adicionar', function () {
    return view('proprietario/adicionar');
});

Route::get('/proprietario/vendidosP', [ClienteController::class, 'imoveisVendidos'])->name('proprietario.vendidos');

Route::get('/proprietario/alugadosP', [ClienteController::class, 'imoveisAlugados'])->name('proprietario.alugueres');

Route::put('/cliente/{id}/compra', [ClienteController::class, 'compra'])->name('compra');

Route::put('/cliente/{id}/alugar', [ClienteController::class, 'alugar'])->name('aluga');

Route::put('/cliente/{id}/Areserva', [ClienteController::class, 'Areserva'])->name('reserva');

Route::put('/cliente/{id}/Avisita', [ClienteController::class, 'Avisita'])->name('visitaC');

#Favoritos e Comparação-------------------------------------------------------------------
Route::get('/favoritos', [FavoritosController::class, 'index'])->name('favoritos');
Route::post('/favoritos/adicionar', [FavoritosController::class, 'adicionar'])->name('favoritos.adicionar');
Route::delete('/favoritos/remover', [FavoritosController::class, 'remover'])->name('favoritos.remover');

Route::get('/comparar', [ComparacaoController::class, 'index'])->name('comparacao');
Route::post('/api/comparacao', [ComparacaoController::class, 'apiComparacao'])->name('api.comparacao');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/estatisticas', [DashboardController::class, 'apiEstatisticas'])->name('api.estatisticas');

#Negociante-------------------------------------------------------------------
Route::get('/negociante/iniN', function () {
    return view('funcionario/negociante/iniN');
});

Route::get('/negociante/iniN', [FuncionarioController::class, 'listarImoveis'])->name('negociante.imoveis');

Route::get('/negociante/vendidosN', [FuncionarioController::class, 'imoveisVendidos'])->name('negociante.vendidos');

Route::get('/negociante/alugadosN', [FuncionarioController::class, 'imoveisAlugados'])->name('negociante.alugueres');

Route::get('/negociante/reservasN', [FuncionarioController::class, 'imoveisReservados'])->name('negociante.reservas');

Route::get('/negociante/visitaN', [FuncionarioController::class, 'imoveisVisitados'])->name('negociante.visitas');

Route::put('/cliente/{id}/compra', [FuncionarioController::class, 'compra'])->name('compra');

Route::put('/cliente/{id}/alugar', [FuncionarioController::class, 'alugar'])->name('aluga');

#Gestor-------------------------------------------------------------------
Route::get('/gestor/iniG', function () {
    return view('funcionario/gestor/iniG');
});

Route::get('/gestor/iniG', [FuncionarioController::class, 'listarProprietarios'])->name('gestor.proprietarios');

Route::get('/gestor/aceites', [FuncionarioController::class, 'pedidosAceites'])->name('gestor.proprietarios');

Route::put('/gestor/{id}/validar-pedido', [FuncionarioController::class, 'validarPedido'])->name('validar.pedido');

#ADM----------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
Route::get('/ADM/iniA', function () {
    return view('ADM/iniA');
});

Route::get('/ADM/imoveis', function () {
    return view('ADM/imoveis');
});

Route::get('/ADM/proprietarios', function () {
    return view('ADM/proprietarios');
});

Route::get('/ADM/clientes', [AdministradorController::class, 'listarClientes'])->name('ADM.clientes');

Route::get('/ADM/iniA', [AdministradorController::class, 'listarAgencias'])->name('ADM.agencias');

Route::get('/ADM/imoveis', [AdministradorController::class, 'listarImoveis'])->name('ADM.imoveis');

});