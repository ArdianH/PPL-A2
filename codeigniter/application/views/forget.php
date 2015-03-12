<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="orange">
	<h1 align="center" style="color:red">Forget Password Form</h1>
	<form method="POST" action= <?php echo base_url()."control/forget/" ?> >
	
		<table align="center">
			<tr>
				<td>Email Address : </td>
				<td><input type="email" name="email" size="30"/></td>
			</tr>			
	<!--	<tr>
				<td><?php echo $image; ?></td>
				<td><input type="text" name="captcha" size="30" required/></td>
			</tr>			
	-->
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit" value="Submit"/></td>
			</tr>
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageForget'); ?> </td>
			</tr>
	<!--		<tr>
				<td> <br /><br /> </td>
				<td>Already have a passcode? Create your new password here</td>
			</tr>
			<tr>
				<td>Passcode : </td>
				<td><input type="text" name="passcode" size="50"/></td>
			</tr>
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" size="30"/></td>
			</tr>						
			<tr>
				<td>New Password : </td>
				<td><input type="password" name="" size="30"/></td>
			</tr>			
			<tr>
				<td>Reconfirm Password : </td>
				<td><input type="password" name="email" size="30"/></td>
			</tr>
			-->
			<tr>
				<td></td>
				<td><a href="<?php echo base_url()."control/redirect_change"; ?>"> Change Password </a></td>
			</tr>
			<tr>
				<td><a href="<?php echo base_url()."control/index"; ?>"> << Go Back </a></td>
				<td></td>
			</tr>
		</table>
		
	</form>
</body>
</html>