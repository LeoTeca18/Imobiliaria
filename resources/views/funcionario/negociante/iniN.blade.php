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
        <h5><a href="iniN">Dashboard</h5>
    </div>
    <div class="therichpost-bar-block">
        <a href="vendidosN" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-home fa-fw"></i>Imóveis Vendidos</a>
        <a href="alugadosN" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-home fa-fw"></i>Imóveis Alugados</a>
        <a href="reservasN" class="therichpost-bar-item therichpost-button therichpost-padding "><i
                class="fa fa-home fa-fw"></i>Imóveis Reservados</a>
        <a href="visitaN" class="therichpost-bar-item therichpost-button therichpost-padding"><i
                class="fa fa-home fa-fw"></i>Visitas Agendadas</a>
        <a href="logout" class="therichpost-bar-item therichpost-button therichpost-padding">
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
                <div class="therichpost-left"><i class="fa fa-home therichpost-xxxlarge"></i></div>
                <div class="therichpost-right">
                    <h3>52</h3>
                </div>
                <div class="therichpost-clear"></div>
                <h4><a href="vendidosN">Imóveis Vendidos</a>
                </h4>
            </div>
        </div>
        <div class="therichpost-quarter">
            <div class="therichpost-container therichpost-blue therichpost-padding-16">
                <div class="therichpost-left"><i class="fa fa-home therichpost-xxxlarge"></i></div>
                <div class="therichpost-right">
                    <h3>99</h3>
                </div>
                <div class="therichpost-clear"></div>
                <h4><a href="alugadosN">Imóveis Alugados</a>
                </h4>
            </div>
        </div>
        <div class="therichpost-panel">
            <div class="therichpost-row-padding" style="margin:0 -16px">
                <div class="therichpost-twothird">
                    <h5>Terrenos</h5>
                    <div class="scrollable-container" style="width : 900px">
                        <table class="therichpost-table therichpost-striped therichpost-white">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-home therichpost-text-blue therichpost-large"></i></th>
                                    <th>Proprietário</th>
                                    <th>Bairro</th>
                                    <th>Área</th>
                                    <th>Preço</th>
                                    <th>Rua</th>
                                    <th>Zona</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($terrenos as $terreno)
                                    <tr>
                                        <th><i class="fa fa-home therichpost-text-blue therichpost-large"></i></th>
                                        <td>{{ $terreno->cliente->nome }}</td>
                                        <td>{{ $terreno->bairro }}</td>
                                        <td>{{ $terreno->area }}</td>
                                        <td>{{ $terreno->preco }}</td>
                                        <td>{{ $terreno->rua }}</td>
                                         <td>{{ $terreno->zona }}</td>
                                         <td class="button-container">
                                            <button class="therichpost-button therichpost-red">Vender</button>
                                            <button class="therichpost-button therichpost-blue">Alugar</button>
                                        </td>
                                    </tr>
                                    @endforeach                                
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h5>Apartamentos</h5>
                    <div class="scrollable-container">
                        <table class="therichpost-table therichpost-striped therichpost-white" style="width: 1500px;">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                                    <th>Proprietário</th>
                                    <th>Bairro</th>
                                    <th>Área</th>
                                    <th>Preço</th>
                                    <th>Rua</th>
                                    <th>Ano de Construção</th>
                                    <th>Topologia</th>
                                    <th>Apartamento</th>
                                    <th>Edifício</th>
                                    <th>Andar</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apartamentos as $apartamento)
                                <tr>
                                    <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                                    <td>{{ $apartamento->cliente->nome }}</td>
                                    <td>{{ $apartamento->bairro }}</td>
                                    <td>{{ $apartamento->area }}</td>
                                    <td>{{ $apartamento->preco }}</td>
                                    <td>{{ $apartamento->rua }}</td>
                                    <td>{{ $apartamento->anoConstrucao }}</td>
                                    <td>{{ $apartamento->topologia }}</td>
                                    <td>{{ $apartamento->apartamento }}</td>
                                    <td>{{ $apartamento->edificio }}</td>
                                    <td>{{ $apartamento->andar }}</td>
                                    <td class="button-container">
                                        <button class="therichpost-button therichpost-red">Vender</button>
                                        <button class="therichpost-button therichpost-blue">Alugar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                        <h5>Vivendas</h5>
                    <div class="scrollable-container">
                        <table class="therichpost-table therichpost-striped therichpost-white" style="width: 1500px">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-home therichpost-text-blue therichpost-large"></i></th>
                                    <th>Proprietário</th>
                                    <th>Bairro</th>
                                    <th>Área</th>
                                    <th>Preço</th>
                                    <th>Rua</th>
                                    <th>Ano de Construção</th>
                                    <th>Topologia</th>
                                    <th>Casa</th>
                                    <th>Andares</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vivendas as $vivenda)
                                <tr>
                                    <th><i class="fa fa-users therichpost-text-blue therichpost-large"></i></th>
                                    <td>{{ $apartamento->cliente->nome }}</td>
                                    <td>{{ $vivenda->bairro }}</td>
                                    <td>{{ $vivenda->area }}</td>
                                    <td>{{ $vivenda->preco }}</td>
                                    <td>{{ $vivenda->rua }}</td>
                                    <td>{{ $vivenda->anoConstrucao }}</td>
                                    <td>{{ $vivenda->topologia }}</td>
                                    <td>{{ $vivenda->casa }}</td>
                                    <td>{{ $vivenda->andares }}</td>
                                    <td class="button-container">
                                        <button class="therichpost-button therichpost-red">Vender</button>
                                        <button class="therichpost-button therichpost-blue">Alugar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @endsection