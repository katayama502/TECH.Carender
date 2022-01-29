<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
 


<div class="toggle_btn">
      <span></span>
      <span></span>
    </div>

	
	
	<div class="graph_container">
        <a href="{{ url('/Calendar') }}" class="btn2 btn--yellow btn--cubic"　>戻る</a>
        <div class="glaf">
        <!-- 基礎課題 -->
        <canvas id="myChart_A" width="100%" height="40%" class="graph"></canvas>
        <button class="button_A btn--yellow">詳細</button>
        <div id="ChartA" class="detail">
        <canvas id="myChart_A_1" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_2" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_3" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_4" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_5" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_6" width="100%" height="40%"></canvas>
        <canvas id="myChart_A_7" width="100%" height="40%"></canvas>
        </div>
        
        <!-- 応用課題 -->
        <canvas id="myChart_B" width="100%" height="40%"></canvas>
        <button class="button_B btn--yellow">詳細</button>
        <div id="ChartB" class="detail">
        <canvas id="myChart_B_1" width="100%" height="40%"></canvas>
        <canvas id="myChart_B_2" width="100%" height="40%"></canvas>
        <canvas id="myChart_B_3" width="100%" height="40%"></canvas>
        </div>
        
        <!-- 開発課題 -->
        <canvas id="myChart_C" width="100%" height="40%"></canvas>
        <button class="button_C btn--yellow">詳細</button>
        <div id="ChartC" class="detail">
        <canvas id="myChart_C_1" width="100%" height="40%"></canvas>
        <canvas id="myChart_C_2" width="100%" height="40%"></canvas>
        </div>
    </div>


</div>
<?php
use App\Models\learning_record;

$count_A=0;
$count_A_1=0;
$count_A_2=0;
$count_A_3=0;
$count_A_4=0;
$count_A_5=0;
$count_A_6=0;
$count_A_7=0;
$count_B=0;
$count_B_1=0;
$count_B_2=0;
$count_B_3=0;
$count_C=0;
$count_C_1=0;
$count_C_2=0;


$user_records = learning_record::where('user_id',$user_id) -> first();
// 基礎課題
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

