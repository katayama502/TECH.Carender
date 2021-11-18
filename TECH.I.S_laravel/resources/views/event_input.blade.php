<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/sub.css">
    <title>目標・実績入力画面</title>
</head>
<body>
    <div id = 'day'></div>
        <div class="display-wrapper">
            <div class="container3">
                <div class="item2">
                    <h1>イベント予定</h1>
                </div>
                <div class="item2">
                    <input id="memo" type="text" name="memo" value="">
                </div>
            </div>
        </div>
        <div class="input-wrapper">
            <div class="container3">
                <div class="item2">
                    <input id="curriculum" type="text" name="curriculum" value="イベント名を入力してください">
                </div>
                        
                <div class="time_input">
                    <h3>開始時間</h3>
                    <input type="time" min="09：00" max="17：30" step="900">
                </div>
                <div class="time_input">
                    <h3>終了時間</h3>
                    <input type="time" min="09：00" max="17：30" step="900">
                </div>
                <a type="submit" class="btn btn--yellow btn--cubic"href="http://localhost/TECH.Carender/examples/background-events.html"id = "sub1">イベント登録</a>
            </div>                
        </div>
    <script> 
    const params = new URLSearchParams(window.location.search);
    var date1 = document.getElementById('day').innerHTML = (params.get('date'));
    </script>
</body>
</html>