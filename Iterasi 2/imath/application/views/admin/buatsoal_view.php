<html>
    <head>        
	<title>Buat soal</title>
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
   
    <h1>Buat soal </h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/admin/soal_latihan/create">
	<select name ="idKelas">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	</select>
	<select name ="idMateri">
	<?php foreach($Materi as $row):?>			
	<option value="<?php echo $row->idMateri ?>" ><?php echo $row->idMateri ?></option>
	<?php endforeach?>
	</select>	
	<p>pertanyaan<input type="text" name ="pertanyaan"></p>
	<p>A. <input type="text" name ="optiona"></p>
	<p>B. <input type="text" name ="optionb"></p>
	<p>C. <input type="text" name ="optionc"></p>
	<p>D. <input type="text" name ="optiond"></p>
	<p><select name ="jawaban">		
	<option value="a">A</option>
	<option value="b">B</option>
	<option value="c">C</option>
	<option value="d">D</option>
	</select></p>
	<p>pembahasan<input type="text" name ="pembahasan"></p>	
	<p>
		<input type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/admin/soal_latihan"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>