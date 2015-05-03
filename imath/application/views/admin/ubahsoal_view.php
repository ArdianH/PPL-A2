<html>
    <head>        
	<title>Ubah soal</title>
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
    <h1>Ubah soal </h1> 
    <?php $id=$result[0]->idsoal;
    echo $id;?>
	<form method="POST" action="<?php echo base_url(); ?>index.php/soalcontroller/simpanPerubahan/<?php echo $id; ?>">
	<p>Nama<input type="text" name ="nama" value="<?php echo $result[0]->nama ;?>"></p>
	<p>Kelas <input type="text" name ="idKelas"  value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Deskripsi <input type="text" name ="deskripsi" value="<?php echo $result[0]->deskripsi ;?>"></p>
	<p>Rangkuman <input type="text" name ="rangkuman"  value="<?php echo $result[0]->rangkuman ;?>"></p>
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>