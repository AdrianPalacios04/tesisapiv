<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Validator;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();

        return response()->json([
        "grupos" => $grupos
        ]);
    }

    public function store(Request $request)
    {
    $input = $request->all();
    $validator = Validator::make($input,[
        'name'=> 'required',
    ]);

    $grupo = new Grupo();
    $grupo->name = $request->name;
    $grupo->save();

    return response()->json([
        "success"=>true,
        "message"=>"Creado exitosamente",
        "data"=>$grupo
    ]);
    }
}