$id_pass_A = [
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
$id_pass_A_1= [
	$id_pass_1,	
	$id_pass_2
];
$id_pass_A_2= [
	$id_pass_3,
	$id_pass_4,
	$id_pass_5,
	$id_pass_6
];
$id_pass_A_3= [
	$id_pass_7,
	$id_pass_8
];
$id_pass_A_4= [
	$id_pass_9,
	$id_pass_10,
	$id_pass_11,
	$id_pass_12,
	$id_pass_13
];
$id_pass_A_5= [
	$id_pass_14,
	$id_pass_15,
	$id_pass_16,
	$id_pass_17,
	$id_pass_18,
	$id_pass_19,
	$id_pass_20
];
$id_pass_A_6= [
	$id_pass_21,
	$id_pass_22,
	$id_pass_23,
	$id_pass_24,
	$id_pass_25
];
$id_pass_A_7= [
	$id_pass_26,
	$id_pass_27,
	$id_pass_28,
	$id_pass_29,
	$id_pass_30,
	$id_pass_31
];
foreach($id_pass_A as $value){
	if(!empty($value)){
		$count_A=$count_A+1;
	}
}
$count_A = 3*$count_A;
if($count_A>90){
	$count_A=100;
}

foreach($id_pass_A_1 as $value_A_1){
	if(!empty($value_A_1)){
		$count_A_1=$count_A_1+1;
	}
}
$count_A_1 = 50*$count_A_1;


foreach($id_pass_A_2 as $value_A_2){
	if(!empty($value_A_2)){
		$count_A_2=$count_A_2+1;
	}
}
$count_A_2 = 25*$count_A_2;


foreach($id_pass_A_3 as $value_A_3){
	if(!empty($value_A_3)){
		$count_A_3=$count_A_3+1;
	}
}
$count_A_3 = 50*$count_A_3;


foreach($id_pass_A_4 as $value_A_4){
	if(!empty($value_A_4)){
		$count_A_4=$count_A_4+1;
	}
}
$count_A_4 = 20*$count_A_4;


foreach($id_pass_A_5 as $value_A_5){
	if(!empty($value_A_5)){
		$count_A_5=$count_A_5+1;
	}
}
$count_A_5 = 14*$count_A_5;
if($count_A_5>90){
	$count_A_5=100;
}

foreach($id_pass_A_6 as $value_A_6){
	if(!empty($value_A_6)){
		$count_A_6=$count_A_6+1;
	}
}
$count_A_6 = 20*$count_A_6;

foreach($id_pass_A_7 as $value_A_7){
	if(!empty($value_A_7)){
		$count_A_7=$count_A_7+1;
	}
}
$count_A_7 = 16*$count_A_7;
if($count_A_7>90){
	$count_A_7=100;
}
// 応用課題
$id_passB_1=$user_records->B_1_1;	
$id_passB_2=$user_records->B_1_2;
$id_passB_3=$user_records->B_1_3;
$id_passB_4=$user_records->B_1_4;
$id_passB_5=$user_records->B_1_5;
$id_passB_6=$user_records->B_2_1;
$id_passB_7=$user_records->B_2_2;
$id_passB_8=$user_records->B_2_3;
$id_passB_9=$user_records->B_2_4;
$id_passB_10=$user_records->B_2_5;
$id_passB_11=$user_records->B_2_6;
$id_passB_12=$user_records->B_2_7;
$id_passB_13=$user_records->B_2_8;
$id_passB_14=$user_records->B_2_9;
$id_passB_15=$user_records->B_2_10;
$id_passB_16=$user_records->B_2_11;
$id_passB_17=$user_records->B_2_12;
$id_passB_18=$user_records->B_2_13;
$id_passB_19=$user_records->B_2_14;
$id_passB_20=$user_records->B_2_15;
$id_passB_21=$user_records->B_3_1;
$id_passB_22=$user_records->B_3_2;
$id_passB_23=$user_records->B_3_3;
$id_passB_24=$user_records->B_3_4;
$id_passB_25=$user_records->B_3_5;


$id_pass_B = [
	$id_passB_1,	
	$id_passB_2,
	$id_passB_3,
	$id_passB_4,
	$id_passB_5,
	$id_passB_6,
	$id_passB_7,
	$id_passB_8,
	$id_passB_9,
	$id_passB_10,
	$id_passB_11,
	$id_passB_12,
	$id_passB_13,
	$id_passB_14,
	$id_passB_15,
	$id_passB_16,
	$id_passB_17,
	$id_passB_18,
	$id_passB_19,
	$id_passB_20,
	$id_passB_21,
	$id_passB_22,
	$id_passB_23,
	$id_passB_24,
	$id_passB_25
];

$id_pass_B_1 = [
	$id_passB_1,	
	$id_passB_2,
	$id_passB_3,
	$id_passB_4,
	$id_passB_5
];

$id_pass_B_2 = [
	$id_passB_6,
	$id_passB_7,
	$id_passB_8,
	$id_passB_9,
	$id_passB_10,
	$id_passB_11,
	$id_passB_12,
	$id_passB_13,
	$id_passB_14,
	$id_passB_15,
	$id_passB_16,
	$id_passB_17,
	$id_passB_18,
	$id_passB_19,
	$id_passB_20
];

$id_pass_B_3 = [
	$id_passB_21,
	$id_passB_22,
	$id_passB_23,
	$id_passB_24,
	$id_passB_25
];
foreach($id_pass_B as $value_B){
	if(!empty($value_B)){
		$count_B=$count_B+1;
	}
}
$count_B = 4*$count_B;

foreach($id_pass_B_1 as $value_B_1){
	if(!empty($value_B_1)){
		$count_B_1=$count_B_1+1;
	}
}
$count_B_1 = 20*$count_B_1;

foreach($id_pass_B_2 as $value_B_2){
	if(!empty($value_B_2)){
		$count_B_2=$count_B_2+1;
	}
}
$count_B_2 = 7*$count_B_2;
if($count_B_2>100){
	$count_B_2=100;
}
foreach($id_pass_B_3 as $value_B_3){
	if(!empty($value_B_3)){
		$count_B_3=$count_B_3+1;
	}
}
$count_B_3 = 20*$count_B_3;


// 開発課題
$id_passC_1=$user_records->C_1_1;	
$id_passC_2=$user_records->C_1_2;
$id_passC_3=$user_records->C_1_3;
$id_passC_4=$user_records->C_2_1;
$id_passC_5=$user_records->C_2_2;
$id_passC_6=$user_records->C_2_3;



$id_pass_C = [
	$id_passC_1,	
	$id_passC_2,
	$id_passC_3,
	$id_passC_4,
	$id_passC_5,
	$id_passC_6
];

$id_pass_C_1 = [
	$id_passC_1,	
	$id_passC_2,
	$id_passC_3
];

$id_pass_C_2 = [
	$id_passC_4,
	$id_passC_5,
	$id_passC_6
];

foreach($id_pass_C as $value_C){
	if(!empty($value_C)){
		$count_C=$count_C+1;
	}
}
$count_C = 17*$count_C;
if($count_C>100){
	$count_C=100;
}

foreach($id_pass_C_1 as $value_C_1){
	if(!empty($value_C_1)){
		$count_C_1=$count_C_1+1;
	}

}
$count_C_1 = 33*$count_C_1;
if($count_C_1>90){
	$count_C_1=100;
}

foreach($id_pass_C_2 as $value_C_2){
	if(!empty($value_C_2)){
		$count_C_2=$count_C_2+1;
	}
}
$count_C_2 = 33*$count_C_2;
if($count_C_2>90){
	$count_C_2=100;
}

?>
<!-- 基礎 -->


<script>
	
    var lastInnerWidth = document.documentElement.clientWidth; //window.innerWidthで現在の画面幅を取得

            // 横幅が変わったとき実行される関数
            window.addEventListener("resize", function () {
                // 現在と前回の横幅が違う場合だけ実行
                if (lastInnerWidth != document.documentElement.clientWidth) {
                    // 横幅を記録しておく
                    lastInnerWidth = document.documentElement.clientWidth;
                    if (lastInnerWidth <= 480) { // 画面幅480px以下の場合
                        Chart.defaults.global.defaultFontSize = 15; 
                    } else { // 画面幅481px以上の場合
                        Chart.defaults.global.defaultFontSize = 20;
                    }
                }
            });
	var ctx = document.getElementById('myChart_A').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			
			labels: ['基礎課題'],
			
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A ?>],
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
								stepSize: 10 ,
								fontSize: 20 
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}

	});
