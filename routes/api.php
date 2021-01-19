<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaServicioController;
use App\Http\Controllers\ReservaSalonController;

//register
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

//Reservation
Route::middleware('auth:api')->group(function () {
        //Reserva
         Route::get('/reserva',[ReservaController::class, 'index']);
         Route::post('/reserva/create',[ReservaController::class, 'store']);
         Route::post('/reserva/addservicios/{reserva_id}',[ReservaController::class, 'addservicios']);
         Route::post('/reserva/addsalones/{reserva_id}',[ReservaController::class, 'addsalones']);
         Route::delete('/reserva/deleteservicio/{reserva_id}/{servicio_id}',[ReservaServicioController::class, 'destroy']);
         Route::delete('/reserva/deletesalon/{reserva_id}/{salones_id}',[ReservaSalonController::class, 'destroy']);
});

//Other
// Rutas Grupos
Route::get('/grupo',[GrupoController::class, 'index']);
Route::post('/grupo/create',[GrupoController::class, 'store']);

// Rutas Servicios
Route::get('/servicio',[ServicioController::class, 'index']);
Route::post('/servicio/create',[ServicioController::class, 'store']);

//Rutas Salones
Route::get('/salones',[SalonController::class, 'index']);
Route::post('/salones/create',[SalonController::class, 'store']);