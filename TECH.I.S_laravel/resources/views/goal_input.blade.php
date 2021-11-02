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
    <div class="panel-heading">
      <a href="{{ url('/Carender') }}"><u>>>カレンダー</u></a>  
    </div>
    <div class="container">
        
        <div class="item">
        <h1>目標</h1>
        @foreach ($learningplans as $learningplan)
        <div>
        <form action="{{ url('plan_delete/' .$learningplan) }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
          <p class="learning_plan">{{$learningplan}}</p>
          <button type="submit" class="btn--delete" name="submit" id = "sub1" value="plan" onClick="alert('削除しました！');">削除</button>
        </form>
        </div>
        @endforeach
        </div>
        <div class="item">
        <h1>実績</h1>
        @foreach ($learningrecords as $learningrecord)
        <div>
        <form action="{{ url('record_delete/' .$learningrecord) }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
          <p class="learning_plan">{{$learningrecord}}</p>
          <button type="submit" class="btn--delete" name="submit" id = "sub1" value="plan">削除</button>
        </form>
        </div>
        @endforeach
        </div>
        <br>
       
    </div>
    <div class="container2">
        
        <div class="item2">
            <h1>学習項目選択</h1>
        </div>
        <form action="{{ url('goal_input/1/2020-10-30') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
          <!-- 1つめのセレクトボックス。これは静的に生成されている（最初から内容が決まっている） -->
          <select name="genre" id="genre">
            <option disabled selected>課題を選択してください</option>
            <option value="基礎課題">基礎課題</option>
            <option value="応用課題">応用課題</option>
            <option value="開発課題">開発課題</option>
          </select>
          <!-- 2つめのセレクトボックス。1つめで選んだジャンルに応じて、動的に選択肢を追加する -->
          <select name="category_name" id="category_name" disabled>
            <option disabled selected>カテゴリを選択してください</option>
          </select>
          <!-- 3つめのセレクトボックス。2つめで選んだジャンルに応じて、動的に選択肢を追加する -->
          <select name="lesson_number" id="lesson_number" disabled>
            <option disabled selected>レッスンNoを選択してください</option>
          </select>
          <button type="submit" class="btn btn--yellow btn--cubic" name="submit" id = "sub1" value="plan">目標登録</button>
          <button type="submit" class="btn btn--yellow btn--cubic" name="submit" id = "sub2" value="record">実績登録</button>
        </form>
    </div>
    <div class="container3">
      <div class="item2">
        <h1>メモ</h1>
      </div>
      <form action="{{ url('memo_edit') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <input id="memo" type="text" name="memo" value="{{ $memo }}">
        <button type="submit" class="btn btn--yellow btn--cubic" id = "sub3" value="add">保存</button>
      </form>
      <form action="{{ url('memo_delete') }}" method="post">
      {{ csrf_field() }}
        <button type="submit" class="btn btn--yellow btn--cubic" id = "sub3" value="delete">削除</button>
      </form>
    </div>
    <script> 
    const params = new URLSearchParams(window.location.search);
    var date1 = document.getElementById('day').innerHTML = (params.get('date'));

    //料理ジャンルの値と、それに対応するメニュー一覧を格納しておく -- [1]
    const categoryList = 
          {
            "基礎課題": ["01_はじめに", "02_HTML/CSS", "03_Git", "04_ポートフォリオ", "05_PHP", "06_JavaScript", "07_SQL"],
            "応用課題": ["01_Twitterクローン開発初級", "02_Twitterクローン開発", "03_Laravel"],
            "開発課題": ["01_チーム開発", "02_自主制作"]
          };
    const lessonList = 
          {
            "01_はじめに": ["No1", "No2"],
            "02_HTML/CSS": ["No1", "No2", "No3", "No4"],
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
      selectCategoryName.options.length = 1; 
      
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
      selectLessonNumber.options.length = 1; 
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
      setCategoryOptions(e.target.value);  //選択された料理ジャンルを引数として関数に渡す
     //※e.target.valueはgenreSelectで選択された値
    })

    //なんらかのジャンルが選択されたら（change）、処理を行う -- [3]
    categorySelect.addEventListener('change', (e) => {
      setLessonOptions(e.target.value);  //選択された料理ジャンルを引数として関数に渡す
     //※e.target.valueはgenreSelectで選択された値
    })


    </script>
    <style>
      .learning_plan{
        display: inline;
      }
    </style>
</body>
</html>