</script>


<script>
	var ctx = document.getElementById('myChart_A_1').getContext('2d');

	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-1'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_1 ?>],
				backgroundColor: 'rgb(0, 0, 255)',
				borderColor: 'rgb(0, 0, 255)',

			}]
		},
		options: {
			
			scales: {
        		xAxes: [          
            			{
							ticks: {          
								min: 0,      
								max: 100,     
								stepSize: 10 ,
								fontSize: 20 
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_2').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-2'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_2 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_3').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-3'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_3 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_4').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-4'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_4 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_5').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-5'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_5 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_6').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-6'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_6 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_A_7').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['基礎課題-Lesson-7'],
			datasets: [{
				label: '基礎課題進捗状況',
				data: [<?php echo $count_A_7 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<!-- 応用 -->
<script>
	var ctx = document.getElementById('myChart_B').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['応用課題'],
			datasets: [{
				label: '応用課題進捗状況',
				data: [<?php echo $count_B ?>],
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
								stepSize: 10 ,
								fontSize: 20 
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_B_1').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['応用課題-Lesson-1'],
			datasets: [{
				label: '応用課題進捗状況',
				data: [<?php echo $count_B_1 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_B_2').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['応用課題-Lesson-2'],
			datasets: [{
				label: '応用課題進捗状況',
				data: [<?php echo $count_B_2 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_B_3').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['応用課題-Lesson-3'],
			datasets: [{
				label: '応用課題進捗状況',
				data: [<?php echo $count_B_3 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<!-- 開発 -->
<script>
	var ctx = document.getElementById('myChart_C').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['開発課題'],
			datasets: [{
				label: '開発課題進捗状況',
				data: [<?php echo $count_C ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_C_1').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['開発課題-Lesson-1'],
			datasets: [{
				label: '開発課題進捗状況',
				data: [<?php echo $count_C_1 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>

<script>
	var ctx = document.getElementById('myChart_C_2').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ['開発課題-Lesson-2'],
			datasets: [{
				label: '開発課題進捗状況',
				data: [<?php echo $count_C_2 ?>],
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
								stepSize: 10 ,
								fontSize: 20  
							},
							scaleLabel: {
      							display: true,
        						labelString: '比率(％)'
      						}
    					}
					]
    			}
    		}
	});
</script>


<script>
$('.button_A').on('click', function() {
      if ($('#ChartA').hasClass('open')) {
        $('#ChartA').removeClass('open');
		$('#ChartA').addClass('detail');
      } else {
        $('#ChartA').addClass('open');
		$('#ChartA').removeClass('detail');
		if ($('#ChartB').hasClass('open')) {
        $('#ChartB').removeClass('open');
		$('#ChartB').addClass('detail');
        }  
	    if($('#ChartC').hasClass('open')) {
        $('#ChartC').removeClass('open');
		$('#ChartC').addClass('detail');
        }
      }
    });
</script>

<script>
$('.button_B').on('click', function() {
      if ($('#ChartB').hasClass('open')) {
        $('#ChartB').removeClass('open');
		$('#ChartB').addClass('detail');
      } else {
        $('#ChartB').addClass('open');
		$('#ChartB').removeClass('detail');
		if ($('#ChartA').hasClass('open')) {
        $('#ChartA').removeClass('open');
		$('#ChartA').addClass('detail');
      }
	  if ($('#ChartC').hasClass('open')) {
        $('#ChartC').removeClass('open');
		$('#ChartC').addClass('detail');
      }
      }
    });
</script>

<script>
$('.button_C').on('click', function() {
      if ($('#ChartC').hasClass('open')) {
        $('#ChartC').removeClass('open');
		$('#ChartC').addClass('detail');
      } else {
        $('#ChartC').addClass('open');
		$('#ChartC').removeClass('detail');
		if ($('#ChartB').hasClass('open')) {
        $('#ChartB').removeClass('open');
		$('#ChartB').addClass('detail');
      }
	  if ($('#ChartA').hasClass('open')) {
        $('#ChartA').removeClass('open');
		$('#ChartA').addClass('detail');
      }
      }
    });
</script>

<style>
   
</style>


