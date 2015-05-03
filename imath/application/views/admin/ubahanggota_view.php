<html>
    <head>        
	<title>Ubah Anggota</title>
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
    <h1>Ubah Anggota</h1>
    <div class="container formiMath">
    <h2><?php $id=$result[0]->username;
    echo $id;?></h2> 
   
	<form method="POST" action="<?php echo base_url()?>index.php/admin/anggota/simpanPerubahan/<?php echo $id?>"
		onsubmit="return confirm('Kamu yakin ingin mengubah data anggota ini?');">
	<label>Username</label></br>
	<input type="text" name="username" title="Username harus valid" size="30" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required/ value="<?php echo $result[0]->username ;?>"></br></br>
	<label>Nama Panggilan</label></br>
	<input type="text" name="namaPanggilan" title="Nama Panggilan harus valid" size="30" required/  value="<?php echo $result[0]->namaPanggilan ;?>"></br></br>
	<label>Email</label></br>
	<input type="email" name="email" size="30" title="Email harus valid" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required/  value="<?php echo $result[0]->email ;?>"></br></br>
	<label>Password</label></br>
	<input type="password" name="password" size="30" pattern=".{5,}" title="Minimum 5 karakter" required/  value="<?php echo $result[0]->password ;?>"></br><br>
	<input class="buatButton" type="submit" value="Ubah" />
		
	</form>
	<a href = "<?php echo base_url()?>index.php/admin/anggota"><button class="batalButton"/>Batal</button></a>
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

