<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
</head>
<body>
    <h1>Eventos cadastrados no sistema:</h1>
    <p>--------------------------------------------------------------------------------</p>
    @foreach($events as $event)
    <h2>Nome do evento: {{$event->title}}</h2>
    <p>Data do evento: {{$event->date}}</p>
    <p>Local do evento: {{$event->city}}</p>
    <p>--------------------------------------------------------------------------------</p>
    @endforeach
</body>
</html>