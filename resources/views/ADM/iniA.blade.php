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
        <a href="clientes" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-users fa-fw"></i>Listar Clientes</a>
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
        <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
    </header>
    <div class="therichpost-row-padding therichpost-margin-bottom">
        <div class="therichpost-quarter">
            <div class="therichpost-container therichpost-red therichpost-padding-16">
                <div class="therichpost-left"><i class="fa fa-users therichpost-xxxlarge"></i></div>
                <div class="therichpost-right">
                    <h3>{{ $totalC }}</h3>
                </div>
                <div class="therichpost-clear"></div>
                <h4><a href="aceites">Clientes</a>
                </h4>
            </div>
        </div>
        <div class="therichpost-quarter">
            <div class="therichpost-container therichpost-blue therichpost-padding-16">
                <div class="therichpost-left"><i class="fa fa-home therichpost-xxxlarge"></i></div>
                <div class="therichpost-right">
                    <h3>{{ $totalI}}</h3>
                </div>
                <div class="therichpost-clear"></div>
                <h4><a href="negados">Imóveis</a>
                </h4>
            </div>
        </div>
        <div class="therichpost-panel">
            <div class="therichpost-row-padding" style="margin:0 -16px">
                <div class="therichpost-twothird">
                    <h5>Funcionários</h5>
                    <table class="therichpost-table therichpost-striped therichpost-white" style="width: 900px">
                        <thead>
                            <tr>
                                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                                <th>Nome</th>
                                <th>Agência</th>
                                <th>Cargo</th>
                                <th>Email</th>
                                <th>Salário</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($funcionarios as $funcionario)
                    <tr>
                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                <td>{{ $funcionario->nome }}</td>
                <td>{{ $funcionario->agencia->nome }}</td>
                <td>{{ $funcionario->cargo }}</td>
                <td>{{ $funcionario->email }}</td>
                <td>{{ $funcionario->salario }}Kz</td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <br>
                <h5>Agências</h5>
                    <table class="therichpost-table therichpost-striped therichpost-white" style="width: 900px">
                        <thead>
                            <tr>
                                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Local</th>
                            </tr>
                        </thead>
                        <tbody>
            @foreach($agencias as $agencia)
            <tr>
                <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                <td>{{ $agencia->id }}</td>
                <td>{{ $agencia->nome }}</td>
                <td>{{ $agencia->local }}</td>
            </tr>
            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        @endsection