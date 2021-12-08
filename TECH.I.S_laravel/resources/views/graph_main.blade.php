
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

 
<div class="chart-container" style="position: relative; width: 50%; height: 300px;">
<div class="toggle_btn">
      <span></span>
      <span></span>
    </div>
	<canvas id="myChart" ></canvas>
</div>
<div class="main_botan" style = 'width: 30%';>
<div class="item"　>
        <a href="{{ url('graph_basics') }}" class="btn btn--yellow btn--cubic">基礎課題詳細</a>
</div>
<div class="item">
        <a href="{{ url('graph_application') }}" class="btn btn--yellow btn--cubic">応用課題詳細</a>
</div>
<div class="item">
        <a href="{{ url('graph_development') }}" class="btn btn--yellow btn--cubic">開発課題詳細</a>
</div>
<div class="item">
        <a href="{{ url('Not_Calendar') }}" class="btn btn--yellow btn--cubic">戻る</a>
</div>

</div>
<?php
use App\Models\learning_record;
$count=0;
$user_records = learning_record::where('user_id',$user_id) -> first();
$id_pass_1=$user_records->A_1_1;	
$id_pass_2=$user_records->A_1_2;
if(!empty($id_pass_1)){
	$count=$count+1;
}
if(!empty($id_pass_2)){
	$count=$count+1;
}

?>
<script>
　　　


	var ctx = document.getElementById('myChart').getContext('2d');
    
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題', '応用課題', '開発課題'],
			datasets: [{
				label: 'カリキュラム進捗確認グラフ',
				data: [<?php echo $count ?>],
				backgroundColor: 'rgb(0, 0, 255)',
				borderColor: 'rgb(0, 0, 255)'
			}]
		},
		options: {
			maintainAspectRatio: false,
			
		}
	});
    
	
</script>


