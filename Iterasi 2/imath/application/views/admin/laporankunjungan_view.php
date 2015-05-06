<html>
    <head>
	<title>KUNJUNGAN</title>
   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus materi ini?")) {
			window.location.href = url;
		}		
	}
	</script>
	
	<script>
	$(document).ready(function(){
		//$("#pilihmateri").change(function(){
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
			//var location = baseUrl + "/index.php/rapor/hasil/" + $("#idRapor").val() + "/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			var location2 = baseUrl + "/index.php/admin/daftar_kunjungan/ambilTerbaru/"+ $("#id").val();
			//$.getJSON(location, function(data, status){
				//jumlahData = data.jumlahData;
				//hasil = data.hasil			
				//$('#number').html(data.jumlahData);
				//$('#rata-rata').html(data.hasil);

			//});
			$.get(location2, function(data, status){
				var obj = JSON.parse(data);
				$tanggal = [];
				$valuesY = [];
				//$waktu = [];
				//$waktuUpdate = [];
				for ($i = obj.length-1; $i>=0; $i--) {
					$tanggal.push(new Date(obj[$i]["tglMengerjakan"]));
					$valuesY.push(obj[$i]["jawabanBenar"]);
					//$waktu.push(obj[$i]["lamaWaktu"]);
				}
				$nilaiX = [];
				$.each($tanggal, function(i) {
					$twoDigitMonth = ($tanggal[i].getMonth()+1)+"";if($twoDigitMonth.length==1)	$twoDigitMonth="0" +$twoDigitMonth;
					$twoDigitDate = ($tanggal[i].getDate()+1)+"";if($twoDigitDate.length==1)	$twoDigitDate="0" +$twoDigitDate;
					$currentDate = $twoDigitDate + "-" + $twoDigitMonth + "-" + $tanggal[i].getFullYear();
					$nilaiX.push($currentDate);
				});
				
				
				//$.each($waktu, function(i) {
					//$jam = Math.floor($waktu[i]/3600);
					//$menit = Math.floor(($waktu[i] - ($jam*60))/60);
					//$detik = $waktu[i] - $menit*60 - $jam*3600;
					//$waktuGabung = $jam+" jam "+$menit+" menit "+$detik+" detik";
					//$waktuUpdate.push($waktuGabung);
				//});
				
				test($nilaiX, $valuesY);
			});
		//});
		
		//$('#pilihmateri').change();
	});

	</script>
	
	<script type="text/javascript">
	
	function test($currentDate, $y){
				var dataPoints = [];
				
				for (var i = 0; i<$currentDate.length; i++){
					
					dataPoints.push({ 

						x: i+1,
						y: parseInt($y[i]*10),
						z: ("Nilai : " + ($y[i]*10) + "<br>" + "Tanggal : " + $currentDate[i])
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
</script>
	
    </head>
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
          <ul class="nav navbar-nav navbar-right"><li><a href="<?php echo base_url();?>index.php/profil">PROFIL ADMIN</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>index.php/home">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>index.php/autentikasi/logout">LOG OUT</a></li>
          </ul>
        </div>
      </div>
      <!-- Navbar khusus admin -->
      <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
   <!--  nav collapse -->
   
    <div class="container contents">
    	<div class="titleText">
    	<h1> Laporan Kunjungan Anggota </h1>
    </div>

		<div class="table-responsive">
	    	<table class="table table-hover table-striped tableimath">
		        <thead>
		    	 	<tr>
						<?php foreach($result as $row):?>
			            <th class="col-md-2">Jumlah Pengunjung Kelas <?php $idKelas = $row->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2);?></th>
						</tr><?php endforeach; ?>
		        	</tr>
		        </thead>
		        <tbody>
			
				<?php foreach($result as $row):?>
				<tr>	
				<td class="col-md-2">
					<?php echo $row->jumlah ?> orang
				</td>

				</tr><?php endforeach; ?>	   
			</table>
		</div>
		</div>
		
	<div class="container contents">
			<!--<button type="submit" onclick="return confirmDelete('<?php echo base_url() ?>index.php/rapor/hapusHistory/');">Reset</button>-->
	<h3 class="rapor containerTB">Ringkasan</h3>
	<div class="raporPink">

	</div>
		<div id="chartContainer" style="height: 400px; width: 80%;"></div>

	</div>		
		
		<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>HUBUNGI KAMI</p></a></div>
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