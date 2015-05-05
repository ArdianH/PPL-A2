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
      <h1> Soal </h1>
      <h3> Kelas <?php $idKelas=$soal[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?>		</h3>
      <h3> Materi <?php echo $soal[0]->idMateri ?></h3>
      		
  		<h3>
  			Pertanyaan : <?php echo $soal[0]->pertanyaan;
        echo '</br>';
        if(is_null($soal[0]->gambarSoal) || ($soal[0]->gambarSoal)==''){
          echo '';
        }
        else{
          echo '<img src="'.base_url().'uploads/';
          echo $soal[0]->gambarSoal;
          echo '">';
        }?>
  		</h3>
      <h3>
        Jawaban : <?php echo $soal[0]->jawaban ?>
      </h3>
      <h4>
         A :  
         <?php echo $pilihanJawaban[0]->deskripsi;
          echo '  ';
          if(!is_null($pilihanJawaban[0]->gambarJawaban) || $pilihanJawaban[0]->gambarJawaban!=''){
          echo '<img src="'.base_url().'uploads/';
          echo $pilihanJawaban[0]->gambarJawaban;
          echo '">';
        }?>
      </h4>
       <h4>
          B : <?php echo $pilihanJawaban[1]->deskripsi;
          echo '  ';
          if(!is_null($pilihanJawaban[1]->gambarJawaban)){
          echo '<img src="'.base_url().'uploads/';
          echo $pilihanJawaban[1]->gambarJawaban;
          echo '">';
        }?>
      </h4>
       <h4>
         C : <?php echo $pilihanJawaban[2]->deskripsi;
          echo '  ';
          if(!is_null($pilihanJawaban[2]->gambarJawaban)){
          echo '<img src="'.base_url().'uploads/';
          echo $pilihanJawaban[2]->gambarJawaban;
          echo '">';
        }?>
      </h4>
       <h4>
          D : <?php echo $pilihanJawaban[3]->deskripsi;
          echo '  ';
          if(!is_null($pilihanJawaban[3]->gambarJawaban)){
          echo '<img src="'.base_url().'uploads/';
          echo $pilihanJawaban[3]->gambarJawaban;
          echo '">';
        }?>
      </h4>
  		<h3>
        Pembahasan: <br>
	<?php echo $soal[0]->pembahasan;
          echo '  ';
          if(!is_null($soal[0]->gambarSolusi)){
	  echo '<br>';
          echo '<img src="'.base_url().'uploads/';
          echo $soal[0]->gambarSolusi;
          echo '">';
        }
          ?>

  		</h3>
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