<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
    <title>Mail</title>
</head>
<body>
    <h3>Bonjour, {{ $name }}</h3>

    <h4>Utilisez le mot de passe suivant pour vous connecter</h4>

    <h1>{{ $password }}</h1>

</body>
</html>