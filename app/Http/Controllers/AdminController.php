<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        foreach ($usuarios as $usuario){
            $usuario->doctor;
        }
        return $usuarios;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        try{
            $cantidadBorrada = User::destroy($id);
            return ['deleted'=>$cantidadBorrada];
        }catch (Exception $e){
            return ['error'=>'no se pudo borrar'];
        }
    }

    public function crearDoctor(Request $request){
        $this->validate($request, [
            'cedula' => 'required|numeric'
        ]);
        try{
            $usuario = User::where('cedula','=',$request->cedula)->get()->first();
            if($usuario==null){
                return response()->json(['error' => 'no existe el usuario con esa cedula'],403);
            }
            $nuevoDoc = Doctor::where('cedula','=',$request->cedula)->get()->first();
            if($nuevoDoc == null){
                $nuevoDoc =    new Doctor([
                    'cedula' => $request->cedula
                ]);
                $nuevoDoc->save();
                return ['message'=>'se creo correctamente'];
            }else{
                return response()->json( ['error'=>'Ese doctor ya existia'],403);
            }
        }catch (Exception $e){
            return response()->json(['error'=>'No se pudo crear '.$e],403);
        }
    }

    public function sacarDoctor(Request $request){
        $this->validate($request, [
            'cedula' => 'required|numeric'
        ]);
        try{
            $destruido = Doctor::destroy($request->cedula);
            if($destruido>0){
                return ['message'=>'se borro correctamente'];
            }else{
                return response()->json(['error'=>'Ese doctor jamas existio'],403);
            }
        }catch (Exception $e){
            return response()->json(['error'=>'No se pudo crear '.$e],403);
        }
    }
}
