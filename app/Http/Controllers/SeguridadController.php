<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Seguridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SeguridadController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:seguridad.index')->only('index');
    //     $this->middleware('can:seguridad.create')->only('create','store');
    //     $this->middleware('can:seguridad.edit')->only('edit','update');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguridads = Seguridad::paginate(10);
        return view('seguridad.index',compact('seguridads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'bienNAcional' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
    
            $seguridad = $request->all();
    
            $seguridad = [     
                            'nombre' => $request->nombre,
                            'cantidad' => $request->cantidad,
                            
                            'num_bien_nacional' => $request->bienNAcional, 
                            'imagen_evidencia' => $request->imagen,
                            'descripcion' => $request->descripcion,
                        ];
            if($imagen =$request->hasFile('imagen')){
                $imageName = time() . '.' . $request->imagen->extension();
                $seguridad['imagen']=$request->file('imagen')->store('ordenes','public');
    
                $urlimage ='public/'.$seguridad['imagen'];
            }
            $seguridad = [     
                'imagen_evidencia'  =>  $urlimage,
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                
                'num_bien_nacional' => $request->bienNAcional, 
                
                'descripcion' => $request->descripcion,
                ];
                
                Seguridad::create($seguridad);

                $usuario_create = Auth::user()->name;
                $ip = $request->ip();
                // $mac = $request->mac();
                $area = 'Ordenes - Seguridad';
                $accion = 'Guardar orden';
                $nombre_campo = $request->nombre;

                $log=[
                    'usuario_name'  =>  $usuario_create,
                    // 'mac'  =>  $mac,
                    'ip'  =>  $ip,
                    'area'  =>  $area,
                    'nombre_campo'  =>  $nombre_campo,
                    'accion'  =>  $accion,
                    
                ];
        
                Log::create($log);

                return redirect()->route("seguridad.index")->with(['info' => '¡Bien! se ha creado la orden con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seguridad $seguridad)
    {
        return view('seguridad.show',compact('seguridad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seguridad $seguridad)
    {
        return view('seguridad.edit',compact('seguridad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        

        
        $datosSeguridad = $request->all();

        
            $datosSeguridad = [     
                'nombre' => $request->nombre,
                'cantidad' => $request->cantidad,
                
                'num_bien_nacional' => $request->bienNAcional, 
                'imagen_evidencia' => $request->imagen,
                'descripcion' => $request->descripcion,
            ];
                

        if($request->hasFile('imagen')){


        $seguridad = Seguridad::findOrFail($id);

        Storage::delete([$seguridad->imagen_evidencia]);

        $seguridad['imagen_evidencia']=$request->file('imagen')->store('ordenes','public');
        $urlimage ='public/'.$seguridad['imagen_evidencia'];
        
        $datosSeguridad = [     
            'imagen_evidencia'  =>   $urlimage,
            ];

    }   
    
        
        Seguridad::where('id','=',$id)->update($datosSeguridad);

        $seguridad = Seguridad::findOrFail($id);

        $usuario_create = Auth::user()->name;
        $ip = $request->ip();
        // $mac = $request->mac();
        $area = 'Ordenes - Seguridad';
        $accion = 'Editar orden';
        $nombre_campo = $request->nombre;

        $log=[
            'usuario_name'  =>  $usuario_create,
            // 'mac'  =>  $mac,
            'ip'  =>  $ip,
            'area'  =>  $area,
            'nombre_campo'  =>  $nombre_campo,
            'accion'  =>  $accion,
            
        ];
        Log::create($log);

        $datosSeguridad = [     
            'imagen_evidencia'  =>  $urlimage,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'num_bien_nacional' => $request->bienNAcional, 
            'descripcion' => $request->descripcion,
            ];
            

            Seguridad::create($datosSeguridad);

        return redirect()->route("seguridad.index")->with(['info' => '¡Se actualizo la informacion de la ordene con exito.!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Seguridad $seguridad)
    {

        $usuario_create = Auth::user()->name;
        $ip = $request->ip();
        // $mac = $request->mac();
        $area = 'Ordenes - Seguridad';
        $accion = 'Eliminar orden';
        $nombre_campo = $request->nombre;

        $log=[
            'usuario_name'  =>  $usuario_create,
            // 'mac'  =>  $mac,
            'ip'  =>  $ip,
            'area'  =>  $area,
            'nombre_campo'  =>  $nombre_campo,
            'accion'  =>  $accion,
            
        ];
        Log::create($log);
        Storage::delete([$seguridad->imagen_evidencia]);
        $seguridad->delete();
        return redirect()->route("almacen.index")->with(["info" => "Material eliminado con exito.!",]);
    }
}
