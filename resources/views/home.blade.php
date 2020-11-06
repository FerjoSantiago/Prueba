@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify">
        <div class="col-md-12">
            
            <a href="{{route('usuario.create')}}" class="btn btn-primary">Crear usuario nuevo</a>
            <p></p>
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header text-center"><h3><strong>{{ __('Usuarios') }}</strong></h3></div>

                <div class="card-body text-info">
                    @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped table-dark">
                        
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope='col'>Editar</th>
                                <th scope='col'>Eliminar</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td> {{$usuario->id}} </td>
                                <td> {{$usuario->name}} </td>
                                <td> {{$usuario->email}} </td>
                                <td> {{$usuario->created_at}} </td>
                                <td> 
                                    <a href="{{route('usuarios.edit', $usuario)}}" class="btn btn-warning">Editar usuario</a>
                                </td>
                                <td>
                                    <a href="{{route('usuarios.destroy', $usuario)}}" class="btn btn-danger" onclick="return confirm('¿Deseas borrar este usuario?')">Eliminar usuario</a>
                                </td>
                            </tr> 
                            @endforeach
                            
                        </tbody>

                    </table>
                    
                </div>
            </div>
        </div>

        {{$usuarios->links()}}
    </div>
</div>

@endsection
