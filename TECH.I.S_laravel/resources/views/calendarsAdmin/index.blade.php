<!DOCTYPE html>
<html>
    
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <meta charset='utf-8' />
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
        <li>　</li>
        <a href="/admin_logout" button type="button" class="logout fc-button fc-button-primary fc-button-active">ログアウト</a>
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

        // allEventsにすべてのイベント、予定、実績をjsonに入れる。
        var allEvents = setEvents

        

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
                    window.location.href = '/getDateAdmin/' + info.dateStr;
                },

            });
            calendar.render();
        });
        

    </script>

    @extends('layouts.app')

    <div id="calendar"></div>

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

</body>

</html>

