<html>
    <head>        
	<title>Buat Target Belajar</title>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	jQuery(document).ready(function(){
	       function fetchMateri(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/target_belajar/materi/" + idKelas;
			//~ alert("Hi" + location);
			//var linkJSON = $(location).attr('href',toController);
			$.getJSON(location, function(arrayMateri) {
				var content = '';
				arrayMateri.forEach(function (materi) {
					content += '<option value="' + materi.idMateri + '">' + materi.nama + '</option>';
				});
				$('#pilihmateri').html(content);
			});
	       }
		$("#pilihkelas").change(function() {	
			fetchMateri($("#pilihkelas").val());
	       });
	       $('#pilihkelas').change();
	     });
	</script>	
	<script>
		function showTargetWaktu()
		{			
			document.getElementById("waktu").innerHTML = '<input name="menit" type="number" min="0" max="60"> menit <input name="detik" type="number" min="0" max="59"> detik';
		}
		
		function hideTargetWaktu()
		{						
			document.getElementById("waktu").innerHTML = '<input name="menit" type="hidden" value="0"> <input name="detik" type="hidden" value="0">';
		}
	</script>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
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
		echo '<div class="row">';
        echo '<div class="container" id="iconbar">';
        echo '<div class="row">';
        echo '<div class="col-md-2"></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">RAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">TARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">PRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">PERMAINAN</a></div>';
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
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<div class="container contents">      
	<div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/clock.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard">Buat Target Belajar Baru</h2><br><br>				
      			</div>
      		</div>
    	</div> 
 	
	<form method="POST" action="create"> 
		<div class="ungu fontt">
			<div class="row">
				<div class="col-md-3">Kelas </div>
				<div class="col-md-9">
					<select id = "pilihkelas" name ="idkelas">
					<?php foreach($kelas as $row):?>			
					<option value="<?php echo $row->idKelas?>"><?php echo $row->idKelas ?> </option>
					<?php endforeach?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Materi</div>
				<div class="col-md-9">
					<select id="pilihmateri" name ="idmateri">
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Banyak Soal</div>
				<div class="col-md-9">
					<input required type="number" name ="banyaksoal" min="1" max="100"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Nilai </div>
				<div class="col-md-9">
					<select id = "pilihkelas" name ="targetnilai">
					<option value="100">100</option>
					<option value="90">90</option>
					<option value="80">80</option>		
					<option value="70">70</option>						
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Target Waktu </div>
				<div class="col-md-9">
					<input type="radio" name="targetWaktu" value="ya" onclick="showTargetWaktu()">Ya<br>
					<input type="radio" name="targetWaktu" value="tidak" onclick="hideTargetWaktu()">Tidak					
					<div id="waktu">
					</div>
				</div>
			</div>

		</div>
		<button class="blueButton" type="submit">Submit</button>
	</form>
	
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

