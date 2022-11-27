
@extends('adminlte::page')

@section('title', 'Editar ordenes ')

@section('content_header')
    <h1>Seguridad - Editar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route("seguridad.update",$seguridad->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    @csrf
                    @method('PUT')

                    <div class="form-group col-md-8">
                        <label for="nombre">Nombre del usuario:</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" 
                        value="{{ $seguridad->nombre}} "
                        value="{{ old('nombre') }}" >
                    </div>
        
                    @error('nombre')
                    <br>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    <br>
                    @enderror

                    <div class="form-group col-md-8">
                        <label for="cantidad">Cantidad solicitada de material:</label>
                        <input name="cantidad" type="number" class="form-control" id="cantidad" 
                        value="{{ $seguridad->cantidad}} "
                        value="{{ old('cantidad') }}" >
                    </div>
        
                    @error('cantidad')
                    <br>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    <br>
                    @enderror

                    <div class="form-group col-md-8">
                        <label for="bienNAcional">Numero de bien nacional del material:</label>
                        <input name="bienNAcional" type="text" class="form-control" id="bienNAcional" 
                        value="{{ $seguridad->num_bien_nacional}} "
                        value="{{ old('bienNAcional') }}" >
                    </div>
        
                    @error('bienNAcional')
                    <br>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    <br>
                    @enderror


                    <div class="form-group col-md-8">
                        <label for="descripcion">Descripcion o motivo:</label>
                        <textarea name="descripcion" type="number" class="form-control" id="descripcion"
                        value="{{ $seguridad->descripcion}} "
                        value="{{ old('descripcion') }}" ></textarea>
                    </div>
        
                    @error('descripcion')
                    <br>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    <br>
                    @enderror
                    <div class="form-group col-md-8 ">
                        <label for="imagen">Ingrese imagen del estado del material:</label>
                        <input type="file" accept="image/*" class="form-control" id="seleccionArchivos"
                                name="imagen" id="imagen">
                    </div>
                    
                    @error('imagen')
                    <br>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    <br>
                    @enderror

                    <div class="form-group col-md-6 mx-auto align-self-aut">
                        <label for="">Imagen nueva:</label>
                        <img id="imagenPrevisualizacion" width="400px " height="300px">
                    </div>

                    <div class="form-group col-md-6 mx-auto align-self-aut">
                        <label for="">Imagen antigua</label>
                        <br>
                        <img class="" src="{{Storage::url($seguridad->imagen_evidencia)}}" alt="{{$seguridad->nombre}}"  width="400px " height="300px">
                    </div>

                    <div class="form-group col-md-6 align-self-auto mx-auto">
                        
                        <input  class="btn btn-primary " type="submit"  value="Crear">
                        
                        <a href="{{route('seguridad.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#descripcion' ) )
            .catch( error => {
                console.error( error );
            } );
    // Obtener referencia al input y a la imagen

        const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $seleccionArchivos.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
        // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
        });
</script>
@stop