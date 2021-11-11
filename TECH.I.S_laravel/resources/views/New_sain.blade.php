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
        <form action="new_add" method="post">
        @csrf
        <div class="item">
            <img class="item1"src="img/TECH.png">
        </div>
        <div class="item">
            <label for="mailaddles">メールアドレス</label>
        </div>
        <div class="item">       
            <input id="mailaddles" type="text"　 name="Introduction_name" value="">
            @if (!empty($errors->first('Introduction_name')))
            <p class="error_message">{{$errors->first('Introduction_name')}}</p>
            @endif
        </div>
        <br>
        <div class="item">
            <label for="pass">パスワード</label>
        </div>
        <div class="item"> 
            <input id="pass" type="password"　 name="Introduction_pass" value="">
            @if (!empty($errors->first('Introduction_pass')))
            <p class="error_message">{{$errors->first('Introduction_pass')}}</p>
            @endif
        </div>
        <br>
        <div class="item">
            <button type="submit" class="btn btn--yellow btn--cubic">登録</button>
        </div>
        </form>
    </div>
</div>
</body>
</html>