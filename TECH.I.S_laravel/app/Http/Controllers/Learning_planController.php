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
    public function edit(Request $request, $date)
    {
        // セッション確認
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        
        // 日付は$requestから取得

        // バリデーション
        $this->validate($request, [
            'genre' => 'required',
            'category_name' => 'required',
            'lesson_number' => 'required'
        ]);
        $genre = $request->genre;
        $category_name = $request->category_name;
        $lesson_number = $request->lesson_number;
        $learn = Learning_plan::$lessonNameArray[$genre."_".$category_name."_".$lesson_number];
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
        return redirect('/goal_input/'.$date)->with('flash_message', '登録が完了しました');
    }
    /**
     * 学習予定取得
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$date)
    {
        $lessonNameArrayflip=array_flip(Learning_plan::$lessonNameArray);
        // セッション確認
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        // 日付は$requestから取得するようにしたい


        // 学習予定の取得
        $learningplans = Learning_plan::where('user_id',$user_id)->get()->toArray();
        $planResponse = array();
        foreach($learningplans[0] as $key => $learningplan){
            if($learningplan === $date){
                $lessonName = $lessonNameArrayflip[$key];
                array_push($planResponse,$lessonName);
            }
        }
        
        //学習実績の取得
        $learningrecords = Learning_record::where('user_id',$user_id)->get()->toArray();
        $recordResponse = array();
        foreach($learningrecords[0] as $key => $learningrecord){
            if($learningrecord === $date){
                $lessonName = $lessonNameArrayflip[$key];
                array_push($recordResponse,$lessonName);
            }
        }

        //メモの取得
        $memo = Memo::where('date',$date)->where('user_id',$user_id);
        if ($memo === null) {
            $memoResponse = "";
        }else{
            $memo = Memo::where('date',$date)->where('user_id',$user_id)->value('body');
            $memoResponse = $memo;
        }
        
        return view('goal_input', [
            'learningplans' => $planResponse,
            'learningrecords' => $recordResponse,
            'memo' => $memoResponse,
            'date' => $date
        ]);
    }

    /**
     * 学習予定削除
     *
     * @param Request $request
     * @return Response
     */
    public function deletePlan(Request $request, $learningplan, $date)
    {
        // セッション確認
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        //レッスン名をカラム名に変換
        $deletelearningplan = Learning_plan::$lessonNameArray[$learningplan];

        //指定したカラムをNullにする
        Learning_plan::where('user_id', $user_id)->update([ $deletelearningplan => null]);
        return redirect('/goal_input/'.$date)->with('flash_message', '削除が完了しました');
    }

    /**
     * 学習実績削除
     *
     * @param Request $request
     * @return Response
     */
    public function deleteRecord(Request $request, $learningrecord ,$date)
    {
        $user_id = session()->get('user_id');
        if(empty($user_id)){
            return redirect('/');
        }
        //レッスン名をカラム名に変換
        $deletelearningrecord = Learning_plan::$lessonNameArray[$learningrecord];
        
        //指定したカラムをNullにする
        Learning_record::where('user_id', $user_id)->update([ $deletelearningrecord => null]);
        return redirect('/goal_input/'.$date)->with('flash_message', '削除が完了しました');
    }

}
