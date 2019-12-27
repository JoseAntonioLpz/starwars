<!DOCTYPE html>
<html>
    <head>
        <title>
            Star wars films
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        @include('includes.header')
        @if(Auth::check())
            <p>Bienvenido {{ Auth::user()->name }}</p>
            <br>
            <p>{{ $film['title'] }}</p>
            <p>{{ $film['opening_crawl'] }}</p>
            <p>Characters List:</p>
            <h2 id="message"></h2>
            @foreach($film['characters'] as $character)
                <p><a class="character" data-name="{{ $character['name'] }}" href="#">{{ $character['name'] }}</a></p>
            @endforeach
            <br>
        @else
            Debes estar logueado para acceder a este sitio
        @endif
        
        <script type="text/javascript">
                $(document).ready(function(){
                    $('.character').on('click', function(event){
                        event.preventDefault();
                        var pj = $(this).data('name');
                        $.post("{{route('character_store')}}", {name : $(this).data('name'), 
                            "_token": $('meta[name="csrf-token"]').attr('content')}
                              ).done(function(data){
                            //console.log(data);
                            $('#message').text(pj + " | " + data);
                        });
                    });
                });
        </script>
    </body>
</html>