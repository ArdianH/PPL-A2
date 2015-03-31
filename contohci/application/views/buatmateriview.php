<html>
    <head>        
	<title>Buat Materi</title>
    </head>
    <body>    
    <h1>Buat Materi </h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/matericontroller/create"> 	
	<p>nama <input type="text" name ="nama"></p>
	<p>id <input type="text" name ="idMateri"></p>
	 <p>Kelas <select name ="idKelas">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	</select>
	<p>deskripsi <input type="text" name ="deskripsi"></p>
	<p>rangkuman <input type="text" name ="rangkuman"></p>	
	<p>
		<input type="submit" value="Submit" /></form>
		<a href = "<?php echo base_url()?>index.php/matericontroller"><button/>Batal</button></a>
	</p>
	<?php echo form_open_multipart('matericontroller/do_upload');?>
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="upload" /> </form>
	
    </body>
</html>

