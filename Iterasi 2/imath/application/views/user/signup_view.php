<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daftar - iMath</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
</head>

<body>
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
					<li><a href="<?php echo base_url()?>autentikasi">LOG IN</a></li>
				</ul>
			</div>
		</div>  	
	</nav>

    
    
	<div class="container loginbg"> 
	<img class="imgLogin" src='<?php echo base_url() ?>assets/images/biru.jpg' height="700px">
	<form class="formImath anggotaLogin" method="POST" action= <?php echo base_url()."autentikasi/process_signup/" ?> >
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Username</div>
			<div class="col-md-8"><input class="noBorder" type="text" name="username" size="50" title="Username harus valid (2-16 alphanumeric, tanpa spasi)" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,15}$" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Email</div>
			<div class="col-md-8"><input class="noBorder" type="email" name="email" size="50" title="Email harus valid" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required></div>
		</div>
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Password</div>
			<div class="col-md-8"><input class="noBorder" type="password" name="password" size="50" pattern=".{5,}" title="Minimum 5 karakter" required></div>
		</div>
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Ulangi Password</div>
			<div class="col-md-8"><input class="noBorder" type="password" name="retypePassword" size="50" pattern=".{5,}" title="Minimum 5 karakter" required></div>
		</div>
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Nama Panggilan</div>
			<div class="col-md-8"><input class="noBorder" type="text" name="namaPanggilan" size="50" required pattern="^[a-zA-Z ]{2,50}" title="minimal 2 karakter, maksimal 50 karakter, alfabet A-Z"/></div>
		</div>
		<div class="row">
			<div class="col-md-4 textright" id="tulisanBiru">Gender</div>
			<div class="col-md-3">
				<p><input type="radio" name="gender" id="femaleId" value="Perempuan" required>
				<img src="<?php echo base_url()?>assets/images/girl.png" height="150" width="150"></p>
				<p id="tulisanBiru">Perempuan</p>
			</div>
			<div class="col-md-3">
				<p><input type="radio" name="gender" id="maleId" value="Laki-laki">
				<img src="<?php echo base_url()?>assets/images/boy.png" height="150" width="150"></p>
				<p id="tulisanBiru">Laki-laki</p>
			</div>			
		</div>
		<div class="row">				
			<p><input class="orangeButton" type="submit" name="submit" value="DAFTAR"/></p>
		</div>
		<p id="tulisanBiru" class="weight">
			<?php echo $this->session->flashdata('messageSignup'); ?>
		</p>
	</form>	
</div>
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
		<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
		<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
		<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>        
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	</footer>
</body>
</html>