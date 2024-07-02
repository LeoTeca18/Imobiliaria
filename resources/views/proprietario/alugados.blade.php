@extends('layouts.main')
@section('estilo')

<!-- Top container -->
<div class="therichpost-bar therichpost-top therichpost-black therichpost-large" style="z-index:4">
    <button
        class="therichpost-bar-item therichpost-button therichpost-hide-large therichpost-hover-none therichpost-hover-text-light-grey"
        onclick="therichpost_open()"><i class="fa fa-bars"></i> Menu</button>
    <span class="therichpost-bar-item therichpost-right">Imotec</span>
</div>
<!-- Sidebar/menu -->
<nav class="therichpost-sidebar therichpost-collapse therichpost-white therichpost-animate-left"
    style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="therichpost-container therichpost-row">
        <div class="therichpost-col s4">
            <img src="{{ asset('img/p.jpeg') }}" class="therichpost-circle therichpost-margin-right" style="width:46px">
        </div>
        <div class="therichpost-col s8 therichpost-bar">
            <span>Bem Vindo</span><br>
        </div>
    </div>
    <hr>
    <div class="therichpost-container">
        <h5> <a href="iniP">Dashboard</h5>
    </div>
    <div class="therichpost-bar-block">
        <a href="adicionar" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-home fa-fw"></i>Adicionar Imóvel</a>
        <a href="vendidosP" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-home fa-fw"></i>Imóveis Vendidos</a>
        <a href="alugadosP" class="therichpost-bar-item therichpost-button therichpost-padding therichpost-blue"><i
                class="fa fa-home fa-fw"></i>Imóveis Alugados</a>
        <a href="login" class="therichpost-bar-item therichpost-button therichpost-padding">
            <i class="fa fa-times fa-fw"></i>
            Logout
        </a><br><br>
    </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="therichpost-overlay therichpost-hide-large therichpost-animate-opacity" onclick="therichpost_close()"
    style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="therichpost-main" style="margin-left:300px;margin-top:43px;">
    <!-- Header -->
    <header class="therichpost-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i>Imóveis Alugados</b></h5>
    </header>
    <table class="therichpost-table therichpost-striped therichpost-white">
        <thead>
            <tr>
                <th><i class="fa fa-home therichpost-text-blue therichpost-large"></i></th>
                <th>Prazo</th>
                <th>Cliente</th>
                <th>Funcionário</th>
                <th>Imóvel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alugueres as $aluguer)
            <tr>
            <th><i class="fa fa-home therichpost-text-blue therichpost-large"></i></th>         
                <td>{{ $aluguer->prazo }}</td>
                <td>{{ $aluguer->id_funcionario }}</td>
                <td>{{ $aluguer->id_cliente }}</td>
                <td>{{ $aluguer->id_imovel }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
<hr>
@endsection