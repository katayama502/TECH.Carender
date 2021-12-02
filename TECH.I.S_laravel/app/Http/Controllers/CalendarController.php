<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function setEvents()
    {
        $newEvents = DB::table('events')->get();
        $newEventsDate = DB::table('events')->get();
        $newPlans = DB::table('learning_plans')->get();
        $newRecords = DB::table('learning_records')->get();
        // $newArr= DB::select('select * from events');
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
            ]
        );
    }


    public function getDate()
    {

    }

    public function getLogout(Request $request)
    {
        // ユーザー情報をセッションから削除
        // guardの中身を要確認。
        Auth::guard('user_id')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}
