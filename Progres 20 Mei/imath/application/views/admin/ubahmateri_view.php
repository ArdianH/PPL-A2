<html>
    <head>        
	<title>Ubah Materi - iMath</title>
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
    <div class="titleText2">    
    <h1>Ubah Materi </h1>
    <?php $id=$result[0]->idMateri;?></div>    

	<form class="formImath" method="POST" action="<?php echo base_url(); ?>admin/daftar_materi/simpanPerubahan/<?php echo $id; ?>" enctype="multipart/form-data">
		<label>Nama</label></br><input size="50" type="text" name ="nama" value="<?php echo $result[0]->nama ;?>"></br></br>
	
		<label>Kelas</label></br>
			<select id = "idKelas" name="idKelas">
				<?php foreach($Kelas as $row):?>			
				<option value="<?php echo $row->idKelas?>" name ="idKelas" <?php if($row->idKelas == $result[0]->idKelas ) echo "selected";?>><?php echo substr($row->idKelas, 0, 2)." ".substr($row->idKelas, 4, 5) ?> </option>
				<?php endforeach?>
			</select><br><br>
		<label>Deskripsi Singkat</label></br>
		<textarea type="text" name ="deskripsi" rows="4" cols="50" maxlength="50" required title="maksimal 50 karakter untuk deskripsi singkat"></textarea></br></br>
		<label>Gambar: </label></br><input type="file" name="userfile" size="20" /><br>
		<?php
			if(is_null($result[0]->gambar) || ($result[0]->gambar)==''){ echo '';}
			else{?>
		<img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>" height="200" width="200">		
		<?php }?>
		</br></br>
		<label>Rangkuman</label></br><textarea name ="rangkuman" rows="4" cols="50"><?php echo $result[0]->rangkuman ;?></textarea></br></br>	
		<button type="submit" class="asButton">Simpan</button> 
		<a href = "<?php echo base_url()?>admin/daftar_materi/view/<?php echo $result[0]->idKelas?>"><button type="button" class="rdButton">Batal</button></a>
	</form>	
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