
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

 
<div class="chart-container" style="position: relative; width: 800; height: 30;">
<div class="toggle_btn">
      <span></span>
      <span></span>
    </div>
	<canvas id="myChart" ></canvas>
	<canvas id="myChart2" ></canvas>
</div>
<div class="main_botan" style = 'width: 50%';>
<div class="item">
        <a href="{{ url('Not_Calendar') }}" class="btn btn--yellow btn--cubic">戻る</a>
</div>

</div>
<?php
use App\Models\learning_record;
$count=0;
$id_pass_ = 0;
$user_records = learning_record::where('user_id',$user_id) -> first();

$id_pass_1=$user_records->A_1_1;	
$id_pass_2=$user_records->A_1_2;
$id_pass_3=$user_records->A_2_1;
$id_pass_4=$user_records->A_2_2;
$id_pass_5=$user_records->A_2_3;
$id_pass_6=$user_records->A_2_4;
$id_pass_7=$user_records->A_3_1;
$id_pass_8=$user_records->A_3_2;
$id_pass_9=$user_records->A_4_1;
$id_pass_10=$user_records->A_4_2;
$id_pass_11=$user_records->A_4_3;
$id_pass_12=$user_records->A_4_4;
$id_pass_13=$user_records->A_4_5;
$id_pass_14=$user_records->A_5_1;
$id_pass_15=$user_records->A_5_2;
$id_pass_16=$user_records->A_5_3;
$id_pass_17=$user_records->A_5_4;
$id_pass_18=$user_records->A_5_5;
$id_pass_19=$user_records->A_5_6;
$id_pass_20=$user_records->A_5_7;
$id_pass_21=$user_records->A_6_1;
$id_pass_22=$user_records->A_6_2;
$id_pass_23=$user_records->A_6_3;
$id_pass_24=$user_records->A_6_4;
$id_pass_25=$user_records->A_6_5;
$id_pass_26=$user_records->A_7_1;
$id_pass_27=$user_records->A_7_2;
$id_pass_28=$user_records->A_7_3;
$id_pass_29=$user_records->A_7_4;
$id_pass_30=$user_records->A_7_5;
$id_pass_31=$user_records->A_7_6;
$id_pass_M = [
	$id_pass_1,	
	$id_pass_2,
	$id_pass_3,
	$id_pass_4,
	$id_pass_5,
	$id_pass_6,
	$id_pass_7,
	$id_pass_8,
	$id_pass_9,
	$id_pass_10,
	$id_pass_11,
	$id_pass_12,
	$id_pass_13,
	$id_pass_14,
	$id_pass_15,
	$id_pass_16,
	$id_pass_17,
	$id_pass_18,
	$id_pass_19,
	$id_pass_20,
	$id_pass_21,
	$id_pass_22,
	$id_pass_23,
	$id_pass_24,
	$id_pass_25,
	$id_pass_26,
	$id_pass_27,
	$id_pass_28,
	$id_pass_29,
	$id_pass_30,
	$id_pass_31
];
foreach($id_pass_M as $value){
	if(!empty($value)){
		$count=$count+1;
	}
}

?>
<script>
　　　

	
	var ctx = document.getElementById('myChart').getContext('2d');
    
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題'],
			datasets: [{
				label: 'カリキュラム進捗確認グラフ',
				data: [<?php echo $count ?>],
				backgroundColor: 'rgb(0, 0, 255)',
				borderColor: 'rgb(0, 0, 255)'
			}]
		},
		options: {
			scales: {
        		xAxes: [          
            			{
							ticks: {          
								min: 0,      
								max: 100,     
								stepSize: 10 
							}
    					}
					]
    			}
    		}
	});
    
	
</script>

<script>
　　　

	
	var ctx = document.getElementById('myChart2').getContext('2d');
    
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題'],
			datasets: [{
				label: 'カリキュラム進捗確認グラフ',
				data: [<?php echo $count ?>],
				backgroundColor: 'rgb(0, 0, 255)',
				borderColor: 'rgb(0, 0, 255)'
			}]
		},
		options: {
			scales: {
        		xAxes: [          
            			{
							ticks: {          
								min: 0,      
								max: 100,     
								stepSize: 10 
							}
    					}
					]
    			}
    		}
	});
    
	
</script>

