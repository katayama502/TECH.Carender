
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <title>TECH.I.S_システムログイン管理者画面</title>
</head>
<body>
    
    <div id="back">
    <div class="container">
        <h1>管理者ログイン画面</h1>
        <div class="item">
            <img class="item1" src="img/TECH.png">
        </div>
        <form action="admin_check" method="post">
        @csrf
        <div class="item">
            <label for="mailaddles">メールアドレス</label>
        </div>
        <div class="item">       
            <input id="mailaddles" type="text"　 name="admin_login_name" value="">
            @if (!empty($errors->first('admin_login_name')))
            <p class="error_message">{{$errors->first('admin_login_name')}}</p>
            @endif
        </div>
        <br>
        <div class="item">
            <label for="pass">パスワード</label>
        </div>
        <div class="item"> 
            <input id="pass" type="password"　 name="admin_login_pass" value="">
            @if (!empty($errors->first('admin_login_pass')))
            <p class="error_message">{{$errors->first('admin_login_pass')}}</p>
            @endif
        </div>
        <br>
        <div class="item">
            <button type="submit" style="font-size: 0.8rem;" class="btn btn--yellow btn--cubic">ログイン</button>
        </div>
        <br>
        <div class="item">
            <a href="{{ url('admin') }}"class="btn btn--yellow btn--cubic">戻る</a>
        </div>

    </div>
</div>
</form>
</body>
</html>

<script>
    toastr.options = {
          "positionClass": "toast-top-center",
          "timeOut": "2000",
    };
    @if (session('flash_message'))
        $(function () {
            toastr.error('{{ session('flash_message') }}');              
        });
    @endif
  
</script>
