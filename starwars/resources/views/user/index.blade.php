<!DOCTYPE html>
<html>
    <head>
        <title>
            Star wars films
        </title>
    </head>
    <body>
        @include('includes.header')
        @if(Auth::check())
            <p>Bienvenido {{ Auth::user()->name }}</p>
            <br>
            <p>LISTADO DE PERSONAJES FAVORITOS DE STAR WARS:</p>
            <br>
        
            @foreach ($favs as $key => $character)
                <p> {{$character->name}} </p>
            @endforeach
        @else
            Debes estar logueado para acceder a este sitio
        @endif
    </body>
</html>