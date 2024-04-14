
<div>
<link href="./output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
    <style>
        .custom-container {
            max-width: 800px;
            /* Ajusta el ancho máximo del contenedor según tus necesidades */
            position: relative;
            /* Agregamos posición relativa al contenedor */
        }
    </style>


<div class="container custom-container">
        @if(session('message') && session('message')['success'])
        <div id="custom-alert" class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
            {{ session('message')['success'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function () {
                document.getElementById('custom-alert').remove();
            }, 2000); // Cambia 5000 por el número de milisegundos que deseas que el mensaje se muestre (en este caso, 5 segundos)
        </script>
        @endif

        <div class="row align-items-center">
            <div class="col">
                <h2 class="text-center text-black">Lista de Usuarios</h2>
                <a href="{{ route('admin.users.create') }}" class="btn btn-warning float-end">Crear usuario</a>
            </div>

        </div>
        <div class="table-container">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info">Ver</a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal{{ $user->id }}" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal{{ $user->id }}" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal{{ $user->id }}">Eliminar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $user->id }}">
                                                Confirmar eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar al usuario "{{ $user->name }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form id="deleteForm{{ $user->id }}"
                                                action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                Resultados {{$users->firstItem()}} al {{$users->lastItem()}} de {{$users->total()}}
                {{$users->links()}}
            </div>
        </div>
    </div>


</div>
