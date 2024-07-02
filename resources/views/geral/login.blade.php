<!DOCTYPE html>
<html>

<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<style>
.signup label {
    font-size: 24px;
    margin-bottom: 10px;
}
</style>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup"> 
            <form action="{{ route('cadastro.store') }}" method=" POST">
                @csrf
                <label for="chk" aria-hidden="true">Cadastro</label>
                <input type="text" name="nome" placeholder="Nome" required="">
                <input type="text" name="telefone" placeholder="Telefone" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="senha" placeholder="Senha" required="">
                <button>Cadastrar</button>
            </form>
        </div>
@if($mensagem = Session::get('erro'))
    {{$mensagem}}
@endif
        <div class="login">
            <form action="{{ route('login') }}" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="senha" placeholder="Senha" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
</body>

</html>