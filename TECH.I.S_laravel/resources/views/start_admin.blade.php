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
</html>