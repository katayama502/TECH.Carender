<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
class MemoController extends Controller
{
    /**
     * メモ登録
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        if($request->submit == "add"){
            $this->validate($request, [
                'memo' => 'required'
            ]);
            $memomessage="";
            // その日付のメモがあるか確認
            $memo = Memo::where('date','2020-10-30')->where('user_id',1)->exists();
             // メモがなければ新規登録
            if ($memo === false) {
                Memo::create([
                    'user_id' => 1,
                    'body' => $request->memo,
                    'date' => "2020-10-30"
            ]);
                $memomessage="メモを保存しました";
            //メモがあれば更新
            } else {
                Memo::where('user_id', 1)->where('date', '2020-10-30')->update([ 'body' => $request->memo]);
                $memomessage="メモを更新しました";
            }
            
        }
        if($request->submit == "delete"){
            // メモ削除更新
            Memo::where('user_id', 1)->where('date', '2020-10-30')->delete();
            $memomessage="メモをクリアしました";
        }
        return redirect('goal_input')->with('flash_message', $memomessage);;
    }

    /**
     * メモ情報削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        Memo::where('user_id', 1)->where('date', '2020-10-30')->delete();
        return redirect('goal_input')->with('flash_message', 'メモをクリアしました');
    }
}