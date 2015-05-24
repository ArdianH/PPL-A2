<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Detil Latihan - iMath </title>
	<script>
		function clearLocal(){
			window.localStorage.clear();
		}
	</script>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">

</head>
	
    <body>
<!-- =========================  Navigation Bar iMath =========================== -->
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
						echo '<a href="'.base_url().'admin/dashboard"> DASHBOARD ADMIN </a></li><li>';
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
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'permainan">&nbspPERMAINAN</a></div>';
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
<!-- =========================  END Navigation Bar iMath =========================== -->
<div class="container contents">
				<?php 
				if($skor == 100){
			echo '<div class="row">';
			echo '<div class="container">';		
			echo '<div class="col-md-3">';
			echo '<img src="'.base_url().'assets/images/medali.png" img size="height="200px" width="200px">';
			echo '</div>';
			echo '<div class="col-md-9">';
			echo '<div class="resultbox">';
			echo "Selamat, kamu telah menyelesaikan latihan materi<br/>".$namaMateri." !";
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
				
				}else{
			echo '<div class="row">';
			echo '<div class="container">';					
			echo '<div class="col-md-12">';
			echo '<div class="resultbox">';
			echo "Selamat, kamu telah menyelesaikan latihan materi<br/>".$namaMateri."!";
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';	
				
				}
			?>	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default paneliMath panelResult">
					<div class="panel-heading merah">
						SOAL
					</div>
				<div class="panel-body abu">
					<?php echo $skor/10; ?> Benar <?php echo 10-($skor/10); ?> Salah					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default paneliMath panelResult">
				<div class="panel-heading hijau"><form name="cd">WAKTU </div>
				<div class="panel-body abu">
					<?php 
						if(floor($waktuTes/60) > 0)
							echo floor($waktuTes/60)." menit ";
						if (($waktuTes%60) > 0)
							echo ($waktuTes%60)." detik"; 
					?>		
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default paneliMath panelResult">
				<div class="panel-heading unguGelap">NILAI</div>
				<div class="panel-body abu"><?php echo $skor; ?></h3> </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href= "<?php echo base_url().'index.php/latihan/keluarTes'; ?>" onclick="localClear()" ><div class="orangeButton">OK</div></a>
		</div>
	</div>
</div>
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>           
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p class="footerColor">Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
		
</body>
</html>