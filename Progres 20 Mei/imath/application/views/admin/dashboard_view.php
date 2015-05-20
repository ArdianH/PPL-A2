<html>
    <head>        
	<title>Dashboard Admin</title>
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
				<li><a href="<?php echo base_url()?>"> BERANDA</a></li>
				<li><a href="<?php echo base_url()?>autentikasi/logout"> LOG OUT </a></li>	
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
    	<div class="titleText">
    	<h1> Dashboard Admin</h1>
    </div>
    <div class="row">
    	<div class="col-md-4">   
			<a href="<?php echo base_url() ?>admin/daftar_kelas/">
				<img src ="<?php echo base_url() ?>assets/images/icon_kelas.png" width="180px" height="180px">
				<h3>Kelas</h3>
			</a>
		</div>
		<div class="col-md-4">			
			<a href="<?php echo base_url() ?>admin/daftar_materi/">
				<img src ="<?php echo base_url() ?>assets/images/icon_materi.png" width="180px" height="180px">
		                    <h3>Materi</h3>
			</a>
		</div>
		<div class="col-md-4">	
			<a href="<?php echo base_url();?>admin/soal_latihan">
				<img src ="<?php echo base_url() ?>assets/images/icon_soallatihan.png" width="180px" height="180px">
				<h3>Soal Latihan</h3>
			</a>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>admin/soal_tes/">
				<img src ="<?php echo base_url() ?>assets/images/icon_soaltes.png" width="180px" height="180px">
				<h3>Soal Tes</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>admin/anggota/">
				<img src ="<?php echo base_url() ?>assets/images/icon_dataanggota.png" width="180px" height="180px">
				<h3>Data Anggota</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>admin/pesan/">
				<img src ="<?php echo base_url() ?>assets/images/icon_pesan.png" width="180px" height="180px">
				<h3>Pesan</h3>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?php echo base_url() ?>admin/lain_lain/">
				<img src ="<?php echo base_url() ?>assets/images/icon_lain.png" width="180px" height="180px">
				<h3>Lain-lain</h3>
			</a>
		</div>
	</div>
</div>

	<!-- ========================= Footer =============================-->
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
	<!-- ===================== END OF FOOTER ======================-->
    </body>
</html>
