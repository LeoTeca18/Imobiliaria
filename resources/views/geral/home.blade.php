@extends('layouts.home')
@section('estilo')

<body>

    <header class="a">
        <a href="login">

            <h1> <img src="img/logo.png" class="logo" width="80" height="80">Imobiliária Imotec</h1>
        </a>
        <p>Bem-vindo à nossa imobiliária</p>
        <nav>
            <ul>
                <!-- Botões de login e cadastro -->
                <li><a href="login">Listar Resevas</a></li>
                <li><a href="login">Listar Visitas</a></li>
                <li><a href="login">Login</a></li>
                <li><a href="login">Imóveis Alugados</a></li>
                <li><a href="login">Imóveis Comprados</a></li>
            </ul>
        </nav>
    </header>
    <div class="b">
        <img src="img/imotec.jpg" alt="Descrição da imagem" width="1263" height="500">
    </div>
    <div class="container">
        <h2>Propriedades em Destaque</h2>
        <div class="property-list">
            @if($terreno)
            <div class="property">
                <img src="img/{{ $terreno->img }}">
                <h2>{{ $terreno->nome }}</h2>
                <p>{{ $terreno->preco }} Kz</p>
                <ul class="link-container">
                    <a href="login" class="botao-laranja">Ver Mais</a>
                    <a href="login" class="link-list">+ Comprar</a>
                    <a href="login" class="link-list">+ Reservar</a>
                    <a href="login" class="link-list">+ Agendar Visita</a>
                    <a href="login" class="link-list">+ Alugar</a>
                </ul>
            </div>
            @endif
    
            @if($apartamento)
            <div class="property">
                <img src="img/{{ $apartamento->img }}">
                <h2>{{ $apartamento->nome }}</h2>
                <p>{{ $apartamento->preco }} Kz</p>
                <ul class="link-container">
                    <a href="login" class="botao-laranja">Ver Mais</a>
                    <a href="login" class="link-list">+ Comprar</a>
                    <a href="login" class="link-list">+ Reservar</a>
                    <a href="login" class="link-list">+ Agendar Visita</a>
                    <a href="login" class="link-list">+ Alugar</a>
                </ul>
            </div>
            @endif
    
            @if($vivenda)
            <div class="property">
                <img src="img/{{ $vivenda->img }}">
                <h2>{{ $vivenda->nome }}</h2>
                <p>{{ $vivenda->preco }} Kz</p>
                <ul class="link-container">
                    <a href="login" class="botao-laranja">Ver Mais</a>
                    <a href="login" class="link-list">+ Comprar</a>
                    <a href="login" class="link-list">+ Reservar</a>
                    <a href="login" class="link-list">+ Agendar Visita</a>
                    <a href="login" class="link-list">+ Alugar</a>
                </ul>
            </div>
            @endif
        </div>
        <br>
        <div class="main-button text-center">
            <a href="login" class="botao-laranja">Ver Propriedades</a>
        </div>
    @endsection