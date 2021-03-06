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

    	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="#">iMath</a>
	      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>profil">PROFIL ADMIN</a></li>
            <li><a href="<?php echo base_url();?>admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>home">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>/autentikasi/logout">LOG OUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
        <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>

    <div class="container contents">
    	<div class="titleText">
    	<h1> Dashboard Admin</h1>
    </div>
    <div class="row">
    	<div class="col-md-4">   
			<a href="<?php echo base_url() ?>index.php/admin/daftar_kelas/">
				<img src ="<?php echo base_url() ?>assets/images/icon_kelas.png" width="180px" height="180px">
				<h3>Kelas</h3>
			</a>
		</div>
		<div class="col-md-4">			
			<a href="<?php echo base_url() ?>index.php/admin/daftar_materi/">
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
			<a href="">
				<img src ="<?php echo base_url() ?>assets/images/icon_soaltes.png" width="180px" height="180px">
				<h3>Soal Tes</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>index.php/admin/anggota/">
				<img src ="<?php echo base_url() ?>assets/images/icon_dataanggota.png" width="180px" height="180px">
				<h3>Data Anggota</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>index.php/admin/pesan/">
				<img src ="<?php echo base_url() ?>assets/images/icon_pesan.png" width="180px" height="180px">
				<h3>Pesan</h3>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?php echo base_url() ?>index.php/KelasController/">
				<img src ="<?php echo base_url() ?>assets/images/icon_lain.png" width="180px" height="180px">
				<h3>Lain-lain</h3>
			</a>
		</div>
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
