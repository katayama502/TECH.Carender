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


//ユーザー用//

Route::get('/',[TechController::class,'index']);
Route::get('Login', [TechController::class,'getLog']);
Route::get('New_sain', [TechController::class,'getNew']);
Route::get('Carender', [TechController::class,'getCarender']);


Route::get('goal_input', [TechController::class,'getgoal']);

//管理者用//
Route::get('admin', [TechController::class,'getAdmin']);
Route::get('login_admin', [TechController::class,'getAdmin_login']);
Route::get('sain_admin', [TechController::class,'getAdmin_sain']);

//予定・実績・イベント登録
Route::post('goal_input/{user_id}/{date}', [App\Http\Controllers\Learning_planController::class, 'edit']);
Route::get('goal_input', [App\Http\Controllers\Learning_planController::class, 'index']);
Route::post('plan_delete/{learningplan}', [App\Http\Controllers\Learning_planController::class, 'deletePlan']);
Route::post('record_delete/{learningrecord}', [App\Http\Controllers\Learning_planController::class, 'deleteRecord']);
Route::post('memo_edit', [App\Http\Controllers\MemoController::class, 'edit']);
Route::post('memo_delete', [App\Http\Controllers\MemoController::class, 'delete']);
Route::get('event_input', [App\Http\Controllers\EventController::class, 'index']);
Route::post('event_edit', [App\Http\Controllers\EventController::class, 'edit']);
Route::post('event_delete/{event_delete}', [App\Http\Controllers\EventController::class, 'delete']);

//DBへのアドレス・PASSの登録 //
Route::post('/new_add',[TechController::class,'add']);
// Route::get('/new_add',[TechController::class,'add']);
Route::post('thack',[TechController::class,'chtecktest']);

//管理者新規追加//
Route::post('/admin_add',[TechController::class,'admin_add']);
Route::post('/admin_check',[TechController::class,'admin_check']);

