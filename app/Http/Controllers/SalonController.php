<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function index()
  {
      $salon = Salon::all();

      return response()->json([
        "salones" => $salon
      ]);
  }


  public function store(Request $request)
  {
    $salon = new Salon();
    $salon->name_salon = $request->name_salon;
    $salon->ubicacion = $request->ubicacion;
    $salon->save();

    return response()->json([
      "mensaje" => "Guardado con exito",
      "data" => $salon
    ]);
  }


  public function show($id)
  {

  }

  public function update(Request $request, $id)
  {

  }


  public function destroy(Salon $salon)
  {

  }
}
