<?php

namespace App\Http\Controllers;

use App\Models\ReservaServicio;
use Illuminate\Http\Request;

class ReservaServicioController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(ReservaServicio $reservaServicio)
    {
        
    }

    public function update(Request $request, ReservaServicio $reservaServicio)
    {
        
    }

    public function destroy($reserva_id, $servicio_id)
    {
        ReservaServicio::where('reserva_id',$reserva_id)->where('servicio_id',$servicio_id)->delete();
    }
}
