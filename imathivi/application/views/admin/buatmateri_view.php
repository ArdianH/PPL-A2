<html>
    <head>        
	<title>Buat Materi</title>
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
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
    <div class="container contents">    
    	<div class="titleText">
	    <h1>Buat Materi</h1>
	</div>
	    </br>
	    <?php echo $this->session->flashdata('duplicatePrimaryKeyMateri'); ?>
		<form class="formImath" method="POST" action="<?php echo base_url()?>index.php/admin/daftar_materi/create" enctype="multipart/form-data"> 	
		<label>Nama Materi</label></br>
		<input type="text" name ="nama"></br></br>
		<label>Kelas</label></br><select name ="idKelas">
		<?php foreach($Kelas as $row): ?>			
			<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
		<?php endforeach ?>
		</select>
		</br></br>
		<label>Deskripsi</label></br>
		<textarea type="text" name ="deskripsi" rows="4" cols="50"></textarea></br></br>
		<label>Rangkuman</label></br>
		<textarea type="text" name ="rangkuman" rows="4" cols="50"></textarea></br></br>
		<label>Unggah Gambar</label></br>
		<input type="file" name="userfile" size="20" /></br></br>
		<input type="submit" value="Submit" /> </form>
		<a href = "<?php echo base_url()?>index.php/admin/daftar_materi"><button/>Batal</button></a>
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

