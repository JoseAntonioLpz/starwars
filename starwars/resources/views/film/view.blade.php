<!DOCTYPE html>
<html>
    <head>
        <title>
            Star wars films
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
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
                        $.post('/character', {name : $(this).data('name'), "_token": "{{ csrf_token() }}" }).done(function(data){
                            //console.log(data);
                            $('#message').text(data);
                        });
                    });
                });
        </script>
    </body>
</html>