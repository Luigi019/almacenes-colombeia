@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Perfil de usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-center"> Perfil de usuario</h5>
        </div>
        <div class="card-body">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre y apellido</label>
                <input type="text" value="{{auth()->user()->name}}" readonly class="form-control" id="inputEmail4" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Correo electronico</label>
                <input type="email" value="{{auth()->user()->email}}" readonly class="form-control" id="inputPassword4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Area de trabajo</label>
                <input type="text" value="Gerencia de ingenieria" readonly class="form-control" id="inputPassword4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Rol del Usuario</label>
                <input type="text" value="usuario" readonly class="form-control" id="inputPassword4">
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop