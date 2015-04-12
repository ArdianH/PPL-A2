<html>
    <head>        
	<title>Ubah Kelas</title>
    </head>
    <body>    
    <h1>Ubah Kelas </h1> 
    <?php $id=$result[0]->idKelas;
    ?>
	<form method="POST" onsubmit="return confirm('Kamu yakin ingin mengubah isi kelas ini?');" action="<?php echo base_url()?>index.php/admin/daftar_kelas/simpanPerubahan/<?php echo $id?>" enctype="multipart/form-data">
	<p>Kode Kelas<input type="text" name ="idKelas" value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Deskripsi:</p>
	<textarea name ="deskripsi" rows="15" cols="50"><?php echo $result[0]->deskripsi ;?></textarea>
	
	<p>Unggah Gambar </p>
	<input type="file" name="userfile" size="20" />
	<p>
		<input type="submit" value="Submit" />
	</p>
	</form>
	
	
	</form>
	
    </body>
</html>