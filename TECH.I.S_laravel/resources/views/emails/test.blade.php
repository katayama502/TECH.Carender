<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>

    <p>本日の学習予定は、下記の通りです。</p>
    ーーーーーーーーーーーーーーーー
    @foreach ((array)$planAll1 as $plan)
    <p>・{{$plan}}</p>               
    @endforeach

    ーーーーーーーーーーーーーーーー
    <p>今日も頑張りましょう!!</p>
</body>
</html>
