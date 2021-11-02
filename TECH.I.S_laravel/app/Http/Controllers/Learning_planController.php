<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learning_plan;
use App\Models\Learning_record;
use App\Models\Memo;
class Learning_planController extends Controller
{
    /**
     * 学習予定更新
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $user_id, $date)
    {
        // ユーザーID,日付は$requestから取得したい
        // バリデーションを追加したい
        $this->validate($request, [
            'genre' => 'required',
            'category_name' => 'required',
            'lesson_number' => 'required'
        ]);
        $genre = $request->genre;
        $category_name = $request->category_name;
        $lesson_number = $request->lesson_number;
        $learn = Learning_plan::$genreArray[$genre]."-".Learning_plan::$categoryArray[$category_name]."-".Learning_plan::$lessonNumberArray[$lesson_number];
        if($request->submit == "plan"){
            //学習予定更新
            Learning_plan::where('user_id',$user_id)->update([
                $learn => $date,
            ]);
        }
        if($request->submit == "record"){
            // 学習実績更新
            Learning_record::where('user_id',$user_id)->update([
                $learn => $date,
            ]);
        }
        return redirect('/goal_input');
    }
    /**
     * 学習予定取得
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // 日付とIDは$requestから取得するようにしたい
        // 学習予定の取得
        $learningplans = Learning_plan::find(1)->toArray();
        $planResponse = array();
        foreach($learningplans as $key => $learningplan){
            if($learningplan === '2020-10-30'){
                array_push($planResponse,$key);
            }
        }
        
        //学習実績の取得
        $learningrecords = Learning_record::find(1)->toArray();
        $recordResponse = array();
        foreach($learningrecords as $key => $learningrecord){
            if($learningrecord === '2020-10-30'){
                array_push($recordResponse,$key);
            }
        }

        //メモの取得
        $memo = Memo::where('date','2020-10-30')->where('user_id',1);
        if ($memo === null) {
            // user doesn't exist
            $memoResponse = "";
        }else{
        $memo = Memo::where('date','2020-10-30')->where('user_id',1)->value('body');
        $memoResponse = $memo;
        }
        return view('goal_input', [
            'learningplans' => $planResponse,
            'learningrecords' => $recordResponse,
            'memo' => $memoResponse
        ]);
    }

    /**
     * 学習予定削除
     *
     * @param Request $request
     * @return Response
     */
    public function deletePlan(Request $request, $learningplan)
    {
        Learning_plan::where('user_id', 1)->update([ $learningplan => null]);
        return redirect('goal_input');
    }

    /**
     * 学習実績削除
     *
     * @param Request $request
     * @return Response
     */
    public function deleteRecord(Request $request, $learningrecord)
    {
        Learning_record::where('user_id', 1)->update([ $learningrecord => null]);
        return redirect('goal_input');
    }
}
