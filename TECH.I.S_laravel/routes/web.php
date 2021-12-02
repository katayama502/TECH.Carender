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



// カレンダー表示 /views/calendar/index.blade.php
Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'setEvents']) ;

//ユーザー用//

Route::get('/',[TechController::class,'index']);
Route::get('access', [TechController::class,'getLog']);
Route::get('New_sain', [TechController::class,'getNew']);

Route::get('Calendar', [TechController::class,'getCalendar']);
Route::get('Not_Calendar', [TechController::class,'getCalendar_not']);


Route::get('goal_input', [TechController::class,'getgoal']);
Route::get('Login_mv', [TechController::class,'Log_mv']);
// Route::get('New_sain_mv', [TechController::class,'New_mv']);

//管理者用//
Route::group(['middleware' => 'basicauth'], function() {
Route::get('admin', [TechController::class,'getAdmin']);
Route::get('login_admin', [TechController::class,'getAdmin_login']);
Route::get('login', [TechController::class,'Admin_login']);
Route::get('sain_admin', [TechController::class,'getAdmin_sain']);
Route::get('admin', [App\Http\Controllers\TechController::class, 'getAdmin'])->name('top');
});

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
Route::post('chteck',[TechController::class,'chtecktest']);
Route::get('chteck',[TechController::class,'chtecktest']);
//管理者新規追加//
Route::post('admin_add',[TechController::class,'admin_add_1']);
Route::get('admin_add',[TechController::class,'admin_add_1']);
Route::post('/admin_check',[TechController::class,'admin_check']);

// ログアウト
Route::get('/logout',[App\Http\Controllers\CalendarController::class, 'getLogout']);

// メール送付
Route::get('/mail',[App\Http\Controllers\MailSendController::class, 'send']);

//進捗確認グラフ//
Route::get('graph_main', [TechController::class,'main']);
Route::get('graph_basics', [TechController::class,'basics']);
Route::get('graph_application', [TechController::class,'application']);
Route::get('graph_development', [TechController::class,'development']);


