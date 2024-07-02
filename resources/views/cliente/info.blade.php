<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária Imotec</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<style>
header.a {
    background-color: black;
    color: white;
}

header.a nav ul li a {
    color: white;
}

.link-list {
    color: black;
    text-decoration: none;
}

.link-list a {
    color: black;
    text-decoration: none;
    /* Remove o sublinhado dos links */
}

a {
    color: #fff;
    text-decoration: none;
}
</style>

<body>

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
        <img src="img/imotec.jpg" alt="Descrição da imagem" width="1350" height="500">
    </div>
    <div class="container">
        <h2>Propriedade 1</h2>
        <div class="property-list">
            <div class="property">
                <img src="/img/{{ $terreno->img }}" alt="{{ $terreno->nome }}">
        <h2>{{ $terreno->nome }}</h2>
        <p>Preço: {{ $terreno->preco }} Kz</p>
        <p>Descrição: {{ $terreno->descricao }}</p>
        <div class="actions">
            <a href="#" class="botao-laranja">Ver Mais</a>
            <a href="#" class="link-list">+ Comprar</a>
            <a href="#" class="link-list">+ Reservar</a>
            <a href="#" class="link-list">+ Agendar Visita</a>
            <a href="#" class="link-list">+ Alugar</a>
        </div>
        </div>
        </div>
        </div>
</body>

</html>