<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>カレンダー</title>


    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        ul {
            max-width: 858px;
            margin: 0 auto;
            text-align: right;
        }


        .event-color {
            display: inline-block;
            text-align: right;
            background-color: #FF0000;
            color: white;
            padding: 5px;
            border-radius: 5px;

        }

        .plan-color {
            display: inline-block;
            margin-left: auto;
            background-color: #AAAAAA;
            color: white;
            padding: 5px;
            border-radius: 5px;

        }

        .goal-color {
            display: inline-block;
            margin-left: auto;
            background-color: #00ABAE;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        li {
            list-style: none;
            text-align: right;
        }

    </style>
</head>

<body>
    <ul>
        <li style="font-weight: bold;">表示内容　　　</li>
        <li class='event-color'>イベント</li>
        <li class='plan-color'>予定</li>
        <li class="goal-color">実績</li>
        <li>　</li>
        <a href="/logout" button type="button" class="logout fc-button fc-button-primary fc-button-active">ログアウト</a>
        <a href="/graph_main" button type="button" class="logout fc-button fc-button-primary fc-button-active">進捗確認</a>
    </ul>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        //////////////////////////////
        // 管理者用イベント表示
        //////////////////////////////

        // $param_json_bodyを受け取る
        var events = @json($param_json_body);
        // jsonをオブジェクト化
        var events = JSON.parse(events);
        // $param_json_dateを受け取る
        var start = @json($param_json_date);
        // jsonをオブジェクト化
        var start = JSON.parse(start);
        // 変数のキーの数を取得
        var eventsKeys = Object.keys(events);
        // 配列をセット
        var setEvents = [];
        // 背景色の設定
        var eventsColor = '#FF0000';

        for (var i = 0; i < eventsKeys.length; i++) {
            var event = {
                title: (events[i].body),
                start: (start[i].date) + 'T' + (start[i].start_time),
                end: (start[i].date) + 'T' + (start[i].end_time),
                color: eventsColor,
            };
            setEvents.push(event);
        };

        //////////////////////////////
        // ログインユーザーの予定を表示
        //////////////////////////////

        // $param_json_plansを受け取る
        var plans = @json($param_json_plans);
        // jsonをオブジェクト化
        var plans = JSON.parse(plans);
        // 変数のキーの数を取得
        var plansKeys = Object.keys(plans);
        // 配列をセット
        var setPlans = [];
        // 背景色の設定
        var plansColor = '#AAAAAA';

        var plansUser = plans[0];

        var eventPlanA_1_1 = {
            title: '【基礎】01 手続き関係',
            start: plansUser.A_1_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_1_1);

        var eventPlanA_1_2 = {
            title: '【基礎】01 環境構築',
            start: plansUser.A_1_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_1_2);

        var eventPlanA_2_1 = {
            title: '【基礎】02 HTML基礎文法1',
            start: plansUser.A_2_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_2_1);

        var eventPlanA_2_2 = {
            title: '【基礎】02 HTML基礎文法2',
            start: plansUser.A_2_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_2_2);

        var eventPlanA_2_3 = {
            title: '【基礎】02 CSS基礎文法1',
            start: plansUser.A_2_3,
            color: plansColor,
        };
        setPlans.push(eventPlanA_2_3);

        var eventPlanA_2_4 = {
            title: '【基礎】02 CSS基礎文法2',
            start: plansUser.A_2_4,
            color: plansColor,
        };
        setPlans.push(eventPlanA_2_4);

        var eventPlanA_3_1 = {
            title: '【基礎】03 Git概要、Gitコマンド',
            start: plansUser.A_3_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_3_1);

        var eventPlanA_3_2 = {
            title: '【基礎】03 GitHub',
            start: plansUser.A_3_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_3_2);

        var eventPlanA_4_1 = {
            title: '【基礎】04 ポートフォリオ概要',
            start: plansUser.A_4_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_4_1);

        var eventPlanA_4_2 = {
            title: '04 ポートフォリオ作成1',
            start: plansUser.A_4_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_4_2);

        var eventPlanA_4_3 = {
            title: '【基礎】04 ポートフォリオ作成2',
            start: plansUser.A_4_3,
            color: plansColor,
        };
        setPlans.push(eventPlanA_4_3);

        var eventPlanA_4_4 = {
            title: '【基礎】04 ポートフォリオ作成3',
            start: plansUser.A_4_4,
            color: plansColor,
        };
        setPlans.push(eventPlanA_4_4);

        var eventPlanA_4_5 = {
            title: '【基礎】04 ポートフォリオ演習',
            start: plansUser.A_4_5,
            color: plansColor,
        };
        setPlans.push(eventPlanA_4_5);

        var eventPlanA_5_1 = {
            title: '【基礎】05 PHP概要',
            start: plansUser.A_5_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_1);

        var eventPlanA_5_2 = {
            title: '【基礎】05 PHP基礎文法1',
            start: plansUser.A_5_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_2);

        var eventPlanA_5_3 = {
            title: '【基礎】05 PHP基礎文法2',
            start: plansUser.A_5_3,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_3);

        var eventPlanA_5_4 = {
            title: '【基礎】05 PHP基礎文法3',
            start: plansUser.A_5_4,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_4);

        var eventPlanA_5_5 = {
            title: '【基礎】05 PHP基礎文法4',
            start: plansUser.A_5_5,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_5);

        var eventPlanA_5_6 = {
            title: '【基礎】05 PHP基礎文法5',
            start: plansUser.A_5_6,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_6);

        var eventPlanA_5_7 = {
            title: '【基礎】05 PHP基礎文法6',
            start: plansUser.A_5_7,
            color: plansColor,
        };
        setPlans.push(eventPlanA_5_7);

        var eventPlanA_6_1 = {
            title: '【基礎】06 JavaScript概要',
            start: plansUser.A_6_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_6_1);

        var eventPlanA_6_2 = {
            title: '【基礎】06 JavaScript基礎文法1',
            start: plansUser.A_6_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_6_2);

        var eventPlanA_6_3 = {
            title: '【基礎】06 JavaScript基礎文法2',
            start: plansUser.A_6_3,
            color: plansColor,
        };
        setPlans.push(eventPlanA_6_3);

        var eventPlanA_6_4 = {
            title: '【基礎】06 JavaScriptフレームワーク',
            start: plansUser.A_6_4,
            color: plansColor,
        };
        setPlans.push(eventPlanA_6_4);

        var eventPlanA_6_5 = {
            title: '【基礎】06 JavaScript演習',
            start: plansUser.A_6_5,
            color: plansColor,
        };
        setPlans.push(eventPlanA_6_5);

        var eventPlanA_7_1 = {
            title: '【基礎】07 SQL概要',
            start: plansUser.A_7_1,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_1);

        var eventPlanA_7_2 = {
            title: '【基礎】07 SQL基礎文法1',
            start: plansUser.A_7_2,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_2);

        var eventPlanA_7_3 = {
            title: '【基礎】07 SQL基礎文法2',
            start: plansUser.A_7_3,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_3);

        var eventPlanA_7_4 = {
            title: '【基礎】07 SQL基礎文法3',
            start: plansUser.A_7_4,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_4);

        var eventPlanA_7_5 = {
            title: '【基礎】07 SQL演習1',
            start: plansUser.A_7_5,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_5);

        var eventPlanA_7_6 = {
            title: '【基礎】07 SQL演習2',
            start: plansUser.A_7_6,
            color: plansColor,
        };
        setPlans.push(eventPlanA_7_6);

        var eventPlanB_1_1 = {
            title: '【応用】01 Twitterクローン：ホーム画面1',
            start: plansUser.B_1_1,
            color: plansColor,
        };
        setPlans.push(eventPlanB_1_1);

        var eventPlanB_1_2 = {
            title: '【応用】01 Twitterクローン：ホーム画面2',
            start: plansUser.B_1_2,
            color: plansColor,
        };
        setPlans.push(eventPlanB_1_2);

        var eventPlanB_1_3 = {
            title: '【応用】01 Twitterクローン：Git管理',
            start: plansUser.B_1_3,
            color: plansColor,
        };
        setPlans.push(eventPlanB_1_3);

        var eventPlanB_1_4 = {
            title: '【応用】01 Twitterクローン：ホーム画面3',
            start: plansUser.B_1_4,
            color: plansColor,
        };
        setPlans.push(eventPlanB_1_4);

        var eventPlanB_1_5 = {
            title: '【応用】01 Twitterクローン：ホーム画面4',
            start: plansUser.B_1_5,
            color: plansColor,
        };
        setPlans.push(eventPlanB_1_5);

        var eventPlanB_2_1 = {
            title: '【応用】02 Twitterクローン：設計、開発手法',
            start: plansUser.B_2_1,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_1);

        var eventPlanB_2_2 = {
            title: '【応用】02 Twitterクローン：会員登録画面＆ログイン画面',
            start: plansUser.B_2_2,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_2);

        var eventPlanB_2_3 = {
            title: '【応用】02 Twitterクローン：ユーザー画面',
            start: plansUser.B_2_3,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_3);

        var eventPlanB_2_4 = {
            title: '【応用】02 Twitterクローン：その他の画面',
            start: plansUser.B_2_4,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_4);

        var eventPlanB_2_5 = {
            title: '【応用】02 Twitterクローン：データベース作成',
            start: plansUser.B_2_5,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_5);

        var eventPlanB_2_6 = {
            title: '【応用】02 Twitterクローン：会員登録機能',
            start: plansUser.B_2_6,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_6);

        var eventPlanB_2_7 = {
            title: '【応用】02 Twitterクローン：ログイン機能',
            start: plansUser.B_2_7,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_7);

        var eventPlanB_2_8 = {
            title: '【応用】02 Twitterクローン：ツイート投稿機能',
            start: plansUser.B_2_8,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_8);

        var eventPlanB_2_9 = {
            title: '【応用】02 Twitterクローン：ホーム機能',
            start: plansUser.B_2_9,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_9);

        var eventPlanB_2_10 = {
            title: '【応用】02 Twitterクローン：いいね！機能を非同期で実装',
            start: plansUser.B_2_10,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_10);

        var eventPlanB_2_11 = {
            title: '【応用】02 Twitterクローン：検索機能',
            start: plansUser.B_2_11,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_11);

        var eventPlanB_2_12 = {
            title: '【応用】02 Twitterクローン：ユーザーページ（フォロー）',
            start: plansUser.B_2_12,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_12);

        var eventPlanB_2_13 = {
            title: '【応用】02 Twitterクローン：通知機能',
            start: plansUser.B_2_13,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_13);

        var eventPlanB_2_14 = {
            title: '【応用】02 Twitterクローン：ホーム機能をタイムライン化',
            start: plansUser.B_2_14,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_14);

        var eventPlanB_2_15 = {
            title: '【応用】02 Twitterクローン：さくらVPS構築',
            start: plansUser.B_2_15,
            color: plansColor,
        };
        setPlans.push(eventPlanB_2_15);

        var eventPlanB_3_1 = {
            title: '【応用】03 Laravel概要',
            start: plansUser.B_3_1,
            color: plansColor,
        };
        setPlans.push(eventPlanB_3_1);

        var eventPlanB_3_2 = {
            title: '【応用】03 Laravel使い方1',
            start: plansUser.B_3_2,
            color: plansColor,
        };
        setPlans.push(eventPlanB_3_2);

        var eventPlanB_3_3 = {
            title: '【応用】03 Laravel使い方2',
            start: plansUser.B_3_3,
            color: plansColor,
        };
        setPlans.push(eventPlanB_3_3);

        var eventPlanB_3_4 = {
            title: '【応用】03 LaravelでHerokuデプロイ',
            start: plansUser.B_3_4,
            color: plansColor,
        };
        setPlans.push(eventPlanB_3_4);

        var eventPlanB_3_5 = {
            title: '【応用】03 Laravel演習',
            start: plansUser.B_3_5,
            color: plansColor,
        };
        setPlans.push(eventPlanB_3_5);

        var eventPlanC_1_1 = {
            title: '【開発】01 業務改善システムの企画',
            start: plansUser.C_1_1,
            color: plansColor,
        };
        setPlans.push(eventPlanC_1_1);

        var eventPlanC_1_2 = {
            title: '【開発】01 チーム開発',
            start: plansUser.C_1_2,
            color: plansColor,
        };
        setPlans.push(eventPlanC_1_2);

        var eventPlanC_1_3 = {
            title: '【開発】01 チーム開発発表会',
            start: plansUser.C_1_3,
            color: plansColor,
        };
        setPlans.push(eventPlanC_1_3);

        var eventPlanC_2_1 = {
            title: '【開発】02 ビジネストレンド、ビジネス戦略',
            start: plansUser.C_2_1,
            color: plansColor,
        };
        setPlans.push(eventPlanC_2_1);

        var eventPlanC_2_2 = {
            title: '【開発】02 自主制作',
            start: plansUser.C_2_2,
            color: plansColor,
        };
        setPlans.push(eventPlanC_2_2);

        var eventPlanC_2_3 = {
            title: '【開発】02 自主制作発表会',
            start: plansUser.C_2_3,
            color: plansColor,
        };
        setPlans.push(eventPlanC_2_3);


        //////////////////////////////
        // ログインユーザーの実績を表示
        //////////////////////////////

        // $param_json_recordsを受け取る
        var records = @json($param_json_records);
        // jsonをオブジェクト化
        var records = JSON.parse(records);
        // 変数のキーの数を取得
        var recordsKeys = Object.keys(records);
        // 配列をセット
        var setRecords = [];
        // 背景色の設定
        var recordsColor = '#00ABAE';

        var recordsUser = records[0];

        var eventRecordsA_1_1 = {
            title: '【基礎】01 手続き関係',
            start: recordsUser.A_1_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_1_1);

        var eventRecordsA_1_2 = {
            title: '【基礎】01 環境構築',
            start: recordsUser.A_1_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_1_2);

        var eventRecordsA_2_1 = {
            title: '【基礎】02 HTML基礎文法1',
            start: recordsUser.A_2_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_2_1);

        var eventRecordsA_2_2 = {
            title: '【基礎】02 HTML基礎文法2',
            start: recordsUser.A_2_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_2_2);

        var eventRecordsA_2_3 = {
            title: '【基礎】02 CSS基礎文法1',
            start: recordsUser.A_2_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_2_3);

        var eventRecordsA_2_4 = {
            title: '【基礎】02 CSS基礎文法2',
            start: recordsUser.A_2_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_2_4);

        var eventRecordsA_3_1 = {
            title: '【基礎】03 Git概要、Gitコマンド',
            start: recordsUser.A_3_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_3_1);

        var eventRecordsA_3_2 = {
            title: '【基礎】03 GitHub',
            start: recordsUser.A_3_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_3_2);

        var eventRecordsA_4_1 = {
            title: '【基礎】04 ポートフォリオ概要',
            start: recordsUser.A_4_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_4_1);

        var eventRecordsA_4_2 = {
            title: '【基礎】04 ポートフォリオ作成１',
            start: recordsUser.A_4_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_4_2);

        var eventRecordsA_4_3 = {
            title: '【基礎】04 ポートフォリオ作成２',
            start: recordsUser.A_4_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_4_3);

        var eventRecordsA_4_4 = {
            title: '【基礎】04 ポートフォリオ作成２',
            start: recordsUser.A_4_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_4_4);

        var eventRecordsA_4_5 = {
            title: '【基礎】04 ポートフォリオ演習',
            start: recordsUser.A_4_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_4_5);

        var eventRecordsA_5_1 = {
            title: '【基礎】05 PHP概要',
            start: recordsUser.A_5_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_1);

        var eventRecordsA_5_2 = {
            title: '【基礎】05 PHP基礎文法1',
            start: recordsUser.A_5_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_2);

        var eventRecordsA_5_3 = {
            title: '【基礎】05 PHP基礎文法2',
            start: recordsUser.A_5_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_3);

        var eventRecordsA_5_4 = {
            title: '【基礎】05 PHP基礎文法3',
            start: recordsUser.A_5_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_4);

        var eventRecordsA_5_5 = {
            title: '【基礎】05 PHP基礎文法4',
            start: recordsUser.A_5_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_5);

        var eventRecordsA_5_6 = {
            title: '【基礎】05 PHP基礎文法5',
            start: recordsUser.A_5_6,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_6);

        var eventRecordsA_5_7 = {
            title: '【基礎】05 PHP基礎文法6',
            start: recordsUser.A_5_7,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_5_7);

        var eventRecordsA_6_1 = {
            title: '【基礎】06 JavaScript概要',
            start: recordsUser.A_6_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_6_1);

        var eventRecordsA_6_2 = {
            title: '【基礎】06 JavaScript基礎文法1',
            start: recordsUser.A_6_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_6_2);

        var eventRecordsA_6_3 = {
            title: '【基礎】06 JavaScript基礎文法2',
            start: recordsUser.A_6_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_6_3);

        var eventRecordsA_6_4 = {
            title: '【基礎】06 JavaScriptフレームワーク',
            start: recordsUser.A_6_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_6_4);

        var eventRecordsA_6_5 = {
            title: '【基礎】06 JavaScript演習',
            start: recordsUser.A_6_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_6_5);

        var eventRecordsA_7_1 = {
            title: '【基礎】07 SQL概要',
            start: recordsUser.A_7_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_1);

        var eventRecordsA_7_2 = {
            title: '【基礎】07 SQL基礎文法1',
            start: recordsUser.A_7_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_2);

        var eventRecordsA_7_3 = {
            title: '【基礎】07 SQL基礎文法2',
            start: recordsUser.A_7_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_3);

        var eventRecordsA_7_4 = {
            title: '【基礎】07 SQL基礎文法3',
            start: recordsUser.A_7_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_4);

        var eventRecordsA_7_5 = {
            title: '【基礎】07 SQL演習1',
            start: recordsUser.A_7_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_5);

        var eventRecordsA_7_6 = {
            title: '【基礎】07 SQL演習2',
            start: recordsUser.A_7_6,
            color: recordsColor,
        };
        setRecords.push(eventRecordsA_7_6);

        var eventRecordsB_1_1 = {
            title: '【応用】01 Twitterクローン：ホーム画面1',
            start: recordsUser.B_1_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_1_1);

        var eventRecordsB_1_2 = {
            title: '【応用】01 Twitterクローン：ホーム画面2',
            start: recordsUser.B_1_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_1_2);

        var eventRecordsB_1_3 = {
            title: '【応用】01 Twitterクローン：Git管理',
            start: recordsUser.B_1_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_1_3);

        var eventRecordsB_1_4 = {
            title: '【応用】01 Twitterクローン：ホーム画面3',
            start: recordsUser.B_1_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_1_4);

        var eventRecordsB_1_5 = {
            title: '【応用】01 Twitterクローン：ホーム画面4',
            start: recordsUser.B_1_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_1_5);

        var eventRecordsB_2_1 = {
            title: '【応用】02 Twitterクローン：設計、開発手法',
            start: recordsUser.B_2_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_1);

        var eventRecordsB_2_2 = {
            title: '【応用】02 Twitterクローン：会員登録画面＆ログイン画面',
            start: recordsUser.B_2_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_2);

        var eventRecordsB_2_3 = {
            title: '【応用】02 Twitterクローン：ユーザー画面',
            start: recordsUser.B_2_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_3);

        var eventRecordsB_2_4 = {
            title: '【応用】02 Twitterクローン：その他の画面',
            start: recordsUser.B_2_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_4);

        var eventRecordsB_2_5 = {
            title: '【応用】02 Twitterクローン：データベース作成',
            start: recordsUser.B_2_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_5);

        var eventRecordsB_2_6 = {
            title: '【応用】02 Twitterクローン：会員登録機能',
            start: recordsUser.B_2_6,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_6);

        var eventRecordsB_2_7 = {
            title: '【応用】02 Twitterクローン：ログイン機能',
            start: recordsUser.B_2_7,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_7);

        var eventRecordsB_2_8 = {
            title: '【応用】02 Twitterクローン：ツイート投稿機能',
            start: recordsUser.B_2_8,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_8);

        var eventRecordsB_2_9 = {
            title: '【応用】02 Twitterクローン：ホーム機能',
            start: recordsUser.B_2_9,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_9);

        var eventRecordsB_2_10 = {
            title: '【応用】02 Twitterクローン：いいね！機能を非同期で実装',
            start: recordsUser.B_2_10,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_10);

        var eventRecordsB_2_11 = {
            title: '【応用】02 Twitterクローン：検索機能',
            start: recordsUser.B_2_11,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_11);

        var eventRecordsB_2_12 = {
            title: '【応用】02 Twitterクローン：ユーザーページ（フォロー）',
            start: recordsUser.B_2_12,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_12);

        var eventRecordsB_2_13 = {
            title: '【応用】02 Twitterクローン：通知機能',
            start: recordsUser.B_2_13,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_13);

        var eventRecordsB_2_14 = {
            title: '【応用】02 Twitterクローン：ホーム機能をタイムライン化',
            start: recordsUser.B_2_14,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_14);

        var eventRecordsB_2_15 = {
            title: '【応用】02 Twitterクローン：さくらVPS構築',
            start: recordsUser.B_2_15,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_2_15);

        var eventRecordsB_3_1 = {
            title: '【応用】03 Laravel概要',
            start: recordsUser.B_3_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_3_1);

        var eventRecordsB_3_2 = {
            title: '【応用】03 Laravel使い方1',
            start: recordsUser.B_3_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_3_2);

        var eventRecordsB_3_3 = {
            title: '【応用】03 Laravel使い方2',
            start: recordsUser.B_3_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_3_3);

        var eventRecordsB_3_4 = {
            title: '【応用】03 LaravelでHerokuデプロイ',
            start: recordsUser.B_3_4,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_3_4);

        var eventRecordsB_3_5 = {
            title: '【応用】03 Laravel演習',
            start: recordsUser.B_3_5,
            color: recordsColor,
        };
        setRecords.push(eventRecordsB_3_5);

        var eventRecordsC_1_1 = {
            title: '【開発】01 業務改善システムの企画',
            start: recordsUser.C_1_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_1_1);

        var eventRecordsC_1_2 = {
            title: '【開発】01 チーム開発',
            start: recordsUser.C_1_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_1_2);

        var eventRecordsC_1_3 = {
            title: '【開発】01 チーム開発発表会',
            start: recordsUser.C_1_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_1_3);

        var eventRecordsC_2_1 = {
            title: '【開発】02 ビジネストレンド、ビジネス戦略',
            start: recordsUser.C_2_1,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_2_1);

        var eventRecordsC_2_2 = {
            title: '【開発】02 自主制作',
            start: recordsUser.C_2_2,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_2_2);

        var eventRecordsC_2_3 = {
            title: '【開発】02 自主制作発表会',
            start: recordsUser.C_2_3,
            color: recordsColor,
        };
        setRecords.push(eventRecordsC_2_3);

        // allEventsにすべてのイベント、予定、実績をjsonに入れる。
        var allEvents = setEvents.concat(setPlans, setRecords);

        

        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ["interaction", "dayGrid", "timeGrid", ],
                //プラグイン読み込み
                selectable: true,
                navLinks: false,
                defaultView: "dayGridMonth",
                //カレンダーを月ごとに表示
                firstDay: 0,
                eventDurationEditable: false,
                timeZone: "Asia/Tokyo",
                selectLongPressDelay: 0,
                editable: false,
                locale: "ja",
                businessHours: false,
                header: {
                    left: "prev,next",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek, today",
                },
                events: allEvents,

                dateClick: function(info) {

                    // 日付取得のため、URLに遷移。
                    window.location.href = '/getDate/' + info.dateStr;
                },

            });
            calendar.render();
        });
        

    </script>

    @extends('layouts.app')

    <div id="calendar"></div>


</body>

</html>

<script>
    toastr.options = {
          "positionClass": "toast-top-center",
          "timeOut": "2000",
    };
    @if (session('flash_message'))
        $(function () {
            toastr.success('{{ session('flash_message') }}');              
        });
    @endif
  
</script>