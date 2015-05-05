<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lupa Password </title>
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
					<li><a href="<?php echo base_url()?>autentikasi/signup">DAFTAR</a></li>
				</ul>
			</div>
		</div>  	
	</nav>
     <div class="container loginbg">
     <img class="imgLogin" src='<?php echo base_url() ?>assets/images/biru.jpg' height="700px">
	<h1 id="tulisanBiru">Lupa Password?</h1>
		<div class="row" id="formlogin">
			<div class="col-md-4" id="none"></div>
			<div class="col-md-4" id="none">		
				<div id="account-wall"> 
					<form method="POST" action= <?php echo base_url()."autentikasi/process_forget/" ?> class="form-signin">
						<h3>Masukkan Email</h3>
						<p>
							<input  class="form-control" placeholder="Email" type="email" name="email" size="30"title="Email harus valid (lowercase)" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required\>
						</p>
						<p>
							<button type="submit" name="submit" class="loginButton">Submit</button>
						</p>
					</form>					
				</div>
			</div>
		</div>
		<br>
		<p>
			<a href="<?php echo base_url()."autentikasi/update_password"; ?>"> <button class="blueButton" type="button">Ganti Password</button></a>
		</p>
		<br>
		<h3 id="tulisanBiru"><?php echo $this->session->flashdata('messageForget'); ?> </h3>	
		<br>		
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