<html>
<!--INDAH-->
    <head>        
	<title>Ubah Kelas</title>
    </head>
    <body>    
    <h1>Ubah Kelas </h1> 
    <?php $id=$result[0]->idKelas;
    ?>
	<form method="POST" action="<?php echo base_url()?>index.php/KelasController/simpanPerubahan/<?php echo $id?>">
	<p>Kode Kelas<input type="text" name ="idKelas" value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Deskripsi <input type="text" name ="deskripsi"  value="<?php echo $result[0]->deskripsi ;?>"></p>

	<form method="POST" action="<?php echo base_url()?>index.php/KelasController/do_upload" enctype="multipart/form-data">
	<p>
		<input type="submit" value="Submit" />
	</p>
	</form>
	
	
	</form>
	
    </body>
</html>