<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeria de Arte</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--         BOOTSTRAP           --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Agrega esta etiqueta script en la sección head de tu archivo Blade -->

    <link rel="stylesheet" href="{{ asset('./css/welcome.css') }}">

</head>

<body>

    <header class="d-flex justify-content-center py-3">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('arte.bienvenida') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arte.index') }}" class="nav-link active">Cuadros</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
        </div>
    </header>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbfu-vRu7k7naT-Fh_457upAICHgZW1UI&callback=initAutocomplete&libraries=places&v=weekly"
        async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
