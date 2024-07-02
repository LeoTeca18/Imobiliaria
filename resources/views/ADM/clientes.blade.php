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
        <h5><a href="iniA">Dashboard</h5>
    </div>
    <div class="therichpost-bar-block">
        <a href="clientes" class="therichpost-bar-item therichpost-button therichpost-padding therichpost-blue"><i
                class=" fa fa-users fa-fw"></i>Listar Clientes</a>
        <a href="imoveis" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-users fa-fw"></i>Listar Imóveis</a>
             <a href="#" class="therichpost-bar-item therichpost-button therichpost-padding">
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
        <h5><b><i class="fa fa-dashboard"></i>Clientes</b></h5>
    </header>
    <table class="therichpost-table therichpost-striped therichpost-white">
        <thead>
            <tr>
                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                <th>Nome</th>
                <th>Contacto</th>
                <th>Email</th>
                 <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->contacto }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->tipo }}</td>
            </tr>
            @endforeach
           </tbody>
    </table>
</div>
</div>
</div>
<hr>
@endsection