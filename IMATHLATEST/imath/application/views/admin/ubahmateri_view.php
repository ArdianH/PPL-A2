<html>
    <head>        
	<title>Ubah Materi <?php $nama=$result[0]->nama; echo $nama;?></title>
    </head>
    <body>    
    <h1>Ubah Materi <?php $nama=$result[0]->nama; echo $nama;$id=$result[0]->idMateri;?>  </h1> 
    
	<form method="POST" onsubmit="return confirm('Kamu yakin ingin mengubah materi ini?');" action="<?php echo base_url(); ?>index.php/admin/daftar_materi/simpanPerubahan/<?php echo $id; ?>" enctype="multipart/form-data">
	<p>Nama<input type="text" name ="nama" value="<?php echo $result[0]->nama ;?>"></p>	
	 <p>Kelas <select name ="idKelas">
	<?php foreach($Kelas as $row): ?>			
		<option value="<?php echo $row->idKelas ?>" <?php $selectedKelas=$result[0]->idKelas;	$currentKelas=$row->idKelas;if($selectedKelas==$currentKelas) echo "selected";?>>
		<?php echo $row->idKelas ?>
		</option>
	<?php endforeach ?>
	</select>
	<p>Deskripsi :</p>
		<textarea name ="deskripsi" rows="15" cols="50"><?php echo $result[0]->deskripsi; ?></textarea>
	<br/>
	<input type="file" name="userfile" size="20" />	
	<br />
	Gambar Lama:<br> <img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>">		
	<br />
	<p>Rangkuman</p>
	<textarea name ="rangkuman" rows="15" cols="50"><?php echo $result[0]->rangkuman; ?></textarea>
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>