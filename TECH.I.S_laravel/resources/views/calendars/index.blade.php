<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    </style>
</head>

<body>
    <a href="/TECH.Carender/Sutert.html" class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active">ログアウト</a>

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
        var eventsColor = '#378006';
        // ループ処理でsetEventsにtitle,startを入れる。
        for (var i = 0; i < eventsKeys.length; i++) {
            var event = {
                title: (events[i].body),
                start: (start[i].date) + 'T' + (start[i].start_time),
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
        var plansColor = 'purple';
        for (var i = 0; i < plansKeys.length; i++) {
            var plansUser = plans[i];
            
            var eventPlanA_a_1 = {
                title: '01 手続き関係',
                start: plansUser.A_a_1,
                color: plansColor,
            };
            setPlans.push(eventPlanA_a_1);

            var eventPlanA_a_2 = {
                title: '01 環境構築',
                start: plansUser.A_a_2 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_a_2);

            var eventPlanA_b_1 = {
                title: '02 HTML基礎文法1',
                start: plansUser.A_b_1 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_b_1);

            var eventPlanA_b_2 = {
                title: '02 HTML基礎文法2',
                start: plansUser.A_b_2 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_b_2);

            var eventPlanA_b_3 = {
                title: '02 CSS基礎文法1',
                start: plansUser.A_b_3 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_b_3);

            var eventPlanA_b_4 = {
                title: '02 CSS基礎文法2',
                start: plansUser.A_b_4 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_b_4);

            var eventPlanA_c_1 = {
                title: '03 Git概要、Gitコマンド',
                start: plansUser.A_c_1 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_c_1);

            var eventPlanA_c_2 = {
                title: '03 GitHub',
                start: plansUser.A_c_2 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_c_2);

            var eventPlanA_d_1 = {
                title: '04 ポートフォリオ概要',
                start: plansUser.A_d_1 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_d_1);

            var eventPlanA_d_2 = {
                title: '04 ポートフォリオ作成１',
                start: plansUser.A_d_2 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_d_2);

            var eventPlanA_d_3 = {
                title: '04 ポートフォリオ作成２',
                start: plansUser.A_d_3 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_d_3);

            var eventPlanA_d_4 = {
                title: '04 ポートフォリオ作成２',
                start: plansUser.A_d_4 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_d_4);

            var eventPlanA_d_5 = {
                title: '04 ポートフォリオ演習',
                start: plansUser.A_d_5 ,
                color: plansColor,
            };
            setPlans.push(eventPlanA_d_5);
        };
        
        console.log(setEvents);

        var allEvents = setEvents.concat(setPlans);
        // const allEvents = Object.assign(setEvents,setPlans);
        console.log(allEvents);

        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ["interaction", "dayGrid", "timeGrid", ],
                //プラグイン読み込み
                selectable: true,
                navLinks: false,
                defaultView: "dayGridMonth",
                //カレンダーを月ごとに表示
                editable: true,
                //イベント編集
                firstDay: 0,
                eventDurationEditable: false,
                timeZone: "Asia/Tokyo",
                selectLongPressDelay: 0,
                editable: false,
                locale: "ja",
                businessHours: true,
                header: {
                    left: "prev,next",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek, today",
                },
                events: allEvents,

                dateClick: function(info) {
                    window.location.href = 'http://localhost/TECH.Carender/goal_input.html?date= ' + info.dateStr;
                },

            });
            calendar.render();
        });
    </script>

    @extends('layouts.app')

    <div id="calendar"></div>


</body>

</html>