<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('./css/mapa.css') }}">
</head>
<body>

    <div class="contenedorMapa">
        <h1 class="fs-5 text-center">Detalles del Cuadro</h1>
        <div class="col">
            <h3>ID del Cuadro: {{ $cuadro->id }}</h3>
            <h3>Nombre: {{ $cuadro->nombre }}</h3>
            <h3>Autor: {{ $cuadro->autor }}</h3>
            <h3>Precio: {{ $cuadro->precio_euros }}</h3>
            <div id="ubicacion">
                <h3>Ubicación: {{ $cuadro->ubicacion }}</h3>
            </div>
            <h3>Descripción: {{ $cuadro->descripcion }}</h3>
            <div class="valoracion">
                <i class="fa-regular fa-star"></i>
            </div>
        </div>
        <hr>
        <div id="map"></div>
    </div>

    {{-- <div>
        <h2>{{ $cuadro->nombre }}</h2>
        <!-- Otras propiedades del cuadro -->
    
        @if($cuadro->votos > 0)
            <p>Puntuación media: {{ number_format($cuadro->valoracion / $cuadro->votos, 1) }} ({{ $cuadro->votos }} votos)</p>
        @else
            <p>Este cuadro aún no ha sido votado.</p>
        @endif
    
        <!-- Estrellas para la votación -->
        <div class="rating">
            @for ($i = 1; $i <= 5; $i++)
                <span class="star" data-value="{{ $i }}" title="{{ $i }}"></span>
            @endfor
        </div>
    
        <!-- Formulario oculto para la votación -->
        <form id="votarForm" method="post" action="{{ route('cuadro.votar', ['cuadro' => $cuadro->id]) }}">
            @csrf
            <input type="hidden" name="voto" id="voto" value="1"> <!-- Valor predeterminado, puedes cambiarlo según la lógica que prefieras -->
        </form>
    </div>
    
    <script>
        $(document).ready(function() {
            // Manejar clics en estrellas
            $('.star').on('click', function() {
                var value = $(this).data('value');
                $('#voto').val(value);
                $('#votarForm').submit();
            });
        });
    </script> --}}
    
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbfu-vRu7k7naT-Fh_457upAICHgZW1UI&callback=initAutocomplete&libraries=places&v=weekly"
        async defer></script>
    <script src="{{ asset('./js/maps.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>

