<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaSalon extends Model
{
    protected $table = "reserva_salons";
    protected $hidden = ["created_at", "updated_at"];
    use HasFactory;
}
