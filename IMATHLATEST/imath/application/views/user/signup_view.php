<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="pink">
	<h1 align="center" style="color:red">Sign-Up Form</h1>
	<form method="POST" action= <?php echo base_url()."autentikasi/process_signup/" ?> >
	
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
				<td></td>
				<td align="right"><input type="submit" name="submit" value="Sign-Up"/></td>
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
</body>
</html>