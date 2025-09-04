<?php

use Illuminate\Support\Facades\Route;

//import product controller
use App\Http\Controllers\SiswasController;

//route resource for products
Route::resource('/siswas', SiswasController::class);

Route::get('/', function () {
    return view('welcome');
});