<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Calendar;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function setEvents()
    {
        $newEvents = DB::table('events')->get('body');
        $newEventsDate = DB::table('events')->get('date');
        // $newArr= DB::select('select * from events');
        $param_json_body = json_encode($newEvents);
        $param_json_date = json_encode($newEventsDate);

        return view('calendars.index', ['param_json_body' => $param_json_body, 'param_json_date' => $param_json_date]);
    }


    // public function setEvents()
    // {
    //     // json形式にして出力
    //     return response()->json(
    //         [
    //             "title" => 'test',
    //             "start" => '2021-11-02',
    //         ]
    //     );
    // }
}
