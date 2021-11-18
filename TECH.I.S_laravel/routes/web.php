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
//Route::get('goal_input', [TechController::class,'getgoal']);
Route::post('goal_input/{user_id}/{date}', [App\Http\Controllers\Learning_planController::class, 'edit']);
Route::get('goal_input', [App\Http\Controllers\Learning_planController::class, 'index']);
Route::post('plan_delete/{learningplan}', [App\Http\Controllers\Learning_planController::class, 'deletePlan']);
Route::post('record_delete/{learningrecord}', [App\Http\Controllers\Learning_planController::class, 'deleteRecord']);
Route::post('memo_edit', [App\Http\Controllers\MemoController::class, 'edit']);
Route::post('memo_delete', [App\Http\Controllers\MemoController::class, 'delete']);

