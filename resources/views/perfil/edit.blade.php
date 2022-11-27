@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Asignar perfil a usuario</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h6>{{session('info')}}</h6>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif
<div class="contenedor">
    @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
    <div class="card role">
        
        <form method="POST" action="{{route("perfil.update", $users->id)}}">
            @method("PUT")
            @csrf

            <div class="form-group col-md-8 role" >
                <h6 class="role">Nombre de usuario</h6>
                <h4 class="role">{{$users->name}}</h4>

            </div>

            <div class="form-group col-md-8">
                <label >Seleccione perfil que se asignara al usuario:</label>
                @foreach ($roles as $role )
                <div>
                    <label>
                        {!! Form::checkbox('perfiles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->id}}
                        {{$role->name}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group col-md-12 align-self-auto mx-auto">
                <button class="btn btn-primary" type="submit">Asignar perfil</button>
            </div>
        </form>
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
