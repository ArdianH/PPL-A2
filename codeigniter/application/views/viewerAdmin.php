<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="green">
	<h1 align="center">Welcome to Homepage</h1>
	<h3 align="center">Hi <?php echo $this->session->userdata['nama'] ?> !</h6>
	<p align="center">Silahkan pilih menu CRUD database<br /></p>
	<a href = "<?php echo base_url()."control/redirect_viewdata"?>" align="center">CRUD SoalLatihan</a>
	<a href="<?php echo base_url()."control/logout";?>">Logout</a>
</body>
</html>