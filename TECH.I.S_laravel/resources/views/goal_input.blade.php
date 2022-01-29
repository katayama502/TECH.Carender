<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>目標・実績入力画面</title>
</head>

<body>
    <header>
        <div class="container"> 
            <h2>{{date('Y年m月d日',  strtotime($date))}}</h2>
        </div>
    </header>
    <div class="plan-record-wrapper">

        <div class="container">  

            <div class="learning-item">
                <h2>目標</h2>
                <div class="scrollbox">
                    @foreach ($learningplans as $learningplan)
                    <form action="{{ url('plan_delete/' .$learningplan.'/'.$date) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <p class="learning_plan">{{$learningplan}}</p>

                        <button type="submit" class="btn--delete" name="submit" id = "sub1" value="plan">削除</button>
                    </form>
                    @endforeach
                </div>
            </div> 

            <div class="learning-item">
                <h2>実績</h2>
                <div class="scrollbox">
                    @foreach ($learningrecords as $learningrecord)
                    <form action="{{ url('record_delete/' .$learningrecord.'/'.$date) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <p class="learning_plan">{{$learningrecord}}</p>

                        <button type="submit" class="btn--delete" name="submit" id = "sub1" value="plan">削除</button>
                    </form>  
                    @endforeach
                </div>
            </div>
        </div>    
    </div> 
    <div class="input-wrapper">
        <div class="container">
            <h2>学習項目選択</h2>
        </div>      

        <form action="{{ url('goal_input/'.$date) }}" method="post" class="container">
            {{ csrf_field() }}
            <div class="item-input">
                <!-- 1つめのセレクトボックス。これは静的に生成されている（最初から内容が決まっている） -->
                <select name="genre" id="genre" class="input-form">
                    <option value="" disabled selected>課題を選択してください</option>
                    <option value="基礎課題">基礎課題</option>
                    <option value="応用課題">応用課題</option>
                    <option value="開発課題">開発課題</option>
                </select>
                <!-- 2つめのセレクトボックス。1つめで選んだジャンルに応じて、動的に選択肢を追加する -->
                <select name="category_name" id="category_name" class="input-form" disabled>
                    <option value="" disabled selected>カテゴリを選択してください</option>
                </select>
                <!-- 3つめのセレクトボックス。2つめで選んだカテゴリに応じて、動的に選択肢を追加する -->

                <select name="lesson_number" id="lesson_number" class="input-form" disabled> 

                    <option value="" disabled selected>レッスンNoを選択してください</option>
                </select>
            </div>
            <div class="item-input">
                <button type="submit" class="btn--yellow btn--cubic" name="submit" value="plan">目標登録</button>
                <button type="submit" class="btn--yellow btn--cubic" name="submit" value="record">実績登録</button>
            </div>
        </form>
    </div>
    <div class="memo-wrapper">
        <div class="container">
            <h2>メモ</h2>
        </div>
        <form action="{{ url('memo_edit/'.$date) }}" method="post" class="container">
            {{ csrf_field() }}
            <div class="memo-input">
                <textarea name="memo" class="text-form">{{ $memo }}</textarea>
            </div>
            <div class="memo-input">
                <button type="submit" class="btn--yellow btn--cubic" name="submit" value="add">メモ保存</button>
                <button type="submit" class="btn--yellow btn--cubic" name="submit" value="delete">メモクリア</button>
            </div>
        </form>
    </div>
    <footer>
        <div class="footer_link">
            <button onclick="location.href='{{ url('/Calendar')}}'">カレンダーへ戻る</button>
        </div>
    </footer>
    <script>


        ////////////////////////
        //バリデーションメッセージ//
        ////////////////////////

        //メッセージ表示場所、時間の設定

        toastr.options = {

          "positionClass": "toast-top-center",
          "timeOut": "1500",
        };

        //登録、メモ入力完了メッセージ
        @if (session('flash_message'))
            $(function () {
                    toastr.success('{{ session('flash_message') }}');                
            });
        @endif
        //エラーメッセージ
        @if (count($errors) > 0)
            $(function () {
                    toastr.error('{!! (implode('<br>',$errors->all())) !!}');                
            });            

        @endif

        ////////////////////
        //動的プルダウンの設定//
        ////////////////////

        //ジャンルの値と、それに対応するカテゴリ一覧を格納しておく

        const categoryList = 
            {
                "基礎課題": ["01_はじめに", "02_HTML／CSS", "03_Git", "04_ポートフォリオ", "05_PHP", "06_JavaScript", "07_SQL"],
                "応用課題": ["01_Twitterクローン開発初級", "02_Twitterクローン開発", "03_Laravel"],
                "開発課題": ["01_チーム開発", "02_自主制作"]
            };

        const lessonList = 
            {
                "01_はじめに": ["No1", "No2"],
                "02_HTML／CSS": ["No1", "No2", "No3", "No4"],
                "03_Git": ["No1", "No2"],
                "04_ポートフォリオ": ["No1", "No2", "No3", "No4","No5"],
                "05_PHP": ["No1", "No2", "No3", "No4","No5", "No6", "No7"],
                "06_JavaScript": ["No1", "No2", "No3", "No4","No5"],
                "07_SQL": ["No1", "No2", "No3", "No4","No5", "No6"],
                "01_Twitterクローン開発初級": ["No1", "No2", "No3", "No4", "No5" ],
                "02_Twitterクローン開発": ["No1", "No2", "No3", "No4", "No5", "No6", "No7", "No8", "No9", "No10", "No11", "No12", "No13", "No14", "No15"],
                "03_Laravel": ["No1", "No2", "No3", "No4","No5"],
                "01_チーム開発": ["No1", "No2", "No3"],
                "02_自主制作": ["No1", "No2", "No3"]
            };

        //選択されたジャンルを受け取って処理をする -- [4]
        function setCategoryOptions(selectedGenre){
            const selectCategoryName = document.getElementById('category_name'); //2つめのセレクトボックスを取得し
            selectCategoryName.disabled = false; //選択可能な状態にする
            selectCategoryName.options.length = 1; //オプションをリセット

            //選択されたジャンルのメニュー一覧に対して処理をする
            categoryList[selectedGenre].forEach((value, index) => {
                const option = document.createElement('option'); //option要素を新しく作る
                option.value = value; //option要素の値に、メニューを識別できる番号を指定する
                option.innerHTML = value; //ユーザー向けの表示としてメニュー名を指定する
                selectCategoryName.appendChild(option); //セレクトボックスにoption要素を追加する
            });


            if(document.getElementById('lesson_number').options.length >1 ){ //レッスンナンバーが既に選択されているとき

                var selectedCategory = selectCategoryName.selectedIndex //表示されているカテゴリーを取得
                setLessonOptions(selectCategoryName[selectedCategory].value); //カテゴリーに合わせてレッスンナンバーのプルダウンを修正
            }
        }


        function setLessonOptions(selectedLesson){

            const selectLessonNumber = document.getElementById('lesson_number'); //3つめのセレクトボックスを取得し
            selectLessonNumber.disabled = false; //選択可能な状態にする
            selectLessonNumber.options.length = 1; //オプションをリセット
            //選択されたジャンルのメニュー一覧に対して処理をする
            lessonList[selectedLesson].forEach((value, index) => {
                const option = document.createElement('option'); //option要素を新しく作る
                option.value = value; //option要素の値に、メニューを識別できる番号を指定する
                option.innerHTML = value; //ユーザー向けの表示としてメニュー名を指定する
                selectLessonNumber.appendChild(option); //セレクトボックスにoption要素を追加する
            });
        }

        const genreSelect = document.getElementById('genre'); //ジャンルを選ぶためのセレクトボックスを指定 -- [2]
        const categorySelect = document.getElementById('category_name'); //ジャンルを選ぶためのセレクトボックスを指定 -- [2]

        //なんらかのジャンルが選択されたら（change）、処理を行う -- [3]
        genreSelect.addEventListener('change', (e) => {

            setCategoryOptions(e.target.value);  //選択されたジャンルを引数として関数に渡す

            //※e.target.valueはgenreSelectで選択された値
        })

        //なんらかのカテゴリが選択されたら（change）、処理を行う -- [3]
        categorySelect.addEventListener('change', (e) => {

            setLessonOptions(e.target.value);  //選択されたカテゴリを引数として関数に渡す
        })

        //バリデーションエラー時の対応
        if(@json(old('genre'))){
            //ジャンルが入力されていた場合
            //$(genreSelect).ready(function() {
                document.getElementById("genre").value = "{{old('genre')}}" //oldのgenreの値をセット
                setCategoryOptions("{{old('genre')}}"); //
            //});
            if(@json(old('category_name'))){ 
                //ジャンルとカテゴリ入力されていた場合
                //$(categorySelect).ready(function() {
                    document.getElementById("category_name").value = "{{old('category_name')}}"
                    setLessonOptions("{{old('category_name')}}"); 
                //});
            }
        }

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
        /*height: 300px;*/
        margin-bottom: 10px;
      }

      .plan-record-wrapper .learning-item{
        flex: auto;
        width: 50%;
        padding: 0 10px;
        height: 100%;
      }

      .plan-record-wrapper .learning_plan{
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
        /*height: 170px;*/
        margin-bottom: 10px;
      }

      .input-wrapper .item-input{
        flex: auto;
        width: 100%;
        padding: 0 10px;
        text-align: center;
      }

      .input-wrapper .item-input button{
        flex: auto;
        width: 50%;
        margin: 0px auto 10px auto;
      }

      .input-wrapper h2{
        display: block;
        padding: 0 10px;
      }

      .input-wrapper .input-form{
        display: block;
        margin-bottom: 10px;
        width: 100%;
      }

      .memo-wrapper{
        /*height: 170px*/
        margin-bottom: 10px;
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
      @media screen and (max-width: 767px){
        body{
            margin-top: 0;
        }
        .container {
            flex-wrap: wrap;
        }

        .scrollbox{
            height: 100px;               /* 横幅を200pxに指定 */
        }

        .input-wrapper .item-input{
            width: 25%;
        }

        .memo-wrapper .memo-input{
            width: 25%;
        }
      }
      
      @media screen and (max-width: 500px){
        header .container{
              /* positionプロパティをfixedに、topを0に指定してください */
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 10;
            width :100%;
            background-color: white;
        }
        .plan-record-wrapper .learning-item{
            width: 100%;
        }
            
        .input-wrapper .item-input{
            width: 100%;
        }

        .memo-wrapper .memo-input{
            width: 100%;
        }
      }
    </style>
</body>

</html>