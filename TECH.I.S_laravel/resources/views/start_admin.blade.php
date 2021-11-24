<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>TECH.I.S_システム管理者画面</title>
</head>

<body>
    <div id="back">
    <div class="container">
        <h1>TECH.I.S システムズ管理者画面</h1>
        <div class="item">
            <img src="img/TECH.png">
        </div>
        <div class="item">
        <a href="{{ url('/login_admin') }}" class="btn btn--yellow btn--cubic">ログイン</a>
        </div>
        <br>
        <div class="item">
            <a href="{{ url('/sain_admin') }}" class="btn btn--yellow btn--cubic">新規登録</a>
        </div>
    </div>
</div>
</body>
</html>