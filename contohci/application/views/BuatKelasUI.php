<html>
    <head>        
	<title>Buat Kelas</title>
	<!--INDAH-->
    </head>
    <body>    
    <h1>Buat Kelas </h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/KelasController/do_upload" enctype="multipart/form-data"> 	
	<p>Kode Kelas<input type="text" name ="idKelas"></p>	
	<p>Deskripsi <input type="text" name ="deskripsi"></p>
	<p>
	</p>
	<input type="file" name="userfile" size="20" />
	<br /><br />
	<input type="submit" value="Submit" /> </form>
	<a href = "<?php echo base_url()?>index.php/KelasController"><button/>Batal</button></a>
	
    </body>
</html>
