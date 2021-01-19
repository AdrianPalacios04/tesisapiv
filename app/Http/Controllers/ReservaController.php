<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\ReservaServicio;
use Illuminate\Support\Facades\Auth;
use App\Models\ReservaSalon;
use App\Http\Resources\ServicioResource;
use App\Http\Resources\ReservaCollection;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reserva = Reserva::with(['servicioreservas', 'salones'])->get();
        return $reserva;
        
    }


    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);

        /** @var Reserva $reserva */
        $reserva = Reserva::create($request->all());
        return response()->json([
          "data" => $reserva
        ]);
    }

    public function addservicios(Request $request, $reserva_id)
    {
        $servicio = new ReservaServicio();
        $servicio->reserva_id = $reserva_id;
        $servicio->servicio_id = $request->servicio_id;
        $servicio->save();

        return response()->json([
            "data" => $servicio
        ]);
    }

    public function addsalones(Request $request, $reserva_id)
    {
        $salon = ReservaSalon::where('reserva_id', $reserva_id)->where('salones_id', $request->salon_id)->get();
        $count = count($salon->all());

          if($count > 0){
            return response()->json([
              "message" => "Error, esta reserva ya contiene a este salon"
            ]);
          }
          else{
            $salon = new ReservaSalon();
            $salon->reserva_id = $reserva_id;
            $salon->salones_id = $request->salon_id;
            $salon->save();

            return response()->json([
              "data" => $salon
            ]);
          }

    }
    public function show(Reserva $reserva)
    {
        
    }


    public function update(Request $request, Reserva $reserva)
    {
        
    }

    public function destroy(Reserva $reserva)
    {
        
    }
}
