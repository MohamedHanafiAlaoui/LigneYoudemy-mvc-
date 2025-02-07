<?php

use SecTheater\Http\Route;
use App\controllers\HomeController;


Route::get('public',[HomeController::class,'index']);