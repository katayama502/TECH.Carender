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
        /*$this->validate($request, [
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|max:255'
        ]);*/
 
        // その日付のメモがあるか確認
        //$memo = Memo::where('date','2020-10-30')->find(1)->value('body');
        // メモがなければ新規登録
        $memo = Memo::where('date','2020-10-30')->where('user_id',1);
        var_dump($memo); exit;
        if ($memo === null) {
            Memo::create([
                'user_id' => 1,
                'body' => $request->memo,
                'date' => "2020-10-30"
        ]);
        //メモがあれば更新
        } else {
            Memo::where('user_id', 1)->where('date', '2020-10-30')->update([ 'body' => $request->memo]);
        }
        return redirect('goal_input');
    }

    /**
     * 会員情報削除
     *
     * @param Request $request
     * @param User $user_id
     * @return Response
     */
    public function delete(Request $request)
    {
        Memo::where('user_id', 1)->where('date', '2020-10-30')->delete();
        return redirect('goal_input');
    }
}
