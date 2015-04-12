<html>
    <head>        
	<title>Unggah Sertifikat</title>
    </head>
    <body>
	<?php foreach($result as $row):?>
    <h1>Unggah Sertifikat</h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/admin/daftar_kelas/createSertifikat/<?php echo $row->idKelas ?>" enctype="multipart/form-data"> 	
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="Submit" /> </form>
	<a href = "<?php echo base_url()?>index.php/admin/daftar_kelas"><button/>Batal</button></a>
	
	<?php endforeach; ?>
    </body>
</html>

