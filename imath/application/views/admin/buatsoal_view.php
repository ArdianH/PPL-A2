<html>
    <head>        
	<title>Buat soal</title>
    </head>
    <body>
 <!-- Navigation Bar iMath -->
    	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/images/Logo.jpg"></a>
	      </div>
        <!-- Navbar Atas -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right"><li><a href="<?php echo base_url();?>index.php/profil">PROFIL ADMIN</a></li>
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