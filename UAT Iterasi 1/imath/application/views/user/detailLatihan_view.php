<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
	<script>
		function clearLocal(){
			window.localStorage.clear();
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
						echo '<a href="'.base_url().'autentikasi/logout"> Keluar </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Keluar </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Masuk </a>';
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
		$gender = $this->session->userdata('gender');
		if($gender=='Laki-Laki'){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a>:)</div>";
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<div class="container contents">
	<h1 align="center">Selamat, kamu telah menyelesaikan materi <?php echo $kelas; ?> !</h1>
		<br/>
		<br/>

		<table align="center">
			<tr>
				<td>Soal :</td>
				<td><?php echo $skor/10; ?> Benar <?php echo 10-($skor/10); ?> Salah</td>			

			</tr>
			<tr>
				<td>Waktu :</td>
				<td><?php echo floor($waktuTes/60)." menit ".($waktuTes%60)." detik"; ?></td>
			</tr>
			<tr>
				<td>Nilai Latihan Materi : </td>
				<td><?php echo $skor; ?></td>
			</tr>	
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href= "<?php echo base_url()."index.php/latihan/keluarTes"; ?>" onclick="localClear()"> OK </a></td>
				<td></td>
			</tr>	
		</table>
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