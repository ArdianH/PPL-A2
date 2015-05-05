<html>
    <head>
	 <title>soal</title>
   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
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
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		
		echo '<div class="container" id="iconbar">';
        
		echo '<div class="col-md-2"><a href="'.base_url().'admin/daftar_kelas">KELAS</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/daftar_materi">MATERI</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/soal_latihan">SOAL LATIHAN</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/soal_tes">SOAL TES</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/anggota">DATA ANGGOTA</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/pesan">PESAN</a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'admin/lain_lain">LAIN-LAIN</a></div>';
		
	echo '</div>';
	}
	?>
</nav>
 <!--======================= END OF ADMIN NAVBAR ============================-->

	<div class="container contents">
		<?php
			$url = $_SERVER['REQUEST_URI'];
			$arr = explode("/", $url);
			$kelas = $arr[count($arr) - 1];
		?>
		
		<h1> Atur Soal Tes <?php echo substr($kelas,4,5)?></h1>
		<form method="POST" action="<?php echo base_url();?>index.php/admin/soal_tes/show">		
			Kelas 
			<select id = "idKelas" name="idKelas">
				<?php foreach($Kelas as $row):
					$idKelas = $row->idKelas;				
					if($kelas == $idKelas):?>
						<option value="<?php echo $row->idKelas?>" name ="idKelas" selected><?php echo $row->idKelas ?> </option>
					<?php else: ?>
						<option value="<?php echo $row->idKelas?>" name ="idKelas"><?php echo $row->idKelas ?> </option>	
				<?php endif; 
				endforeach?>
			</select>      
			<input type="submit" value="Submit" />
		    </form>
		    
		    <form method="POST" action="<?php echo base_url();?>admin/soal_tes/simpan<?php echo '/'.$kelas?>">
		    <button type="submit">Simpan</button>
		    <table class="table table-hover table-striped tableimath">
			<thead>
				<tr>
					   <th class="col-md-1">No</th>
					  <th class="col-md-3">Pertanyaan</th>
					  <th class="col-md-1">Jawaban</th>
					  <th class="col-md-4">Pembahasan</th>
					  <th class="col-md-4">Tampilkan</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; foreach($result as $row):?> 
				<tr>
					<td>
						<?php echo $i; $i = $i+1; ?>
					</td>
					<td>
						<?php echo $row->pertanyaan ?>
					</td>
					<td>
						<?php echo $row->jawaban ?>
					</td>
					<td>
						<?php echo $row->pembahasan ?>
					</td>
					<td>
						<?php $shown= $row->isDitunjukkan?>
						<div class="row">
							<div class="col-md-4">
								<input type="radio" name="tampilkan<?php  echo $row->idSoal?>" value="ya" <?php if ($shown == "Ya") echo 'checked = "checked"';?>>
								<span id="tulisanBiru" class="weight">Ya</span>
							</div>	
							<div class="col-md-4">
								<input type="radio" name="tampilkan<?php  echo $row->idSoal?>" value="tidak" <?php if ($shown == "Tidak") echo 'checked = "checked"';?>>
								<span id="tulisanMerah" class="weight">Tidak</span>
							</div>
						</div>
					</td>				
				</tr>
		      <?php endforeach; ?>
			</tbody>
		</table>
		</form>
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