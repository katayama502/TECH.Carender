<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[TechController::class,'index']);
Route::get('Login', [TechController::class,'getLog']);
Route::get('New_sain', [TechController::class,'getNew']);
Route::get('Carender', [TechController::class,'getCarender']);
Route::get('goal_input', [TechController::class,'getgoal']);


/**
 * カレンダー表示 /views/calendar/index.blade.php
 */
Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'setEvents']) ;
