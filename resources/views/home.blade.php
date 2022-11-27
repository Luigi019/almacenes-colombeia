@extends('adminlte::page')

@section('title', 'Inicio de sistema de inventario')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-header">
        <h5 class="card-title">Bienvenid@ (<b>{{auth()->user()->name}}</b>)</h5>
        </div>
        <br>
        <p class="card-text text-dark"> Sistema de inventario de la fundacion colombeia. </p>
    </div>
</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
