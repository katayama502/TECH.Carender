<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function setEvents()
    {
        // user_id 取得
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        
        
        // DBからイベント、予定、実績の取得
        $newEvents = DB::table('events')->get();
        $newEventsDate = DB::table('events')->get();
        $newPlans = DB::table('learning_plans')->where('user_id',$user_id)->get();
        $newRecords = DB::table('learning_records')->where('user_id',$user_id)->get();

        
        // 各配列をjson化
        $param_json_body = json_encode($newEvents);
        $param_json_date = json_encode($newEventsDate);
        $param_json_plans = json_encode($newPlans);
        $param_json_records = json_encode($newRecords);


        
        return view('calendars.index', 
            [
                'param_json_body' => $param_json_body, 
                'param_json_date' => $param_json_date,
                'param_json_plans' => $param_json_plans,
                'param_json_records' => $param_json_records,
                'flash_message'=>'ログインに成功しました',
            ]
        );
    }


    public function getDate()
    {
        // URLから日付データを取得。
        $date = $_SERVER['REQUEST_URI'];
        $date = str_replace('/getDate/', '', $date);
        // $date_year = substr($date,0,4);
        // $date_month = substr($date,5,2);
        // $date_day = substr($date,8,2);
        // $date = session()->get('date');

        
        return redirect('/goal_input/'.$date) ->with([
            //'date' => $date,
        ]);
    }

    public function getLogout(Request $request)
    {
        // ユーザー情報をセッションから削除
        $request->is_force_logout = 1;
        
        return redirect('/');
    }

}
