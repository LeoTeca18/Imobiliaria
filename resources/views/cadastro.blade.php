<!-- resources/views/cadastro.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>

    <form action="{{ route('cadastro.store') }}" method="POST">
        @csrf
        <label for="chk" aria-hidden="true">Cadastro</label>
        <input type="text" name="nome" placeholder="Nome" required="">
        <input type="text" name="telefone" placeholder="Telefone" required="">
        <input type="email" name="email" placeholder="Email" required="">
        <input type="password" name="pswd" placeholder="Senha" required="">
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>