<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--         BOOTSTRAP           --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('./css/styles.css') }}">
</head>

<body>

    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('arte.bienvenida') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arte.index') }}" class="nav-link active">Cuadros</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
        </header>
    </div>


    <form action="{{ route('arte.create') }}" method="post">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    @csrf

                    @if (session('correcto'))
                        <div class="alert alert-success text-center">{{ session('correcto') }}</div>
                    @endif

                    @if (session('incorrecto'))
                        <div class="alert alert-danger text-center">{{ session('incorrecto') }}</div>
                    @endif

                    <h2 class="fs-5 text-center">Registro de cuadros</h2>

                    <hr>
                    <div class="mb-3">
                        <label for="txtcodigo" class="form-label">Id</label>
                        <input type="text" class="form-control" id="txtcodigo" name="txtcodigo">
                    </div>

                    <div class="mb-3">
                        <label for="txtnombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtnombre" name="txtnombre">
                    </div>

                    <div class="mb-3">
                        <label for="txtautor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="txtautor" name="txtautor">
                    </div>

                    <div class="mb-3">
                        <label for="txtprecio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="txtprecio" name="txtprecio">
                    </div>

                    <div class="mb-3">
                        <label for="txtubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="autocomplete" name="txtubicacion">
                    </div>

                    <div class="mb-3">
                        <label for="txtdescripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion">
                        {{-- <textarea class="form-control" rows="5" id="txtdescripcion" name="txtdescripcion"> --}}
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbfu-vRu7k7naT-Fh_457upAICHgZW1UI&callback=initAutocomplete&libraries=places&v=weekly"
        async defer></script>
    <script src="{{ asset('./js/maps.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
