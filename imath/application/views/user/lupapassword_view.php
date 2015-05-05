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
      <div class="container" id="logobar">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url()?>home">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
						echo '<br/>';
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Login </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
     </nav>
     <div class="container contents loginbg">
	<h1 align="center">Forget Password Form</h1>
	<form method="POST" action= <?php echo base_url()."autentikasi/process_forget/" ?> >
	
		<table align="center">
			<tr>
				<td>Email Address : </td>
				<td><input type="email" name="email" size="30"title="Email harus valid (lowercase)" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required/></td>
			</tr>		
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit" value="Submit"/></td>
			</tr>
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageForget'); ?> </td>
			</tr>
			<tr>
				<td></td>
				<td><a href="<?php echo base_url()."autentikasi/update_password"; ?>"> Change Password </a></td>
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