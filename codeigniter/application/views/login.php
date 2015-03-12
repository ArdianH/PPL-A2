<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="yellow">
	<h1 align="center" style="color:red">Welcome to MY Web</h1>
	<form method="POST" action= <?php echo base_url()."control/login/" ?> >
	
		<table align="center">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username" required/></td>
			</tr>
			
			<tr>
				<td>Password : &nbsp </td>
				<td><input type="password" name="password" required/></td>
			</tr>
			
			<tr>
				<td></td>
				<td align="right"> <input type="submit" name="submit" value="Login"/> </td>
			</tr>
			
			<tr>
				<td></td>
				<td> <?php echo $this->session->flashdata('messageLogin'); ?> </td>
			</tr>
			
			<tr>
				<td></td>
				<td align="right"> <a href = "<?php echo base_url()."control/redirect_forget"; ?>">Forget Password?</a> </td>
			</tr>
			
			<tr>
				<td> <br/><br/><br/><br/><br/> </td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<button onclick = "location.href = '<?php echo base_url()."control/redirect_signup"; ?>'">
					Sign-Up<br/>New Account</button>
				</td>
			</tr>
			
		</table>
		
	</form>
</body>
</html>