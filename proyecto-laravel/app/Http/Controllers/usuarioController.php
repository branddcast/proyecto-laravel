<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use App\User;
use Flash;

class usuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.perfil');
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
    public function edit($id)
    {
        $usuario = User::find($id)->get();

        return view('usuario.modificar')->with('usuario', $usuario);
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
        //$usuario = User::find($id);

        /*$usuario->nombre = $request->nombre;
        $usuario->ap_paterno = $request->ap_paterno;
        $usuario->ap_materno = $request->ap_materno;
        $usuario->email = $request->email;*/

        //dd($request->actual_password);

        //Revisar que la contraseña actual sea la misma que la guardada en bd
        $password_ok = Auth::attempt(['id' => $id, 'password' => $request->actual_password]);

        $input = [];

        $input['nombre'] = $request->nombre;
        $input['ap_paterno'] = $request->ap_paterno;
        $input['ap_materno'] = $request->ap_materno;
        $input['email'] = $request->email;

        if($password_ok){

            if(isset($request->nuevo_password)){
                if($request->nuevo_password == $request->repetir_password){

                    //Guardar en array la contraseña
                    $input['password'] = Hash::make($request->repetir_password);

                    $usuario = User::find($id);
                    $query = $usuario->update($input);

                }else{
                    Flash::error("Las contraseñas no coinciden");
                    return redirect('modificar/'.$id);
                }
            }else{
                $usuario = User::find($id);
                $query = $usuario->update($input);
            }

            if($query){
                Flash::success('Registro guardado exitosamente');
                return redirect('perfil');
            }else{
                Flash::error('Error en el proceso de guardado');
                return redirect('perfil');
            }
        }else{
            Flash::error('La contraseña actual es incorrecta');
            return redirect('modificar/'.$id);
        }

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
