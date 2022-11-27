<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;


class PerfilController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);

        return view('perfil.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
         $users = User::findOrFail($user);

        $roles = Role::all();
        
        return view('perfil.edit',compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        
        $users = $user;
        //  return $request;
            $user = User::findOrFail($users);
        $roles=$request->all();
        // $user->roles()->sync( $request->perfile);
        $users->syncRoles($request->perfiles);
        

        return redirect()->route('perfil.index')->with(['info' => '¡Se guardaron los cambios en el usuario.!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
