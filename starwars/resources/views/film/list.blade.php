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
            <p>LISTADO DE PELICULAS DE STAR WARS:</p>
            <br>
        
            @foreach ($list as $key => $film)
                @php
                    $matches = array();
                    preg_match('/[0-9]/', $film['url'], $matches); 
                @endphp
                <p><a href="{{route('view_film', $matches[0])}}">{{ $film['title'] }}</a></p>
            @endforeach
        @else
            Debes estar logueado para acceder a este sitio
        @endif
    </body>
</html>