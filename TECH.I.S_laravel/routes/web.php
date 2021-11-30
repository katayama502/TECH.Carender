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



// カレンダー表示 /views/calendar/index.blade.php
Route::get('/calendar',[App\Http\Controllers\CalendarController::class, 'setEvents']) ;

// ログアウト
Route::get('/logout',[App\Http\Controllers\CalendarController::class, 'getLogout']);

// メール送付
Route::get('/mail',[App\Http\Controllers\MailSendController::class, 'send']);


