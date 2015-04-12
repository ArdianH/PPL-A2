<html>
    <head>        
	<title>Buat Materi</title>
    </head>
    <body>    
    <h1>Buat Materi </h1> 
	<?php echo $this->session->flashdata('duplicatePrimaryKeyMateri'); ?>
	<form method="POST" action="<?php echo base_url()?>index.php/admin/daftar_materi/create" enctype="multipart/form-data"> 	
	<p>nama <input type="text" name ="nama"></p>	
	 <p>Kelas <select name ="idKelas">
	<?php foreach($Kelas as $row): ?>			
		<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach ?>
	</select>
	<p>Deskripsi :</p>
		<textarea name ="deskripsi" rows="15" cols="50"></textarea>
	<br/>
	<br/>
	<p>Rangkuman :</p>
		<textarea name ="deskripsi" rows="15" cols="50"></textarea>
	<br/>
	<br/>
	<p>
	</p>
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="Submit" /> </form>
	<a href = "<?php echo base_url()?>index.php/admin/daftar_materi"><button/>Batal</button></a>
	
    </body>
</html>

