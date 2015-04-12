<html>
    <head>
	<title>DETAIL MATERI</title>
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
            <li><a href="../navbar/">PROFIL ADMIN</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>index.php/">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>index.php/logout">LOG OUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
        <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
    

    <h1> Soal </h1>
    <h3> Kelas <?php $idKelas=$soal[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?>		</h3>
    <h3> Materi <>
    		
		<h3>
			Pertanyaan : <?php echo $soal[0]->pertanyaan ?>
      <img src="<?php echo base_url();?>uploads/<?php echo $soal[0]->gambarSoal ?>">
		</h3>
    <h3>
      Jawaban : <?php echo $soal[0]->jawaban ?>
    </h3>
    <p>
       A :  <?php echo $pilihanJawaban[0]->deskripsi ?>
       <img src="<?php echo base_url();?>uploads/<?php echo $pilihanJawaban[0]->gambarJawaban ?>">
    </p>
     <p>
        B : <?php echo $pilihanJawaban[1]->deskripsi ?>
       <img src="<?php echo base_url();?>uploads/<?php echo $pilihanJawaban[1]->gambarJawaban ?>">
    </p>
     <p>
       C : <?php echo $pilihanJawaban[2]->deskripsi ?>
       <img src="<?php echo base_url();?>uploads/<?php echo $pilihanJawaban[2]->gambarJawaban ?>">
    </p>
     <p>
        D : <?php echo $pilihanJawaban[3]->deskripsi ?>
       <img src="<?php echo base_url();?>uploads/<?php echo $pilihanJawaban[3]->gambarJawaban ?>">
    </p>
		<p>
      Pembahasan: <?php echo $soal[0]->pembahasan ?>
			<img src="<?php echo base_url();?>uploads/<?php echo $soal[0]->gambarSolusi ?>">
		</p>
	</body>
</html>