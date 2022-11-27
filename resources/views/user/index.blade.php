@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
    
        <a href="{{ route('user.create')}}" class="float-right btn btn-primary btn-sm">Crear nuevo usuario  <i class="fas fa-plus-circle"></i></a>
        
        <h1>Lista de usuarios</h1>
   
@stop

@section('content')
    <div class="contenedor">
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h6>{{session('info')}}</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        @endif
        

        <div class="card">
            
            <div class="card-body">
                <table class="table table-light table-hover table-striped table-responsive-sm transition">
                    <thead class="thead-colombeia transition ">
                        <tr>

                            <th>Nombre y apellido</th>
                            <th>Correo</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($users as $user)
                                <tr class="transition">
                                    <td>
                                        {{$user->name}}
                                    </td>

                                    <td width="60%" >
                                        {{$user->email}}
                                    </td>
                                    
                                    <td width="px"  class="d-flex justify-content-between">

                                        <a href="{{ route('user.edit', $user) }}"  class="btn btn-success btn-sm transition " type="button"><i class="far fa-edit"></i> </a>
                                        
                                        <a href="{{ route('user.edit', $user) }}"  class="btn btn-primary btn-sm transition  " type="button"> <i class="far fa-eye"></i></a>

                                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm transition" type="submit"><i class="far fa-trash-alt"></i> </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="container">
            

            <div class="d-flex" >
                {{$users->links()}}
            </div>
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop