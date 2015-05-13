<html>
    <head> 
	<!--<script type="text/javascript" src="../../../assets/script/jquery.min.js"></script>  -->
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> <!---->
	<script type="text/javascript" src="<?php echo base_url();?>assets/script/jquery.canvasjs.min.js"></script>
	<style>
		.canvasjs-chart-credit{
			display:none;
		}
	</style>
	<title>Kunjungan Anggota</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>	
	
	<script>
	//jQuery(document).ready(function(){
	$(document).ready(function(){
	       function process(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/admin/kunjungan/getTenVisits/"+ idKelas;

			$.get(location, function(data, status){				
				var obj = JSON.parse(data);
				$tanggal = [];
				$valuesY = [];
				for ($i = obj.length-1; $i>=0; $i--) {
					$tanggal.push(new Date(obj[$i]["tanggal"]));
					$valuesY.push(obj[$i]["jumlah"]);					
				}
				$nilaiX = [];
				$.each($tanggal, function(i) {
					$twoDigitMonth = ($tanggal[i].getMonth()+1)+"";if($twoDigitMonth.length==1)	$twoDigitMonth="0" +$twoDigitMonth;
					$twoDigitDate = ($tanggal[i].getDate())+"";if($twoDigitDate.length==1)	$twoDigitDate="0" +$twoDigitDate;
					$currentDate = $twoDigitDate + "-" + $twoDigitMonth + "-" + $tanggal[i].getFullYear();
					$nilaiX.push($currentDate);
				});
				test($nilaiX, $valuesY);				
			});
			
	       }
		   
		//$("#pilihkelas").change(function() {	
		//	process($("#pilihkelas").val());
	       //});
	     //  $('#pilihkelas').change();
	     process('<?php echo $idKelas?>');
	     });
	</script>
	<script type="text/javascript">	
	function test($currentDate, $y){
				var dataPoints = [];
				var total = 0
				for (var i = 0; i<$currentDate.length; i++){
					//total+=parseInt($y[i])
					dataPoints.push({ 

						x: i+1,
						y: parseInt($y[i]),
						
						z: ("Jumlah Pengunjung : " + ($y[i]) + "<br>" + "Tanggal : " + $currentDate[i])
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

				title: "Kunjungan",
				labelFontSize: 15,
				titleFontSize: 20,
				interval: 1,
				minimum: 0,
				maximum: $currentDate.length+1, 
				titleFontFamily: "comic sans ms"
			},
			axisY: {
				  title: "Jumlah Pengunjung",
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
				dataPoints: dataPoints
			}
			]			
		};		
		$("#chartContainer").CanvasJSChart(options);
	}
	</script>

	
    <body>

<!--========================== ADMIN NAVBAR ============================-->
    	<nav class="navbar navbar-default navbar-static-top">
		<div class="container" id="navbar">
			<div class="navbar-header" id="logobar">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>index.php">
					<img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";>
				</a>
			</div>
		<!-- Navbar Atas -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url()?>admin/dashboard"> DASHBOARD </a></li>
				<li><a href="<?php echo base_url()?>"> BERANDA iMATH </a></li>
				<li><a href="<?php echo base_url()?>'autentikasi/logout"> LOG OUT </a></li>	
			</ul>
		</div>	<!--/.nav-collapse -->
	</div>      	
	
	<div class="container" id="iconbar">
        
		<ul class="navbar-nav navbar-left">
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_kelas">KELAS</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_materi">MATERI</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_latihan">SOAL LATIHAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_tes">SOAL TES</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/anggota">DATA ANGGOTA</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/pesan">PESAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/lain_lain">LAIN-LAIN</a></li>
		</ul>
	</div>
	
</nav>
 <!--======================= END OF ADMIN NAVBAR ============================-->
 
<div class="container contents">      	
 		
		<div class="ungu fontt">
			<div class="row">
				<div class="col-md-3">Kelas <?php echo $idKelas?></div>
				<div class="col-md-9">					
					<!--<select class="noBorder tb" id = "pilihkelas" name ="idkelas">
					<option value="<?php echo $idKelas?>" selected><?php echo $idKelas?></option>
					</select>-->					
				</div>
			</div>			

		</div>	
	
		<div id="chartContainer" style="height: 400px; width: 80%;"></div>
	
	
</div>
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>BANTUAN</p></a></div>        
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
    </body>
</html>

