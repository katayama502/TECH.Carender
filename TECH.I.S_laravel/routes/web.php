<?php

use Illuminate\Support\Facades\Route;

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


/**
 * カレンダー表示 /views/calendar/index.blade.php
 */
// Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'setEvents']) ;

Route::get('/',[App\Http\Controllers\TechController::class,'index']);
Route::get('/Login', [App\Http\Controllers\TechController::class,'getLog']);
Route::get('/New_sain', [App\Http\Controllers\TechController::class,'getNew']);
Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'setEvents']);
Route::get('/goal_input', [App\Http\Controllers\TechController::class,'getgoal']);


//DBへのアドレス・PASSの登録 //
Route::post('/new_add',[App\Http\Controllers\TechController::class,'add']);
Route::get('/new_add',[App\Http\Controllers\TechController::class,'add']);
Route::post('thack',[App\Http\Controllers\TechController::class,'chtecktest']);


