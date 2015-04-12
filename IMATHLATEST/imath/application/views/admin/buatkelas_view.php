<html>
    <head>        
	<title>Buat Kelas</title>
    </head>
    <body>    
    <h1>Buat Kelas</h1> 
    <?php echo $this->session->flashdata('duplicatePrimaryKeyKelas'); ?>
	<form method="POST" action="<?php echo base_url()?>index.php/admin/daftar_kelas/create" enctype="multipart/form-data"> 	
	 <p>Kelas <select name ="idKelas">	 
		<option value="SD001">SD 1</option>
		<option value="SD002">SD 2</option>
		<option value="SD003">SD 3</option>
		<option value="SD004">SD 4</option>
		<option value="SD005">SD 5</option>
		<option value="SD006">SD 6</option>	
	</select>
	<p>Deskripsi :</p>
		<textarea name ="deskripsi" rows="15" cols="50"><?php echo $result[0]->deskripsi ;?></textarea>
	<br/>
	<br/>
	<p>
	</p>
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="Submit" /> </form>
	<a href = "<?php echo base_url()?>index.php/admin/daftar_kelas"><button/>Batal</button></a>
	
    </body>
</html>

