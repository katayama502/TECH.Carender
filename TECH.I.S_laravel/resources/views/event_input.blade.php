<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/jonthornton/jquery-timepicker/3e0b283a/jquery.timepicker.min.css">
    <script src="https://cdn.rawgit.com/jonthornton/jquery-timepicker/3e0b283a/jquery.timepicker.min.js"></script>
    <title>イベント予定入力画面</title>
</head>
<body>
    <header>
        <div class="container"> 
            <h2>2021年 11月 10日</h2>
        </div>
    </header>
        <div class="event-wrapper">
            <div class="container">
                <div class="event-item">
                    <h2>イベント予定</h2>
                    <div class="scrollbox">
                        @foreach ($Events as $key => $Event)
                        <form action="{{ url('event_delete/'.$Event['id'] ) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <p class="event_plan">{{ $Event["body"]."  ".date('g:i',strtotime($Event["start_time"]))."~".date('g:i',strtotime($Event["end_time"])) }}</p>
                            <button type="submit" class="btn--delete" name="submit" id = "sub1" value="plan">削除</button>
                        </form>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="input-wrapper">
            <div class="container">
                <h2>イベント予定入力</h2>
            </div> 
            <form action="{{ url('event_edit') }}" method="post" class="container">
                {{ csrf_field() }}
                <div class="item-input">
                    <div class="event_name">
                        <h3>イベント名</h3>
                        <input type="text" name="event_name" value="{{ old('event_name') }}">
                    </div>                
                    <div class="time_input">
                        <h3>開始時間</h3>
                        <input type="text" min="09：00" max="17：30" step="900" name="start_time" class="time start" value="{{ old('start_time') }}">
                    </div>
                    <div class="time_input">
                        <h3>終了時間</h3>
                        <input type="text" min="09：00" max="17：30" step="900" name="end_time" class="time end" value="{{ old('name_start_time') }}">
                    </div>
                </div>
                <div class="item-input">
                    <button type="submit" class="btn--yellow btn--cubic">イベント登録</button>
                </div>
            </form>           
        </div>

        <footer>
            <div class="footer_link">
                <button onclick="location.href='{{ url('/Carender')}}'">カレンダーへ戻る</button>
            </div>
        </footer>
        
    <script>
    const params = new URLSearchParams(window.location.search);
    //var date1 = document.getElementById('day').innerHTML = (params.get('date'));
    </script>
    <script>
        toastr.options = {
          "positionClass": "toast-top-center",
          "timeOut": "1500",
        };
            @if (session('flash_message') && session('flash_message')!='終了時刻は開始時刻より後に設定してください')
                $(function () {
                        toastr.success('{{ session('flash_message') }}');                
                });
            @endif
            @if (session('flash_message')==='終了時刻は開始時刻より後に設定してください')
                $(function () {
                        toastr.error('{{ session('flash_message') }}');                
                });
            @endif
            @if (count($errors) > 0)
                $(function () {
                        toastr.error('{!! (implode('<br>',$errors->all())) !!}');                
                });
            @endif
    </script>
    <script>
        $('.time').timepicker({
    	'minTime': '10:00am',
    	'maxTime': '22:00pm',
    });

    </script>
    <style>
      body {
          margin: 40px 10px;
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
      }

      .container {
       max-width: 900px;
       margin: 0 auto;
       display: flex;
      }

      header{
        height: 65px;
        width: 100%;
      }
      
      header h2{
        width: 100%;
        text-align: center;
        padding-bottom :10px;
        border-bottom: solid 1px #797979;
      }

      .plan-record-wrapper{
        height: 300px;
      }

      .plan-record-wrapper .learning-item{
        flex: auto;
        width: 50%;
        padding: 0 10px;
        height: 100%;
      }

      .plan-record-wrapper .learning_plan, .event-wrapper .event_plan{
        padding-left: 10px;
        display: inline-block;
      }

      .scrollbox{
        width: 100%;                /* 横幅を200pxに指定 */
        height: 200px;               /* 横幅を200pxに指定 */
        border: 1px solid #000;      /* わかりやすくボーダーを引く */
        overflow-y: scroll;          /* 縦方向にスクロール可能にする */
      }

      .input-wrapper {
        height: 250px;
      }

      .input-wrapper .item-input{
        flex: auto;
        width: 50%;
        padding: 0 10px;
        text-align: center;
      }

      .input-wrapper .item-input button{
        flex: auto;
        width: 50%;
        margin: 0px auto 10px auto;
      }

      .input-wrapper h2,{
        display: block;
        padding: 0 10px;
      }

      .input-wrapper .input-form{
        display: block;
        margin-bottom: 10px;
        width: 100%;
      }

      .memo-wrapper{
        height: 170px
      }

      .memo-wrapper h2{
        display: block;
        padding: 0 10px;
      }

      .memo-wrapper .text-form{
        width: 100%;
      }

      .memo-wrapper .memo-input{
        flex: auto;
        width: 50%;
        padding: 0 10px;
        text-align: center;
      }

      .memo-wrapper button, .input-wrapper button{
        width: 50%;
        display: block;
        margin: 0px auto 10px auto;
      }

      textarea {
       height: calc( 1.3em * 3 );
       line-height: 1.3;
      }

      footer{
        max-width: 900px;
        margin: 0 auto;
      }

      .footer_link{
        float:right;
      }

      button{
        color: #000;
        background-color: #cccccc;
        border: none;
        cursor: pointer;
        border-radius: 0.5rem;
      }

      .btn--yellow {
        color: #000;
        background-color: #fff100;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        box-shadow: 0 7px #ccc100;
      }

      .btn--yellow:active {
        box-shadow: none;
        position: relative;
        top: 5px;
      }

    .event-wrapper .event-item{
        flex: auto;
        width: 100%;
        padding: 0 10px;
        height: 100%;
      }
    
    .event_plan{
        padding-left: 10px;
        display: inline-block;
    }

    .item-event{
        display: block;
    }

    .input-wrapper .item-input{
        flex: auto;
        width: 50%;
        padding: 0 10px;
        text-align: center;
        float: left;
      }
    
    .time_input h3 ,.event_name h3{
        display: inline-block;
        text-align: left;
    }
    .time_input input{
        display: inline-block;
    }
    
    .input-wrapper h2{
        display: block;
        padding: 0 10px;
      }

    </style>
</body>
</html>