<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class almacenController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:almacen.index')->only('index');
        $this->middleware('can:almacen.create')->only('create','store');
        $this->middleware('can:almacen.edit')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacens = Almacen::paginate(10);
        return view('almacen.index', compact('almacens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.create');
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
        'estado' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $usuario_create = Auth::user()->name;
        $ip = $request->ip();
        // $mac = $request->mac();
        $area = 'Almacen - Ingenieria';
        $accion = 'Crear material';
        $nombre_campo = $request->nombre;

        $almacen = $request->all();

        $almacen = [     
                        'nombre' => $request->nombre,
                        'cantidad' => $request->cantidad,
                        'num_bien_nacional' => $request->bienNAcional,
                        'estado' => $request->estado, 
                        'imagen_evidencia' => $request->imagen,
                        'descripcion' => $request->descripcion,
                    ];
        if($imagen =$request->hasFile('imagen')){
            $imageName = time() . '.' . $request->imagen->extension();
            $almacen['imagen']=$request->file('imagen')->store('almacen','public');

            $urlimage ='public/'.$almacen['imagen'];
        }
        $almacen = [     
            'imagen_evidencia'  =>  $urlimage,
            'nombre'            =>  $request->nombre,
            'cantidad'          =>  $request->cantidad,
            
            'num_bien_nacional' =>  $request->bienNAcional,
            'estado'            =>  $request->estado, 
            'descripcion'       =>  $request->descripcion,
            ];
            

            Almacen::create($almacen);

            $log=[
                'usuario_name'  =>  $usuario_create,
                // 'mac'  =>  $mac,
                'ip'  =>  $ip,
                'area'  =>  $area,
                'nombre_campo'  =>  $nombre_campo,
                'accion'  =>  $accion,
                
            ];

            Log::create($log);

            return redirect()->route("almacen.index")->with(['info' => '¡Agregado exitosamente!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        return view('almacen.show',compact('almacen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Almacen $almacen)
    {   
        return view('almacen.edit',compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario_edit = Auth::user()->name;

        
        $datosAlmacen = $request->all();

        $datosAlmacen = [     
                'imagen_evidencia'  =>  $request->imagen,
                'nombre'            =>  $request->nombre,
                'cantidad'          =>  $request->cantidad,
                'usuario_edit'    =>  $usuario_edit,
                'num_bien_nacional' =>  $request->bienNAcional,
                'estado'            =>  $request->estado, 
                'descripcion'       =>  $request->descripcion,
                ];

        $usuario_create = Auth::user()->name;
        $ip = $request->ip();
        // $mac = $request->mac();
        $area = 'Almacen - Ingenieria';
        $accion = 'Editar material';
        $nombre_campo = $request->nombre;

        if($request->hasFile('imagen')){


        $almacen = Almacen::findOrFail($id);

        Storage::delete([$almacen->imagen_evidencia]);

        $almacen['imagen_evidencia']=$request->file('imagen')->store('almacen','public');
        $urlimage ='public/'.$almacen['imagen_evidencia'];
        
        $datosAlmacen = [     
            'imagen_evidencia'  =>   $urlimage,
            ];

    }   
    
        
        Almacen::where('id','=',$id)->update($datosAlmacen);

        $almacen = Almacen::findOrFail($id);

        $log=[
            'usuario_name'  =>  $usuario_create,
            // 'mac'  =>  $mac,
            'ip'  =>  $ip,
            'area'  =>  $area,
            'nombre_campo'  =>  $nombre_campo,
            'accion'  =>  $accion,
            
        ];

        Log::create($log);


        return redirect()->route("almacen.index")->with(['info' => '¡Se ha actualizado la información!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Almacen $almacen)

    {
        $usuario_create = Auth::user()->name;
        $ip = $request->ip();
        // $mac = $request->mac();
        $area = 'Almacen - Ingenieria';
        $accion = 'Eliminar material';
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

        Storage::delete([$almacen->imagen_evidencia]);
        $almacen->delete();
        return redirect()->route("almacen.index")->with(["info" => "Eliminado exitosamente!",]);
    }
}
