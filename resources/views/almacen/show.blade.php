
@extends('adminlte::page')

@section('title', 'Detalles material ')

@section('content_header')
    <h1>Almacen de Ingenieria - Detalles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        
                <div class="form-row">
                    @csrf
                    @method('PUT')

                    <div class="form-group col-md-8">
                        <label for="nombre">Nombre:</label>
                        <h6>{{ $almacen->nombre}} </h6>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="cantidad">Cantidad:</label>
                        <h6>{{ $almacen->cantidad}} </h6>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="bienNAcional">Número de bien nacional:</label>

                        <h5>{{ $almacen->num_bien_nacional}}</h5>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label >Estado:</label>

                        <h5>{{ $almacen->estado}}</h5>  
                        

                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="">Descripción</label>
                         <p>{!! $almacen->descripcion !!}</p>
                    </div>
        
                

                    <div class="form-group col-md-6 mx-auto align-self-aut">
                        <label for="">Imagen</label>
                        <br>
                        <img class="" src="{{Storage::url($almacen->imagen_evidencia)}}" alt="{{$almacen->nombre}}"  width="400px " height="300px">
                    </div>

                
                </div>
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
@stop

@section('js')
    
@stop