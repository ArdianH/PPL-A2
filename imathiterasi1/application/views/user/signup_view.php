<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
</head>

<body>
		<div class="container navbar">
          <div class="navbar-header" id="logobar">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a>DAFTAR/LOGIN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>

 <div class="container">
	
	<form class="formImath loginbg" method="POST" action= <?php echo base_url()."autentikasi/process_signup/" ?> >
		<table align="center">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" title="Username harus valid" size="30" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required/></td>
			</tr>
			<tr>
				<td>Password : &nbsp </td>
				<td><input type="password" name="password" size="30" pattern=".{5,}" title="Minimum 5 karakter" required/></td>
			</tr>
			<tr>
				<td>RetypePassword : &nbsp </td>
				<td><input type="password" name="retypePassword" size="30" required/></td>
			</tr>
			<tr>
				<td>Email Address : </td>
				<td><input type="email" name="email" size="30" title="Email harus valid" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required/></td>
			</tr>			
			<tr>
				<td>Nama Panggilan : </td>
				<td><input type="text" name="namaPanggilan" size="30" required/></td>
			</tr>	
			<tr>
				<td>Gender : </td>
				<td>
				<input type="radio" name="gender" id="maleId" value="Laki-laki" required/> Male
				<input type="radio" name="gender" id="femaleId" value="Perempuan" /> Female
				</td>
			</tr>
		<!--<tr>
				<td><?php echo $image; ?></td>
				<td><input type="text" name="captcha" size="30" required/></td>
			</tr>	
		-->
			<tr>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input class="loginButton" type="submit" name="submit" value="DAFTAR"/></td>
			</tr>
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageSignup'); ?> </td>
			</tr>
			<tr>
				<td><a href="<?php echo base_url()."autentikasi/index"; ?>"> << Go Back </a></td>
				<td></td>
			</tr>
		</table>		
	</form>
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