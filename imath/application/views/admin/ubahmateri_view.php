<html>
    <head>        
	<title>Ubah Materi</title>
    </head>
    <body>    
    <h1>Ubah Materi </h1> 
    <?php $id=$result[0]->idMateri;
    echo $id;?>
	<form method="POST" action="<?php echo base_url(); ?>index.php/admin/daftar_materi/simpanPerubahan/<?php echo $id; ?>">
	<p>Nama<input type="text" name ="nama" value="<?php echo $result[0]->nama ;?>"></p>
	<p>Kelas <input type="text" name ="idKelas"  value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Deskripsi <input type="text" name ="deskripsi" value="<?php echo $result[0]->deskripsi ;?>"></p>
	<p>Rangkuman <input type="text" name ="rangkuman"  value="<?php echo $result[0]->rangkuman ;?>"></p>
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>