<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;

class CalendarAdminController extends Controller
{

    public function setEvents()
    {
        // id 取得

        $admin_id = session()->get('admin_id');
        if(empty($admin_id)){
            return redirect('/');

        }
        
        
        // DBからイベント、予定、実績の取得
        $newEvents = DB::table('events')->get();
        $newEventsDate = DB::table('events')->get();
        
        // 各配列をjson化
        $param_json_body = json_encode($newEvents);
        $param_json_date = json_encode($newEventsDate);
        
        return view('calendarsAdmin.index', 
            [
                'param_json_body' => $param_json_body, 
                'param_json_date' => $param_json_date,
                'flash_message'=>'ログインに成功しました',
            ]
        );
    }


    public function getDateAdmin()
    {
        // URLから日付データを取得。
        $date = $_SERVER['REQUEST_URI'];
        $date = str_replace('/getDateAdmin/', '', $date);
        // $date_year = substr($date,0,4);
        // $date_month = substr($date,5,2);
        // $date_day = substr($date,8,2);
        // $date = session()->get('date');


        return redirect('/event_input') ->with([
            // 'date' => $date,

        ]);
    }
    public function getLogout(Request $request)
    {
        // ユーザー情報をセッションから削除
        $request->is_force_logout = 1;
        
        return redirect('/admin');
    }

}
