@extends('adminlte::page')

@section('title', 'Lista de materiales')

@section('content_header')
    
        <a href="{{ route('seguridad.create')}}" class="float-right btn btn-primary btn-sm">Crear orden <i class="fas fa-plus-circle"></i></a>
        
        <h1>Lista de ordenes</h1>
   
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

                            <th>Nombre </th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($seguridads as $seguridad)
                                <tr width="10px" >
                                    <td>
                                        {{$seguridad->nombre}}
                                    </td>

                                    <td width="10px" >
                                        {{$seguridad->cantidad}}
                                    </td>
                                    <td width="10%" >
                                        
                                        <img class="" src=".@if($seguridad->imagen_evidencia){{Storage::url($seguridad->imagen_evidencia)}}@else {{($seguridad->imagen_evidencia)}}   @endif" alt="{{$seguridad->nombre}}" width="100%">

                                    </td>
                                    <td width="40%"  class="d-flex justify-content-between mx-auto">

                                        <a href="{{ route('seguridad.edit', $seguridad) }}"  class="btn btn-success btn-sm transition " type="button"><i class="far fa-edit"></i> </a>
                                        
                                        <a href="{{ route('seguridad.show', $seguridad) }}"  class="btn btn-primary btn-sm transition  " type="button"> <i class="far fa-eye"></i></a>

                                        <form action="{{ route('seguridad.destroy', $seguridad) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="nombre"    value="{{$seguridad->nombre}}">
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
                {{$seguridads->links()}}
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