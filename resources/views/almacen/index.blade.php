@extends('adminlte::page')

@section('title', 'Lista de materiales')

@section('content_header')
    
        <a href="{{ route('almacen.create')}}" class="float-right btn btn-primary btn-sm">Crear material  <i class="fas fa-plus-circle"></i></a>
        
        <h1>Lista de materiales</h1>
   
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

                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($almacens as $almacen)
                                <tr width="10px" >
                                    <td>
                                        {{$almacen->nombre}}
                                    </td>

                                    <td width="10px" >
                                        {{$almacen->cantidad}}
                                    </td>
                                    <td width="10%" >
                                        
                                        <img class="" src=".@if($almacen->imagen_evidencia){{Storage::url($almacen->imagen_evidencia)}}@else {{($almacen->imagen_evidencia)}}   @endif" alt="{{$almacen->nombre}}" width="100%">

                                    </td>
                                    <td width="40%"  class="d-flex justify-content-between mx-auto">

                                        <a href="{{ route('almacen.edit', $almacen) }}"  class="btn btn-success btn-sm transition " type="button"><i class="far fa-edit"></i> </a>
                                        
                                        <a href="{{ route('almacen.show', $almacen) }}"  class="btn btn-primary btn-sm transition  " type="button"> <i class="far fa-eye"></i></a>

                                        <form action="{{ route('almacen.destroy', $almacen) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="nombre" value="{{ Auth::user()->name;}}">
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
                {{$almacens->links()}}
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