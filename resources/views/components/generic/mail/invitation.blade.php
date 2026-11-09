<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>{{$invitation->title}}</h1>
<div>
    @foreach(unserialize($invitation->content) as $paragraph)
        <p>{{$paragraph}}</p>
    @endforeach

</div>
</body>
</html>
