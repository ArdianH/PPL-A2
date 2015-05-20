<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Login - iMath </title>
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
					<li><a href="<?php echo base_url()?>autentikasi/signup">DAFTAR</a></li>
				</ul>
			</div>
		</div>  	
	</nav>

    
    
	<div class="container loginbg"> 
	<img class="imgLogin" src='<?php echo base_url() ?>assets/images/biru.jpg' height="700px">
	      <div class="row" id="formlogin">
		<div class="col-md-4" id="none"></div>
		<div class="col-md-4" id="none">		
		  <div id="account-wall"> 
			<form class="form-signin" method="POST" action= <?php echo base_url()."autentikasi/login/" ?> >
			<input type="text" name="username" class="form-control noBorder" placeholder="Username" title="Username harus valid (2-25 alphanumeric)" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,24}$" required ></input>
			<input type="password" name="password" class="form-control noBorder" placeholder="Password" title="Minimum 5 karakter" pattern=".{5,}" required ></input>
			<button class="loginButton" type="submit" value="Login">LOG IN</button>
			<span class="weight"><?php echo $this->session->flashdata('messageLogin'); ?></span>
			<p><a href = "<?php echo base_url()?>autentikasi/forget" id="lupaPassword">Lupa Password?</a></p>
			</form>
		    </div>
			</br></br>
			<p class="anggotaLogin">Kamu belum menjadi anggota? </p>
			<p class="anggotaLogin">Yuk <a class="anggotaLogin" href = "<?php echo base_url()?>autentikasi/signup"> Daftar!</a></p>
		</div>
		<div class="col-md-4" id="none"></div>		
	 </div>	      
	</div>
	<img src='<?php echo base_url() ?>assets/images/daun.png' width="1349px">

       <!--=============================FOOTER ==============================-->
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>           
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p class="footerColor">Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	</footer>
	<!--============================= END OF FOOTER ==============================-->
    
</body>
</html>