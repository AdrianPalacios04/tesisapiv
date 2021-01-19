<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Validator;

class ServicioController extends Controller
{
    public function index()
    {
      $service = Servicio::all();

      return response()->json([
          "success" => true,
          "message" => "Servicio List",
          "data" => $service
      ]);
    }


    public function store(Request $request)
    {
      $input = $request->all();
      $validator = Validator::make($input, [
          'name_service' => 'required',
          'price' => 'required',
          'grupo_id' => 'required'
      ]);
      //$service = Servicio::create($input);
      $service = new Servicio();
      $service->name_service = $request->name_service;
      $service->price = $request->price;
      $service->grupo_id = $request->grupo_id;
      $service->save();

      
      return response()->json([
          "success" => true,
          "message" => "Servicio creado exitosamente",
          "data" => $service
      ]);
    }


    public function show($id)
    {
      $service = Servicio::find($id);
      if (is_null($service)) {
          return $this->sendError('Servicio extraviado');
      }
      return response()->json([
          "success" => true,
          "message" => "Servicio encontrado exitosamente",
          "data" => $service
      ]);
    }




    public function update(Request $request, $id)
    {
      $service = Service::find($id);

      $input = $request->all();

      $validator = Validator::make($input,[
          'name_service'=> 'required',
          'price' =>'required',
          'grupo_id'=>'required'
      ]);
      if ($validator->fails()) {
          return $this->sendError('Validation Error',$validator->errors());
      }

      $service->name_service = $input['name_service'];
      $service->price = $input['price'];
      $service->grupo_id = $input['grupo_id'];
      $service->save();

      return response()->json([
          "success" => true,
          "message" => "Servicio Editado",
          "data" => $service
      ]);
    }


    public function destroy(Servicio $servicio)
    {
      //$service = Servicio::find($id);
      $servicio->delete();
      return response()->json([
          "success" =>true,
          "message" => "Servicio eliminado"
      ]);
    }
}
