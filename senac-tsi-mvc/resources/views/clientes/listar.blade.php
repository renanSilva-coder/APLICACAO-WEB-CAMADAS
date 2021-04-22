<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="container-md text-center pt-3">
    <h1>Clientes</h1>
    <div class="container p-4">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td>{{$cliente->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>