<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Login - iMath </title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
</head>

<body>
	<div class="container navbar">
          <div class="navbar-header" id="logobar">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a>DAFTAR/LOGIN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>
    
    
	<div class="container loginbg"> 
	      <div class="row" id="formlogin">
		<div class="col-md-4" id="none"></div>
		<div class="col-md-4" id="none">		
		  <div id="account-wall"> 
			<form class="form-signin" method="POST" action= <?php echo base_url()."autentikasi/login/" ?> >
			<input type="text" name="username" class="form-control" placeholder="Username" title="Username harus valid (5-16 alphanumeric)" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{4,15}$" required ></input>
			<input type="password" name="password" class="form-control" placeholder="Password" title="Minimum 5 karakter" pattern=".{5,}" required ></input>
			<button class="loginButton" type="submit" value="Login">SUBMIT</button>
			<?php echo $this->session->flashdata('messageLogin'); ?>
			<p><a href = "<?php echo base_url()?>autentikasi/forget" id="lupaPassword">Lupa Password?</a></p>
			</form>
		    </div>
			</br></br>
			<p>Kamu belum menjadi anggota? Yuk <a href = "<?php echo base_url()?>autentikasi/signup"> Daftar!</a></p>
		</div>
		<div class="col-md-4" id="none"></div>		
	 </div>	      
	</div>
	<img src='<?php echo base_url() ?>assets/images/daun.png' width="1349px">

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