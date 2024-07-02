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
            <li><a href="login">Login</a></li>
            <li><a href="alugadosC">Imóveis Alugados</a></li>
            <li><a href="comprados">Imóveis Comprados</a></li>
        </ul>
    </nav>
</header>
<div class="b">
    <img src="img/imotec.jpg" alt="Descrição da imagem" width="1260" height="500">
</div>
<div class="c">
    <div class="search-bar">
        <input type="text" placeholder="Pesquisar propriedades...">
        <button type="button">Pesquisar</button>
    </div>
    <h2 class="text-center"> Propriedades</h2>
    <div class="property-list">
        @foreach($terrenos as $terreno)
        <div class="property">
            <img src="img/{{ $terreno->img }}" alt="{{ $terreno->nome }}">
            <h2>{{ $terreno->nome }}</h2>
            <p>{{ $terreno->preco }} Kz</p>
            <ul class="link-container">
                <a href="info" class="botao-laranja">Ver Mais</a>
                <a href="info" class="link-list">+ Comprar</a>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endforeach

        @foreach($apartamentos as $apartamento)
        <div class="property">
            <img src="img/{{ $apartamento->img }}" alt="{{ $apartamento->nome }}">
            <h2>{{ $apartamento->nome }}</h2>
            <p>{{ $apartamento->preco }} Kz</p>
            <ul class="link-container">
                <a href="info" class="botao-laranja">Ver Mais</a>
                <a href="info" class="link-list">+ Comprar</a>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endforeach

        @foreach($vivendas as $vivenda)
        <div class="property">
            <img src="img/{{ $vivenda->img }}" alt="{{ $vivenda->nome }}">
            <h2>{{ $vivenda->nome }}</h2>
            <p>{{ $vivenda->preco }} Kz</p>
            <ul class="link-container">
                <a href="info" class="botao-laranja">Ver Mais</a>
                <a href="info" class="link-list">+ Comprar</a>
                <a href="info" class="link-list">+ Reservar</a>
                <a href="info" class="link-list">+ Agendar Visita</a>
                <a href="info" class="link-list">+ Alugar</a>
            </ul>
        </div>
        @endforeach
    </div>
@endsection
</html>