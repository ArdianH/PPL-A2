<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Solusi Tes - iMath </title>
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
<!-- =========================  Navigation Bar iMath =========================== -->
	<div class="pembahasanNavBar container">
		<div class="kuning col-md-6">
			<button class="buttoncoklat" href="<?php echo base_url()."tes/processSoal/selesai";?>" onClick="window.history.back();">Detil Nilai Tes</button>
		</div>
		<div class="coklat col-md-6">
			<button class="buttonkuning">Pembahasan Tes</button>
		</div>
</div>

<div class="container contents contentPembahasanTes">
	<div class="container contentDetilTes2">
		<div class="row titleDetilTes">
			Pembahasan Tes Kelas <?php echo $kelas; ?>
		</div>
		<div class="row pembahasanTesRow">
			<div class="col-md-9" style="font-weight:bold;">
				Solusi
			</div>
			<div class="col-md-3" style="font-weight:bold;">
				Jawabanmu
			</div>
		</div>
<?php 
		for($i=0; $i<$jumlahSoal; $i++) : ?>
		<div class="row pembahasanTesRow">
			<div class="col-md-9">
				<div class="soalBenar">Soal <?php $j=$i+1; echo $j; ?> : <?php echo $dataSoalTes[$i]['jawaban']; ?></div>
				<?php echo $dataSoalTes[$i]['pertanyaan']; ?> <br/> <?php echo $dataJawabanTes[$i];?> <br/> <?php echo $dataSoalTes[$i]['pembahasan']; ?>
			</div>
			<div class="col-md-3"><?php 
				if(isset($setJawabanUser[$i])):
					echo $setJawabanUser[$i];
				else:
					echo "-";
				endif;	
				?>
			</div>
		</div>
		
		<?php endfor; ?>
		<a href= "<?php echo base_url()."tes/keluarTes/".$kelas; ?>" onclick="clearLocal()">Kembali ke Kelas</a>
	</div>
	</div>
</div>
		<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>      
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
		
</body>
</html>