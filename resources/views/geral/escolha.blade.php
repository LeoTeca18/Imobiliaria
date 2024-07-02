<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Tipo de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="{{ route('escolha') }}">
            <h1 class="text-center">Escolher Tipo de Cliente</h1>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('proprietario.imoveis') }}" class="btn btn-primary btn-lg me-3">Proprietário</a>
                <a href="{{ route('cliente.imoveis') }}" class="btn btn-secondary btn-lg">Normal</a>
            </div>
        </form>
    </div>
</body>
</html>