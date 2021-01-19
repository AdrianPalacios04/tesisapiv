<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";
    protected $fillable = [
      'user_id'
    ];
    protected $hidden = ["created_at", "updated_at"];

    public function servicioreservas()
    {
      return $this->hasMany(ReservaServicio::class);
    }

    public function salones()
    {
        return $this->hasMany(ReservaSalon::class);
    }
}
