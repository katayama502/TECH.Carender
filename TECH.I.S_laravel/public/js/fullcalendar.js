document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ["interaction", "dayGrid", "timeGrid",],
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
        header: {
            left: "prev,next",
            center: "title",
            right: "dayGridMonth,timeGridWeek, today",
        },
        events: [
            {
                title: "イベント",
                start: "2021-11-01",
                color: '#257e4a'
            },
            "/setEvents",
            // $.getJSON(setEvents, (data) => {
            //     console.log(`title=${data.title}, =${data.start}`);
            //   }),

        ],

    
        eventDrop: function (info) {
            //eventをドラッグしたときの処理
            //editEventDate(info);
        
        },

        dateClick: function(info) {
            window.location.href = 'http://localhost/TECH.Carender/goal_input.html?date= ' + info.dateStr;
        },
        businessHours: true,
    });
    calendar.render();
});
