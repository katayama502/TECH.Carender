function addEvent(calendar,info){
    //addEvent()を使うためにfullcalendar.jsで定義したcalendarを引数で受け取る

    var body = "サンプルイベント";
    //ホントはjsでformのvalue取得とかするんだと思いますが、説明を簡潔にするために割愛します。
    $.ajax({
        url: '/ajax/addEvent',
        type: 'POST',
        dataTape: 'json',
        data:{
            // "title":title,
            "date":info.dateStr
            //日程取得
        }
    }).done(function(result) {
        calendar.addEvent({
            id:result['id'],
            //php側から受け取ったevent_idをeventObjectのidにセット
            body:body,
            start: info.dateStr,
        });
        //ajaxに成功したらフロント側にeventを追加で表示
    });
}

function editEventDate(info){
    var id = info.event.id;
    var date = formatDate(info.event.start);

    $.ajax({
        url: '/ajax/editEventDate',
        type: 'POST',
        data:{
            "id":id,
            "newDate":date
            //ドロップしたあとの日付をphp側に渡す
        }
    })
}

function formatDate(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var newDate = year + '-' + month + '-' + day;
    return newDate;
}
//info.event.startの日付を"2019-12-12"のように整形する関数