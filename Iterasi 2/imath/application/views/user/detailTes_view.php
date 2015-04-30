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
		<?php 
		$kebenaran = 0;
		$kesalahan = 0;
		for ($i = 0; $i < $jumlahSoal; $i++){
			if($setNilaiMateri[$i] == "BENAR") {
				$kebenaran++;
			} else{
				$kesalahan++;
			}
		}
		?>
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
<div class="pembahasanNavBar container">
		<div class="kuning col-md-6">
			<button class="buttoncoklat">Detil Nilai Tes</button>
		</div>
		<div class="coklat col-md-6">
			<button class="buttonkuning" onclick="location.href = '<?php echo base_url()."tes/solusiTes/".$kelas."/"; ?>'; localClear()">
					 Pembahasan Tes</button>
		</div>
</div>

<div class="container contents contentDetilTes">
	<div class="container contentDetilTes2">

	<div class="row titleDetilTes">
	Detil Tes Kelas <?php echo $kelas; ?>
</div>
<div class="row">
	
	</div>
	<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
			<div class="col-md-2">
				<div class="nilaiTes">Nilai : <?php echo $skor; ?></div>
			</div>
			<div class="col-md-5">
			</div>
			<div class="col-md-5">
				<div class="waktuTes">Waktu : <?php echo floor($waktuTes/60)." menit ".($waktuTes%60)." detik"; ?></div>
			</div>
		</div>
		<div class="col-md-1">
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
		<table  class="tableDetilTes table" caption="Detail Jawaban" align="center" border="1">
			<thead class="tableDetilTes">
				<tr>
				<th>Soal</th>
				<th>Materi</th>
				<th>Hasil</th>
			</tr>
			</thead>
			<tbody class="tableDetilTes">
			<?php
			for ($i = 0; $i < $jumlahSoal; $i++){
				$j = $i+1;
				echo	'<tr>';
				echo 		'<td>'.$j.'</td>';
				echo		'<td>'.$setNamaMateri[$i].'</td>';
				echo		'<td>'.$setNilaiMateri[$i].'</td>';
				echo	'</tr>';
				//echo $setNamaMateri[$i]."  ".$setNilaiMateri[$i];
			}
			?>
		</tbody>
		</table>
	</div>
	<div class="col-md-1">
	</div>
</div>
		<a href= "<?php echo base_url()."kelas/pilih/".$kelas; ?>" onclick="localClear()"> Kembali ke Kelas</a>
	</div>
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