
@extends('adminlte::page')

@section('title', 'Detalles de la orden ')

@section('content_header')
    <h1>Ordenes Seguridad  - Detalles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        
                <div class="form-row">
                    @csrf
                    @method('PUT')

                    <div class="form-group col-md-8">
                        <label for="nombre">Nombre:</label>
                        <h6>{{ $seguridad->nombre}} </h6>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="cantidad">Cantidad:</label>
                        <h6>{{ $seguridad->cantidad}} </h6>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="bienNAcional">Número de bien nacional:</label>

                        <h5>{{ $seguridad->num_bien_nacional}}</h5>
                    </div>
        

                    <div class="form-group col-md-8">
                        <label for="">Descripción</label>
                         <p>{{ $seguridad->descripcion}}</p>
                    </div>
        
                

                    <div class="form-group col-md-6 mx-auto align-self-aut">
                        <label for="">Imagen</label>
                        <br>
                        <img class="" src="{{Storage::url($seguridad->imagen_evidencia)}}" alt="{{$seguridad->nombre}}"  width="400px " height="300px">
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