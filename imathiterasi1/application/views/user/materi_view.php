<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Pilih Materi</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
	
    <body>
	
	
	 <nav class="navbar navbar-default navbar-static-top">
      <div class="container" id="logobar">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url()?>home">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
						echo '<br/>';
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Login </a>';
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
		echo '<div class="col-md-2">';
		echo '<a href="'.base_url().'profil">';
		echo "Hai ".$this->session->userdata('namaPanggilan')." :)</a></div>";
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">RAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">TARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">PRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="#">PERMAINAN</a></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<div class="container contents">
	<div class="container contents">
      <div class="jumbotron">
      		<div class="row">
      			<div class="col-md-4">
      				<img src="<?php echo base_url();?>assets/images/IconPlusMin.png" height="200" width="200">
      			</div>
      			<div class="col-md-8">		
      				<h2><?php echo $kelas[0]->deskripsi ?></h2>
				</p>
				<?php if($this->session->userdata('loggedin')) { ?>
					<p>
					<!-- Pilih Button-->
					<a href="<?php echo base_url() ?>tes/retrieveSoal/<?php echo $result[0]->idKelas ?>">
					<button class="targetButton" type="submit">Lakukan Tes</button></a>
													<!--<button type="submit">Latihan</button></a>-->
					</p>
				<?php } ?>
      			</div>
      		</div>
    	</div>    	
	<?php foreach($result as $row):?>	
	<div class="col-md-4">
		<p>
			<img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>" height="200" width="200"></p>
	<p>Materi <?php echo $row->nama ?> </p>
	<p><?php echo $row->deskripsi ?></p>	
	<p>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>/index.php/materi/lihatMateri/<?php echo $row->idMateri ?>">
                                    Lihat Rangkuman Materi</a>
							<!--<button type="submit">Lihat Rangkuman Materi</button></a>-->
	</p>
	
	<p>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>index.php/latihan/retrieveSoal/<?php echo $row->idMateri ?>">
                                    Latihan </a>
									<!--<button type="submit">Latihan</button></a>-->

    </div>
        <?php endforeach; ?>
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

