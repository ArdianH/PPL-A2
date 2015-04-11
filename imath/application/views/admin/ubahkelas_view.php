<html>
    <head>        
	<title>Ubah Kelas</title>
    </head>
    <body>    
    <h1>Ubah Kelas </h1> 
    <?php $id=$result[0]->idKelas;
    ?>
	<form method="POST" action="<?php echo base_url()?>index.php/admin/daftar_kelas/simpanPerubahan/<?php echo $id?>" enctype="multipart/form-data">
	<p>Kode Kelas<input type="text" name ="idKelas" value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Deskripsi <input type="text" name ="deskripsi"  value="<?php echo $result[0]->deskripsi ;?>"></p>
	
	<label>Unggah Gambar </label><input type="file" name="userfile" size="20" />
	<p>
		<input type="submit" value="Submit" />
	</p>
	</form>
	
	
	</form>
	
    </body>
</html>