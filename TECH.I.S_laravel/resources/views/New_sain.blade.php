<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>TECH.I.S_システム新規登録</title>
</head>
<body>
    <div id="back">
    <div class="container">
        <h1>新規登録画面</h1>
        <div class="item">
            <img class="item1"src="img/TECH.png">
        </div>
        <div class="item">
            <label for="mailaddles">メールアドレス</label>
        </div>
        <div class="item">       
            <input id="mailaddles" type="text"　 name="Introduction_name" value="">
        </div>
        <br>
        <div class="item">
            <label for="pass">パスワード</label>
        </div>
        <div class="item"> 
            <input id="pass" type="text"　 name="Introduction_name" value="">
        </div>
        <br>
        <div class="item">
            <a type="submit" class="btn btn--yellow btn--cubic"href="{{ url('/') }}">登録</a>
        </div>
    </div>
</div>
</body>
</html>