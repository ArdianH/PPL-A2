<html>
    <head>        
	<title>Kelas <?php $idKelas=$kelas[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2);?> - iMath</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
	<script>
		function pindah(idKelas)
		{			
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];			
			window.location = baseUrl + '/kelas/pilih/' + idKelas;			
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
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<div class="container contents">
      <div class="jumbotron">
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>uploads/<?php echo $kelas[0]->gambar ?>" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">				
      				<h2 class="userDashboard">Kelas <?php $idKelas=$kelas[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2);?></h2>
				<?php echo $kelas[0]->deskripsi ?><br>
				<?php if($this->session->userdata('loggedin')) { ?>
				<div class="right">	
					<!-- Pilih Button-->					
					<a href="<?php echo base_url() ?>tes/retrieveSoal/<?php echo $result[0]->idKelas ?>">
					<button class="orangeButton" type="submit">Lakukan Tes</button></a>					
				</div>
				<?php } ?>
      			</div>
      		</div>
    	</div> 
	<div class="row">
	<span id="kelas">Kelas	</span>
	<?php foreach($all as $row):?>
		<?php 				
			$idKelas = $row->idKelas;
			if($idKelas == $result[0]->idKelas)
			{
				echo '<button class="circleGreen buttonDelete">';
				echo substr($idKelas,4,5);
				echo '</button>';
			}
			else
			{
				echo '<button class="circle buttonDelete" onclick="pindah(';
				echo "'";
				echo $idKelas;
				echo "'";
				echo ')">';
				echo substr($idKelas,4,5);
				echo '</button>';
			}
		?>		
	<?php endforeach ?>
	</div>
	<?php foreach($result as $row):?>	
	<div class="col-md-3 kelasMateri">
		<div class="row">
			<p><img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>" height="175" width="175"></p>
			<h3 class="judul"><?php echo $row->nama ?></h2>
			<p><?php echo $row->deskripsi ?></p>
		</div>
		<div class="row">
			<!-- Pilih Button-->
			<?php if($this->session->userdata('loggedin')) { 
			echo '<a class="judul" href="'.base_url().'kelas/lihatMateri/'.$row->idMateri.'">Lihat Rangkuman Materi > </a>';
			}
			else
			{
				$alert="'Log in dulu yaa baru bisa lihat materi :)'";
				echo '<a class="judul" href="'.base_url().'autentikasi/index" onclick="window.alert('.$alert.')">Lihat Rangkuman Materi ></a>';
			}
			?>			
			<p>
			<!-- Pilih Button-->
			<a href="<?php echo base_url() ?>index.php/latihan/retrieveSoal/<?php echo $row->idMateri ?>"><button class="orangeButton">Latihan</button> </a>
			</p>
		</div>
	</div>

        <?php endforeach; ?>	
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

