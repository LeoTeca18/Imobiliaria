@extends('layouts.home')
@section('estilo')

<header class="a">
    <a href="cliente">
        <h1><img src="img/logo.png" class="logo" width="80" height="80">Imobiliária Imotec</h1>
    </a>
    <p>Bem-vindo à nossa imobiliária</p>
    <nav>
        <ul>
            <!-- Botões de login e cadastro -->
            <li><a href="reservas">Listar Resevas</a></li>
            <li><a href="visita">Listar Visitas</a></li>
            <li><a href="logout">Logout</a></li>
            <li><a href="alugadosC">Imóveis Alugados</a></li>
            <li><a href="comprados">Imóveis Comprados</a></li>
        </ul>
    </nav>
</header>
<div class="b">
    <img src="img/imotec.jpg" alt="Descrição da imagem" width="1260" height="500">
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
                <a href="info" class="botao-laranja">Ver Mais</a>
                <form method="POST" action="{{ route('compra', ['id' => $terreno->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="therichpost-button therichpost-blue">Comprar</button>
                </form>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endif

        @if($apartamento)
        <div class="property">
            <img src="img/{{ $apartamento->img }}">
            <h2>{{ $apartamento->nome }}</h2>
            <p>{{ $apartamento->preco }} Kz</p>
            <ul class="link-container">
                <a href="info" class="botao-laranja">Ver Mais</a>
                <form method="POST" action="{{ route('compra', ['id' => $apartamento->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="therichpost-button therichpost-blue">Comprar</button>
                </form>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endif

        @if($vivenda)
        <div class="property">
            <img src="img/{{ $vivenda->img }}">
            <h2>{{ $vivenda->nome }}</h2>
            <p>{{ $vivenda->preco }} Kz</p>
            <ul class="link-container">
                <a href="info" class="botao-laranja">Ver Mais</a>
                <form method="POST" action="{{ route('compra', ['id' => $vivenda->id]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="therichpost-button therichpost-blue">Comprar</button>
                </form>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endif
    </div>
    <br>
    <div class="main-button text-center">
        <a href="ver" class="botao-laranja">Ver Propriedades</a>
    </div>

    @endsection