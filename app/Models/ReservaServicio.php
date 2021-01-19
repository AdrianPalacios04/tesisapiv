<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;
    protected $table = "reserva_servicios";
    protected $hidden = ["created_at", "updated_at"];
    public function reservas()
    {
      //  return $this->belongsToMany('App\ServicioReserva', 'servicio_reserva', 'id', 'reserva_id')->withTimestamps();
      return $this->belongsToMany(Reserva::class)->withTimestamps();
    }
}
