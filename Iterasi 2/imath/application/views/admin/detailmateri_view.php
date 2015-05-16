<html>
    <head>
  	 <title>DETAIL MATERI</title>
      <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
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
      <div class="contentdetail">

    <h1> Materi  Kelas <?php $idKelas=$result[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?>		</h1>
    		
		
			Nama: <?php $nama=$result[0]->nama; echo $nama; ?>
		
		<h4>	
			Deskripsi: <?php $deskripsi=$result[0]->deskripsi; echo $deskripsi; ?>
		</h4>
		<h4>
			Gambar: <img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>">
		</h4>
		<h4>
			Rangkuman: <?php $rangkuman=$result[0]->rangkuman; echo $rangkuman; ?>
		</h4>
  </div>
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