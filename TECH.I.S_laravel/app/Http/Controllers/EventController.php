<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * イベント予定取得
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $Event = Event::where('date','2020-10-30')->where('administrator_id',1);
        if ($Event === null) {
            $EventResponse = array();
        }else{
        $Event = Event::where('date','2020-10-30')->where('administrator_id',1)->get()->toArray();
        $EventResponse = $Event;
        //print_r($EventResponse); exit;
        }
        return view('event_input', [
            'Events' => $EventResponse,
        ]);
    }

    /**
     * イベント予定登録
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'event_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if(strtotime($request->start_time) >= strtotime($request->end_time)){
            return redirect('event_input')->with('flash_message', '終了時刻は開始時刻より後に設定してください');
        }
        else{
        Event::create([
            'administrator_id' => 1,
            'body' => $request->event_name,
            'date' => "2020-10-30",
            'start_time' => date('g:i',strtotime($request->start_time)),
            'end_time' => date('g:i',strtotime($request->end_time))
        ]);
        //メモがあれば更新
        return redirect('event_input')->with('flash_message', '登録が完了しました');
        }
    }

    /**
     * イベント削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request, $id)
    {
        Event::find($id)->delete();
        return redirect('event_input')->with('flash_message', '削除が完了しました');
    }
    
}
