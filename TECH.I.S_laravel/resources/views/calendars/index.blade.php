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
    </script>

    <script>
        // $param_json_bodyを受け取る
        var events = @json($param_json_body);
        // jsonをオブジェクト化
        var events = JSON.parse(events);

        // $param_json_dateを受け取る
        var start = @json($param_json_date);
        // jsonをオブジェクト化
        var start = JSON.parse(start);

        // 変数のキーの数を取得
        var keys = Object.keys(events);
        
        // 配列をセット
        var setEvents = []

        // ループ処理でsetEventsにtitle,startを入れる。
        for (var i =0; i<keys.length; i++){
            var event =
            {
                title: (events[i].body),
                start: (start[i].date),
                // color: '#378006',
            };
            setEvents.push(event);
        };
        

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
                events: setEvents,
                // getEventData(events,start),

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