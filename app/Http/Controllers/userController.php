<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\insertRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class userController extends Controller
{
    public function getall(){
        try{
            $usuarios = User::all();
            Log::info(empty($usuarios));
            if(count($usuarios)==0){
               return view("index",[
                    "mensaje" => "No hay registros de usuarios",
                    "data"=>false
               ]);
            }

            return view("index",[
                "mensaje" => "Se han encontrado usuarios",
                "usuarios" => $usuarios,
                "data"=>true
            ]);

        }catch(Exception $e){
            return view("index",[
                "mensaje" => "Error al obtener el listado de usuarios"
                
            ]);
        }
    }
    public function create(insertRequest $request){
        try{
            $user = new User();
            $user-> name = $request->name;
            $user-> email = $request->email;
            $user-> password = Hash::make($request->password);
            $user -> save();
            return response()->json([
                "mensaje"=> "Usuario creado correctamente"
            ],200);

        }catch(Exception $e){
            return response()->json([
                "mensaje" => "No se ha podido crear un usuario"
            ],400);
        }
    }
    public function show(Request $request){
        try{
            $request->validate([
                "id"=>"required|integer"
            ]);
            $user = User::where("id", $request->id)->get();
            Log::info($user);
            if(count($user)==0){
                return response()->json([
                    "mensaje"=>"No existe el usuario"
                ],400);
            }
            return response()->json([
                "mensaje" => "Se ha encontrado el usuario",
                "usuario" => $user
            ],200);

        }catch(Exception $e){
            return response()->json([
                "mensaje" => "No se ha podido obtener el usuario",
                "error"=> $e->getMessage()
            ],400);
        }
    }
    public function delete(Request $request){
        try{    
            $request->validate([
                "id"=>"required|integer"
            ]);
            $user = User::where("id",$request->id)->get();
            if(count($user)==0){
                return response()->json([
                    "mensaje"=>"No existe el usuario"
                ],400);
            }
            User::where("id",$request->id)->delete();
            return response()->json([
                "mensaje"=> "Usuario eliminado correctamente"
            ],200);
        }catch(Exception $e){
            return response()->json([
                "mensaje" => "No se ha podido eliminar el usuario"
            ],400);
        }
    }
    public function update(Request $request){
        try{
            $user = User::findorFail($request->id);
            Log::info($user);
            if(empty($user)){
                return response()->json([
                    "mensaje"=>"No existe el usuario"
                ],400);
            }

            isset($request->name) && $user->name = $request->name;
            isset($request->email) && $user -> email = $request-> email;
            isset($request->password) && $user -> password = Hash::make( $request-> password);            
            $user -> save();

            return response()->json([
                "mensaje" => "Se ha actualizado correctamente el usuario"
            ],200);
            
        }catch(Exception $e){
            return response()->json([
                "mensaje" => "No se ha podido actualizar el usuario",
                "error"=> $e->getMessage()
            ],400);
        }
    }

    public function export(){
        return Excel::download(new UsersExport, "users.xlsx");
    }

}
