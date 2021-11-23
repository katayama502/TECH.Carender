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

//DBへのアドレス・PASSの登録 //
Route::post('/new_add',[TechController::class,'add']);
// Route::get('/new_add',[TechController::class,'add']);
Route::post('thack',[TechController::class,'chtecktest']);

//管理者新規追加//
Route::post('/admin_add',[TechController::class,'admin_add']);
Route::post('/admin_check',[TechController::class,'admin_check']);
