<html>
    <head>        
	<title>Ubah Kelas</title>
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
    <div class="titleText">    
    <h1>Ubah Materi </h1>
    <?php $id=$result[0]->idMateri;?></div>    

	<form class="formImath" method="POST" action="<?php echo base_url(); ?>index.php/admin/daftar_materi/simpanPerubahan/<?php echo $id; ?>" enctype="multipart/form-data">
	<label>Nama</label></br><input type="text" name ="nama" value="<?php echo $result[0]->nama ;?>"></br></br>
	<label>Kelas</label></br><input type="text" name ="idKelas"  value="<?php echo $result[0]->idKelas ;?>"></br></br>
	<label>Deskripsi</label></br><textarea name ="deskripsi"><?php echo $result[0]->deskripsi ;?></textarea></br></br>
	<label>Gambar: </label></br><input type="file" name="userfile" size="20" /><img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>">		
	</br></br>
	<label>Rangkuman</label></br><textarea name ="rangkuman"><?php echo $result[0]->rangkuman ;?></textarea></br></br>
	<input type="submit" value="Simpan" /> </form>
	<a href = "<?php echo base_url()?>index.php/admin/daftar_kelas"><button/>Batal</button></a>
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