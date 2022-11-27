@extends('adminlte::page')

@section('title', 'Log de auditoria ')

@section('content_header')


        
    <h1>Log de auditoria del sistema</h1>

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

                        <th>Usuario </th>
                        <th>Direccion ip </th>
                        <th>Accion </th>
                        <th>Area Afectada </th>
                        <th>Campo afectado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($logs as $log)
                            <tr width="" >
                                <td>
                                    {{$log->usuario_name}}
                                </td>

                                <td width="" >
                                    {{$log->ip}}
                                </td>
                                
                                <td width="" >
                                    {{$log->accion}}
                                </td>

                                <td width="" >
                                    {{$log->area }}
                                </td>
                                <td width="" >
                                    {{$log->nombre_campo}}
                                </td>
                                <td width="" >
                                    {{$log->created_at}}
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
            {{$logs->links()}}
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