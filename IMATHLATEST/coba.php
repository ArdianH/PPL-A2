<html>
    <head>
	<script type="text/javascript" src="../../../assets/script/jquery.min.js"></script>
	<script type="text/javascript" src="../../../assets/script/jquery.canvasjs.min.js"></script>
	<style>
		.canvasjs-chart-credit{
			display:none;
		}
	</style>
	<title>Rapor</title>
	
	
	<script>
	$(document).ready(function(){
		$("#pilihmateri").change(function(){
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
			var location = baseUrl + "/index.php/rapor/ambilTerbaru/1/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			$.get(location, function(data, status){
				var obj = JSON.parse(data);
				
				//$x1 = new Date(obj[0]["tglMengerjakan"]); $y1 = obj[0]["jawabanBenar"];
				//$x2 = new Date(obj[1]["tglMengerjakan"]); $y2 = obj[1]["jawabanBenar"];
				//$x3 = new Date(obj[2]["tglMengerjakan"]); $y3 = obj[2]["jawabanBenar"];
				//alert($x1);
				$valuesX = [];
				$valuesY = [];
				$.each(obj, function(i) {
					$valuesX.push(new Date(obj[i]["tglMengerjakan"]));
					$valuesY.push(obj[i]["jawabanBenar"]);
				});
				//alert($valuesY);
				//var fullDate = new Date();
				$nilaiX = [];
				$.each($valuesX, function(i) {
					$twoDigitMonth = ($valuesX[i].getMonth()+1)+"";if($twoDigitMonth.length==1)	$twoDigitMonth="0" +$twoDigitMonth;
					$twoDigitDate = ($valuesX[i].getDate()+1)+"";if($twoDigitDate.length==1)	$twoDigitDate="0" +$twoDigitDate;
					$currentDate = $valuesX[i].getFullYear()+ "-" + $twoDigitMonth + "-" + $twoDigitDate;
					$nilaiX.push($currentDate);
					//alert ($nilaiX[i]);
				});
				//$twoDigitMonth = ($x1.getMonth()+1)+"";if($twoDigitMonth.length==1)	$twoDigitMonth="0" +$twoDigitMonth;
				//$twoDigitDate = ($x1.getDate()+1)+"";if($twoDigitDate.length==1)	$twoDigitDate="0" +$twoDigitDate;
				//$currentDate = $x1.getFullYear()+ "-" + $twoDigitMonth + "-" + $twoDigitDate;
				$('#chart').html($nilaiX);
				test($nilaiX, $valuesY);
			});
		});
		
		

		
		$('#pilihmateri').change();
	});
	//http://www.smashingmagazine.com/2011/09/23/create-an-animated-bar-graph-with-html-css-and-jquery/

	</script>
	<script type="text/javascript">
	
	function test($currentDate, $y){
				//alert($currentDate + " " + $y1);
				//alert($currentDate[0] + " " + $y[0]);
				var dataPoints = [];
				for (var x = 0; x<$currentDate.length; x++){
					var parts = $currentDate[x].split("-");
					dataPoints.push({ 
						x: new Date(parts[0], parts[1], parts[2]),
						y: parseInt($y[x])
					});
				}
		var options = {
			title: {
				text: "GRAFIK RAPOR"
			},
					//animationEnabled: true,
			axisX:{      
				valueFormatString: "YYYY-MM-DD" ,
				//labelAngle: -50
			},
				axisY: {
				  //valueFormatString: "#,###"
			  },
			data: [
			{
				type: "column", //change it to line, area, bar, pie, etc
				dataPoints: dataPoints
				/*[
					{ x: new Date(), y: 1 }
					//{ x: new Date(parts[0], parts[1]-1, parts[2]), y: parseInt($y1) }
				]*/
			}
			]
		};
		$("#chartContainer").CanvasJSChart(options);
	}	
</script>
    </head>
    <body>
	    <h1>RAPOR</h1> 		
		<form method="GET" action="" >
		<?php foreach($kelas_model as $row):?>			
		<a href="<?php echo base_url() ?>index.php/rapor/view/<?php echo $row->idKelas?>"> <?php echo $row->idKelas ?></a>		
		<?php endforeach?>
		<input id="pilihkelas" type="hidden" name="idKelas" value="<?php 
			$url=current_url();

			$arr = explode("/",$url);
			$length = count($arr);
			echo $arr[$length - 1];			
		?>">
	<br>
		<select name ="idMateri" id="pilihmateri" onchange="showAlertBox()">
		<?php foreach($result as $row):?>			
		<option value="<?php echo $row->idMateri; ?>" ><?php echo $row->nama ?></option>
		<?php endforeach?>
		</select>
	
	<br>			
	</form>
	<a href="<?php echo base_url()."index.php/rapor/ambilTerbaru/1/SD001/1"?>">trigger</a>
	<h1>Ringkasan</h1>
	<p>chart: <span id="chart"></span></p>
	
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </body>
</html>