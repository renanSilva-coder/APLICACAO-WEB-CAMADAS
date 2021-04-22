<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="container-md text-center pt-3">
    <h1>Funcionários</h1>
    <div class="container p-4">
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
            @foreach($funcionarios as $funcionario)
                <tr class="table-light">
                    <td>{{$funcionario->id}}</td>
                    <td>{{$funcionario->nome}}</td>
                    <td>{{$funcionario->email}}</td>
                    <td>{{$funcionario->telefone}}</td>
                    <td>{{$funcionario->endereco}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>