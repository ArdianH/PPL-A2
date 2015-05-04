<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="<?php echo base_url();?>index.php/admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>index.php/home">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>index.php/autentikasi/logout">LOG OUT</a></li>
          </ul>
        </div>
      </div>
      <!-- Navbar khusus admin -->
      <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
   <!--  nav collapse -->

    <div class="container contents">
      <div class="contentdetail">
    		<h1> Kelas <?php $idKelas=$result[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?></h1>
    			Deskripsi: <?php $deskripsi=$result[0]->deskripsi; echo $deskripsi; ?></br>
    			Gambar: </br><img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>" height="150px" width="150px"></br>
    			Gambar Sertifikat: </br><img src="<?php echo base_url();?>uploads/<?php echo $result[0]->sertifikat ?>"></br></br>
    		<p><a href="<?php echo base_url()."index.php/admin/daftar_kelas/"?>"><button>Kembali</button></a></p>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <p class="text-muted">
            <div class="row">
            <div class="col-md-3"><a href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
            <div class="col-md-3"><a href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
            <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
            <div class="col-md-3"><a href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>        
          </div>
          <div class="row">
            <div class="col-md-12"><p>Copyright(c) 2015</p></div>
          </div>
          </p>
        </div>
      </footer>
    </body>
</html>