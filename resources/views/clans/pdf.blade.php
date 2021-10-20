<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clans</title>
</head>
<body>
    <h1>Clans cadastrados no sistema:</h1>
    <p>--------------------------------------------------------------------------------</p>
    @foreach($clans as $clan)
    <h2>Nome do clan: {{$clan->name}}</h2>
    <p>Cidade do clan: {{$clan->city}}</p>
    <p>Descrição do clan: {{$clan->description}}</p>
    <p>--------------------------------------------------------------------------------</p>
    @endforeach
</body>
</html>