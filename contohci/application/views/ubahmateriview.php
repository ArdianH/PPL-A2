<html>
    <head>        
	<title>Ubah Materi</title>
    </head>
    <body>    
    <h1>Ubah Materi </h1> 
    <?php $id=$result[0]->idMateri;
    echo $id;?>
	<form method="POST" action="<?php echo base_url()?>index.php/matericontroller/simpanPerubahan/<?php echo $id ?>" enctype="multipart/form-data"> 	
	<p>nama <input type="text" name ="nama"></p>
	<p>id <input type="text" name ="idMateri"></p>
	 <p>Kelas <select name ="idKelas">
	<?php foreach($Kelas as $row): ?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach ?>
	</select>
	<p>deskripsi <input type="text" name ="deskripsi"></p>
	<p>rangkuman <input type="text" name ="rangkuman"></p>	
	<p>
	</p>
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="Submit" /> </form>
	
    </body>
</html>