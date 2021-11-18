<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sub.css') }}">
    <title>目標・実績入力画面</title>
</head>
<body>
    {{$day}}
    <div id = 'day'></div>
    <div class="container">
        
        <div class="item">
        <h1>目標</h1>
        </div>
        <div class="item">
        <h1>実績</h1>
        </div>
        <br>
       
    </div>
    <div class="container2">
        
        <div class="item2">
            <h1>学習項目選択</h1>
        </div>
        <div class="item2">
            <input id="curriculum" type="text"　 name="curriculum" value="カリキュラムを選択してください">
        </div>
           
        <div class="item2">
            <input id="category" type="text"　 name="category" value="カテゴリを選択してください">
        </div>
           
        <div class="item2">
            <input id="lesson" type="text"　 name="lesson" value="レッスンNoを選択してください">
        </div>
        <a type="submit" class="btn btn--yellow btn--cubic"href="http://localhost/TECH.Carender/examples/background-events.html"id = "sub1">目標登録</a>
        <a type="submit" class="btn btn--yellow btn--cubic"href="http://localhost/TECH.Carender/examples/background-events.html"id = "sub2">実績登録</a>
    </div>
        <div class="container3">
            <div class="item2">
                <h1>メモ</h1>
            </div>
            <div class="item2">
                <input id="memo" type="text"　 name="memo" value="">
            </div>
            <!-- <a type="submit" class="btn btn--yellow btn--cubic"href="http://localhost/TECH.Carender/examples/background-events.html"id = "sub3">保存</a> -->
        </div>
        <a type="submit" class="btn btn--yellow btn--cubic"href="{{ url('Carender') }}"id = "sub3">戻る</a>
        <a type="submit" class="btn btn--yellow btn--cubic"href="{{ url('Carender') }}"id = "sub3">保存</a>
    <script> 
    const params = new URLSearchParams(window.location.search);
    var date1 = document.getElementById('day').innerHTML = (params.get('date'));
    </script>
</body>
</html>