<!DOCTYPE html> 
<html>
    <head>
	<meta charset = "utf-8">
	<title>Profil</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/imath.css">
    </head>
    <body>    
    <h1> Profil</h1>
    
	<?php foreach($result as $row):?>
	<a href="<?php echo base_url() ?>/index.php/profil/ubah/<?php echo $row->username ?>">
                                    <button type="submit">Ubah</button></a>	
	<?php
		$userGender = $row->gender; 
		if($userGender = 'Female')
		{
			echo '<div id = "girl"></div>';
		}
		else
		{
			echo '<div id = "boy"></div>';
		}
	?>
	
	<p>Nama Panggilan: <?php echo $row->namaPanggilan?> </p>
	
	<p>Email <?php echo $row->email?></p>
	
	<p>Password: ***</p>
	
	<p>Username: <?php echo $row->username?> </p>
	
	<p>Gender: <?php echo $row->gender?> </p>
	
	<?php endforeach; ?>

	</body>
</html>