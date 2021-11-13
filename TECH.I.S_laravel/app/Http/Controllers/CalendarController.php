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
        // $newArr= DB::select('select * from events');
        $param_json_body = json_encode($newEvents);
        $param_json_date = json_encode($newEventsDate);
        $param_json_plans = json_encode($newPlans);

        return view('calendars.index', 
            [
                'param_json_body' => $param_json_body, 
                'param_json_date' => $param_json_date,
                'param_json_plans' => $param_json_plans,
            ]
        );
    }

}
