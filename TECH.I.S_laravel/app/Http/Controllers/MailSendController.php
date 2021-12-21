<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

// use Illuminate\Foundation\Auth\User;

class MailSendController extends Controller
{
    //
    public static function send()
    {
        
        // DBからメールアドレスを取得
        $toEmail = DB::table('users')->select('id','email')->get();
        // オブジェクトを配列化
        $arrayMail = (array)$toEmail;
        // 配列単純化
        $arrayMail = array_reduce($arrayMail, 'array_merge', []);
        $arrayMail =  json_decode(json_encode($arrayMail), true);
        
        // メールアドレスがabc順になるので、id順にソートを行う。
        foreach($arrayMail as $key => $value){
            $idSort[$key] = $value['id'];
        }
        array_multisort($idSort , SORT_ASC,$arrayMail);

        // 配列から2次元配列のemailを取得し$toに格納
        $to = array_column($arrayMail,'email');
        
        // DBからlearning_plansを取得
        $planAll = DB::table('learning_plans')->get();
        // objectを配列に
        $planLearn = (array)$planAll;
        // 配列単純化
        $planLearn1 = array_reduce($planLearn, 'array_merge', []);
        $planLearnAll =  json_decode(json_encode($planLearn1), true);
        
        // フィールド数を取得
        $arrayCount = DB::table('users')->select('id')->get();
        $countKey = count($arrayCount);

        // 各idの配列を整列させる。
        for($i=0;$i<$countKey;$i++){
            // idキーの削除
            unset($planLearnAll[$i]["id"]);
            // user_idキーの削除
            unset($planLearnAll[$i]["user_id"]);
            // created_atキーの削除
            unset($planLearnAll[$i]["created_at"]);
            // updated_atキーの削除
            unset($planLearnAll[$i]["updated_at"]);
        
            // keyの名前を学習計画に変更。
            // 変数planValuesにバリューを入れる。
            $planValues[$i] = array_values($planLearnAll[$i]);
            $planKeys = [
                "【基礎】01 手続き関係", "【基礎】01 環境構築", "【基礎】02 HTML基礎文法1", "【基礎】02 HTML基礎文法2", "【基礎】02 CSS基礎文法1", "【基礎】02 CSS基礎文法2", "【基礎】03 Git概要、Gitコマンド", "【基礎】03 GitHub", "【基礎】04 ポートフォリオ概要", "【基礎】04 ポートフォリオ作成1",
                "【基礎】04 ポートフォリオ作成2", "【基礎】04 ポートフォリオ作成3", "【基礎】04 ポートフォリオ演習", "【基礎】05 PHP概要", "【基礎】05 PHP基礎文法1", "【基礎】05 PHP基礎文法2", "【基礎】05 PHP基礎文法3", "【基礎】05 PHP基礎文法4", "【基礎】05 PHP基礎文法15", "【基礎】05 PHP基礎文法6",
                "【基礎】06 JavaScript概要", "【基礎】06 JavaScript基礎文法1", "【基礎】06 JavaScript基礎文法2", "【基礎】06 JavaScriptフレームワーク", "【基礎】06 JavaScript演習", "【基礎】07 SQL概要", "【基礎】07 SQL基礎文法1", "【基礎】07 SQL基礎文法2", "【基礎】07 SQL基礎文法3", "【基礎】07 SQL演習1",
                "【基礎】07 SQL演習2", "【応用】01 Twitterクローン：ホーム画面1", "【応用】01 Twitterクローン：ホーム画面2", "【応用】01 Twitterクローン：Git管理", "【応用】01 Twitterクローン：ホーム画面3", "【応用】01 Twitterクローン：ホーム画面4", "【応用】02 Twitterクローン：設計、開発手法", "【応用】02 Twitterクローン：会員登録画面＆ログイン画面", "【応用】02 Twitterクローン：ユーザー画面", "【応用】02 Twitterクローン：その他の画面",
                "【応用】02 Twitterクローン：データベース作成", "【応用】02 Twitterクローン：会員登録機能", "【応用】02 Twitterクローン：ログイン機能", "【応用】02 Twitterクローン：ツイート投稿機能", "【応用】02 Twitterクローン：ホーム機能", "【応用】02 Twitterクローン：いいね！機能を非同期で実装", "【応用】02 Twitterクローン：検索機能", "【応用】02 Twitterクローン：ユーザーページ（フォロー）", "【応用】02 Twitterクローン：通知機能", "【応用】02 Twitterクローン：ホーム機能をタイムライン化",
                "【応用】02 Twitterクローン：さくらVPS構築", "【応用】03 Laravel概要", "【応用】03 Laravel使い方1", "【応用】03 Laravel使い方2", "【応用】03 LaravelでHerokuデプロイ", "【応用】03 Laravel演習", "【開発】01 業務改善システムの企画", "【開発】01 チーム開発", "【開発】01 チーム開発発表会", "【開発】02 ビジネストレンド、ビジネス戦略",
                "【開発】02 自主制作", "【開発】02 自主制作発表会"
            ];
            // 新しいキーとバリューを結合する。
            $planAll[$i] = array_combine($planKeys, $planValues[$i]);
            // 値がnullのキーを削除する。
            $planAll[$i] = array_filter($planAll[$i]);
        }
        
        $planAll = (array)$planAll;
        $planAll = array_reduce($planAll, 'array_merge', []);

        // 今日の日付取得
        $today = date("Y-m-d");

        // 今日の日付と学習予定日が同じ日付の学習項目を取得。
        $result[] = [];
        for($i=0;$i<$countKey;$i++){
            $result[$i] = array_keys($planAll[$i],$today);
        }

        // メールを送る。
        // for($i=0;$i<$countKey;$i++){
        //     if(!empty($result[$i])){
        //         Mail::to($to[$i])->send(new SendMail($result[$i]));
        //     }
        // }        
        
        // var_dump($result[1]);
        // var_dump($to[1]);
        // return redirect('/Calendar');
    }
}
