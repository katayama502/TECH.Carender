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
    public function edit(Request $request, $date)
    {
        //ログイン確認
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        
        if($request->submit == "add"){
            $this->validate($request, [
                'memo' => 'required'
            ]);
            $memomessage="";
            // その日付のメモがあるか確認

            $memo = Memo::where('date',$date)->where('user_id',$user_id)->exists();
             // メモがなければ新規登録
            if ($memo === false) {
                Memo::create([
                    'user_id' => $user_id,
                    'body' => $request->memo,
                    'date' => $date
            ]);
                $memomessage="メモを保存しました";
            //メモがあれば更新
            } else {

                Memo::where('user_id', $user_id)->where('date', $date)->update([ 'body' => $request->memo]);

                $memomessage="メモを更新しました";
            }
            
        }
        if($request->submit == "delete"){
            // メモ削除更新

            Memo::where('user_id', $user_id)->where('date', $date)->delete();

            $memomessage="メモをクリアしました";
        }
        return redirect('/goal_input/'.$date)->with('flash_message', $memomessage);;
    }

    /**
     * メモ情報削除
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request, $date)
    {

        //ログイン確認
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }

        Memo::where('user_id', $user_id)->where('date', $date)->delete();

        return redirect('/goal_input/'.$date)>with('flash_message', 'メモをクリアしました');
    }
}
