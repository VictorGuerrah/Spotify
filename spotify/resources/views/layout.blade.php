<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    {{-- CSS --}}

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title> @yield('title') </title>

</head>
<body class="background">

    {{-- Navbar  --}}
    <nav class="navbar navbar-dark" style="background-color: #000000;">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/logo.png')}}" width="35" height="35" class="d-inline-block align-top" loading="lazy">
            Spotify
        </a>
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" name="busca" type="submit">Buscar</button>
        </form>
    </nav>


    @yield('content')

    <span class="footer"></span>

</body>
</html>