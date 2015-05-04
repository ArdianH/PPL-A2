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
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
	<script>
	$(document).ready(function(){
		$("#pilihmateri").change(function(){
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
			var location = baseUrl + "/index.php/rapor/hasil/" + $("#idRapor").val() + "/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			var location2 = baseUrl + "/index.php/rapor/ambilTerbaru/"+ $("#idRapor").val() + "/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			$.getJSON(location, function(data, status){
				jumlahData = data.jumlahData;
				hasil = data.hasil			
				$('#number').html(data.jumlahData);
				$('#rata-rata').html(data.hasil);

			});
			$.get(location2, function(data, status){
				var obj = JSON.parse(data);
				$tanggal = [];
				$valuesY = [];
				$waktu = [];
				$waktuUpdate = [];
				for ($i = obj.length-1; $i>=0; $i--) {
					$tanggal.push(new Date(obj[$i]["tglMengerjakan"]));
					$valuesY.push(obj[$i]["jawabanBenar"]);
					$waktu.push(obj[$i]["lamaWaktu"]);
				}
				$nilaiX = [];
				$.each($tanggal, function(i) {
					$twoDigitMonth = ($tanggal[i].getMonth()+1)+"";if($twoDigitMonth.length==1)	$twoDigitMonth="0" +$twoDigitMonth;
					$twoDigitDate = ($tanggal[i].getDate()+1)+"";if($twoDigitDate.length==1)	$twoDigitDate="0" +$twoDigitDate;
					$currentDate = $twoDigitDate + "-" + $twoDigitMonth + "-" + $tanggal[i].getFullYear();
					$nilaiX.push($currentDate);
				});
				
				
				$.each($waktu, function(i) {
					$jam = Math.floor($waktu[i]/3600);
					$menit = Math.floor(($waktu[i] - ($jam*60))/60);
					$detik = $waktu[i] - $menit*60 - $jam*3600;
					$waktuGabung = $jam+" jam "+$menit+" menit "+$detik+" detik";
					$waktuUpdate.push($waktuGabung);
				});
				
				test($nilaiX, $valuesY, $waktuUpdate);
			});
		});
		
		$('#pilihmateri').change();
	});

	</script>
	
	<script type="text/javascript">
	
	function test($currentDate, $y, $waktu){
				var dataPoints = [];
				
				for (var i = 0; i<$currentDate.length; i++){
					
					dataPoints.push({ 

						x: i+1,
						y: parseInt($y[i]*10),
						z: ("Nilai : " + ($y[i]*10) + "<br>" + "Waktu : " + $waktu[i] + "<br>" + "Tanggal : " + $currentDate[i])
					});
					
				}
		var options = {
			theme: "theme2", 

			toolTip:{  
				
				content: function(e){
				var content;
				content = " <strong>"+e.entries[0].dataPoint.z + "</strong>"  ;
				return content;
				}
				
			},
					animationEnabled: true,
					animationDuration: 1500,
					
			axisX:{      

				title: "Banyaknya Latihan",
				labelFontSize: 15,
				titleFontSize: 20,
				interval: 1,
				minimum: 0,
				maximum: $currentDate.length+1, 
				titleFontFamily: "comic sans ms"
			},
			axisY: {
				  title: "Nilai",
				  titleFontFamily: "comic sans ms",
				  labelFontSize: 15,
				  titleFontSize: 20,
				  interval: 10,
				  minimum: 0,
				  maximum: 100 
			  },
			  
			data: [
			{
				color: "pink",
				type: "column", //change it to line, area, bar, pie, etc
				name: "Lama Waktu ",
				dataPoints: dataPoints
			}
			]
		};
		$("#chartContainer").CanvasJSChart(options);
	}

	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin mereset rapor? Rapor kamu akan dikembalikan ke keadaan default")) {
			window.location.href = url;
		}		
	}	
</script>


	
    <body>
	
	
<!-- Navigation Bar iMath -->
    	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="<?php echo base_url();?>index.php"><img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";></a>
	      </div>
<!-- Navbar Atas -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a></li><li>';
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> LOG IN </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>      
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		
        echo '<div class="container" id="iconbar">';
        
		echo '<div class="col-md-2"><img src="'.base_url().'assets/images/home.png" img size="height="20" width="20"><a href="'.base_url().'">&nbspBERANDA</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">&nbspRAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">&nbspTARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">&nbspPRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">&nbspPERMAINAN</a></div>';
		echo '<div class="col-md-2">';
		if($this->session->userdata('gender') =="Perempuan"){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<span class="weight"><a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a></span></div>";
		
		echo '</div>';
	}
	?>
</nav>
<!-- nav end -->

<div class="container contents">      
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/rapor.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h1 class="tBelajar"> Rapor </h1><br><br>
				<div class="right">
					  <button type="submit" class="orangeButton" onclick="return confirmDelete('<?php echo base_url() ?>index.php/rapor/hapusHistory/<?php echo $dataId[0]->idRapor ?>');">Reset</button>
				</div>
      			</div>
      		</div>
    	</div> 


	<div class="table-responsive"> 

	<?php $idRapor=$dataId[0]->idRapor;
		echo '<input type = "hidden" id="idRapor" value="'.$idRapor.'">';
	?>
	<div class="container contents">
			
		<form method="GET" action="" >	
		
		Kelas	
		<?php foreach($kelas_model as $row):?>

			<a href="<?php echo base_url() ?>index.php/rapor/view/<?php echo $row->idKelas?>"> 
			
				<?php 				
					$url = $_SERVER['REQUEST_URI'];
					$arr = explode("/",$url);
					$length = count($arr);
					$id = $arr[$length - 1];
					
					$idKelas = $row->idKelas;
					if($idKelas == $id)
					{
						echo '<button type="button" class="circleGreen buttonDelete">';
						echo substr($idKelas,4,5);
						echo '</button>';
					}
					else
					{
						echo '<button type="button" class="circle buttonDelete">';
						echo substr($idKelas,4,5);
						echo '</button>';
					}
					
				?>
			</a>

			
			
			
			
		<?php endforeach ?>
		
		
		
		<input id="pilihkelas" type="hidden" name="idKelas" value="<?php 
			$url=current_url();

			$arr = explode("/",$url);
			$length = count($arr);
			echo $arr[$length - 1];			
		?>">
	<br><br><br>
		Materi
		<select name ="idMateri" id="pilihmateri" onchange="showAlertBox()">
		<?php foreach($result as $row):?>			
		<option value="<?php echo $row->idMateri; ?>" ><?php echo $row->nama ?></option>
		<?php endforeach?>
		<option value="all" >TES</option>
		</select>
	
	<br>			
	</form>

	<h3 class="rapor containerTB">Ringkasan</h3>
	<div class="raporPink">
	<p>Total Latihan: <span id="number"></span></p>
	<p>Rata-rata Nilai: <span id="rata-rata"></span></p>
	</div>
		<div id="chartContainer" style="height: 400px; width: 80%;"></div>

	</div>

</div>
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>        
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
    </body>
</html>