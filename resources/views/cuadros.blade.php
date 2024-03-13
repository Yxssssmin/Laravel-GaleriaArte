@extends('layouts.app')

<body>

    <h1 class="text-center p-3">GALERÍA DE ARTE</h1>

    @if (session('correcto'))
        <div class="alert alert-success">{{ session('correcto') }}</div>
    @endif

    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <div class="p-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($datos as $item)
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Id: {{ $item->id }}</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Nombre: {{ $item->nombre }}</h6>
                            <p class="card-text">Autor: {{ $item->autor }}</p>
                            <p class="card-text">Precio: {{ $item->precio_euros }}</p>
                            <p class="card-text">Ubicación: {{ $item->ubicacion }}</p>
                            <p class="card-text">Descripción: {{ $item->descripcion }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $item->id }}"
                                class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> ✍🏼
                            </a>
                            <a href="{{ route('arte.delete', $item->id) }}" onclick="return res()"
                                class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>🗑️
                            </a>
                            <a href="{{ route('arte.detallesCuadro', $item->id) }}" class="btn btn-light">
                                <i class="fa-regular fa-eye"></i> 👁️
                            </a>
                            <a href="{{ route('cuadro.importItems', $item->id) }}" class="btn btn-outline-secondary">
                                + ETE
                            </a>
                        </div>
    
                       
                    <!-- Modal de modificar datos -->
                    <div class="modal fade" id="modalEditar{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos del producto
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('arte.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Id del cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtcodigo"
                                                value="{{ $item->id }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre del
                                                cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtnombre"
                                                value="{{ $item->nombre }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Autor del
                                                cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtautor"
                                                value="{{ $item->autor }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio del
                                                cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtprecio"
                                                value="{{ $item->precio_euros }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Ubicacion del
                                                cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtubicacion"
                                                value="{{ $item->ubicacion }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Descripcion del
                                                cuadro</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtdescripcion"
                                                value="{{ $item->descripcion }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

    <a href="{{ route('arte.mostrarFormulario') }}" class="btn btn-success" style="margin-left: 40%">Añadir
        producto</a><br>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbfu-vRu7k7naT-Fh_457upAICHgZW1UI&callback=initAutocomplete&libraries=places&v=weekly"
        async defer></script>
    <script src="{{ asset('./js/maps.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        var res = function() {
            var not = confirm("¿Estás seguro de eliminar?");
            return null;
        }
    </script>
</body>

</html>
