<?php

namespace App\Http\Controllers;

use App\Models\ReservaSalon;
use Illuminate\Http\Request;

class ReservaSalonController extends Controller
{

    public function index()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show(ReservaSalon $reservaSalon)
    {
        //
    }

    public function edit(ReservaSalon $reservaSalon)
    {
        //
    }

    public function destroy($reserva_id,$salones_id)
    {
        try {
            ReservaSalon::where('reserva_id',$reserva_id)->where('salones_id',$salones_id)->delete();
            return 'Servicio Eliminado';
        } catch (Exception $e) {
            return 'el servicio no se puede eliminar';
        }
    }
}
