<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lupa Password</title>
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
	<h1 align="center">Ubah Password</h1>
	<form method="POST" action= <?php echo base_url()."autentikasi/update_password/" ?> >
	
		<table align="center">
			<tr>
				<td>Password&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;</td>
				<td><input type="text" name="passcode" size="30" title="Passcode tidak dikenali" pattern="[a-z0-9]{40}" required /></td>
			</tr>	
			<tr>
				<td>Username&nbsp&nbsp&emsp;&emsp;&emsp;&emsp;:&emsp;</td>
				<td><input type="text" name="username" size="30" title="Username harus valid (5-16 alphanumeric)" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{4,15}$" required /></td>
			</tr>			
			<tr>
				<td>Password Baru&nbsp&nbsp&emsp;&emsp;:&emsp;</td>
				<td><input type="password" name="newPassword" size="30" pattern=".{5,}" title="Minimum 5 karakter" required/></td>
			</tr>			
			<tr>
				<td>Ulangi Password&nbsp&nbsp&emsp;:&emsp;</td>
				<td><input type="password" name="retypeNewPassword" size="30" pattern=".{5,}" title="Minimum 5 karakter" required/></td>
			</tr>			
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit" value="Ubah"/></td>
			</tr>
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageChangePassword'); ?> </td>
			</tr>
			<tr>
				<td><a href="<?php echo base_url()."autentikasi/forget"; ?>">Kembali </a></td>
				<td></td>
			</tr>
		</table>
		
	</form>
</div>
</body>
</html>