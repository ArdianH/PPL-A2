<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="green">
	<h1 align="center">Welcome to Homepage</h1>
	<h3 align="center">Hi <?php echo $this->session->userdata['username'] ?> !</h6>
	<p align="center">Ini adalah contoh text html pada viewer<br /></p>
	<a href="<?php echo base_url()."control/logout";?>">Logout</a>
</body>
</html>