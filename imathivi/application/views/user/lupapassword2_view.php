<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="orange">
	<h1 align="center" style="color:red">Change Password Form</h1>
	<form method="POST" action= <?php echo base_url()."autentikasi/update_password/" ?> >
	
		<table align="center">
			<tr>
				<td>Passcode : </td>
				<td><input type="text" name="passcode" size="50" required /></td>
			</tr>	
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" size="30" required /></td>
			</tr>			
			<tr>
				<td>New Password : </td>
				<td><input type="password" name="newPassword" size="30" required/></td>
			</tr>			
			<tr>
				<td>Retype New Password : </td>
				<td><input type="password" name="retypeNewPassword" size="30" required/></td>
			</tr>			
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="submit" value="Change Password !"/></td>
			</tr>
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageChangePassword'); ?> </td>
			</tr>
			<tr>
				<td><a href="<?php echo base_url()."autentikasi/forget"; ?>"> << Go Back </a></td>
				<td></td>
			</tr>
		</table>
		
	</form>
</body>
</html>