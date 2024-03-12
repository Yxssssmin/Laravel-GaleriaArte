@extends('layouts.app')

<body>

    <h1 class="text-center p-3">GALERÍA DE ARTE</h1>

    @if (session('correcto'))
        <div class="alert alert-success">{{ session('correcto') }}</div>
    @endif

    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->autor }}</td>
                        <td>{{ $item->precio_euros }}</td>
                        <td>{{ $item->ubicacion }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $item->id }}"
                                class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square">✍🏼</i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('arte.delete', $item->id) }}" onclick="return res()"
                                class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash">🗑️</i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('arte.detallesCuadro', $item->id) }}" class="btn btn-light">
                                <i class="fa-regular fa-eye">👁️</i>
                            </a>
                        </td>

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

                    </tr>
                @endforeach
            </tbody>
        </table>
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
