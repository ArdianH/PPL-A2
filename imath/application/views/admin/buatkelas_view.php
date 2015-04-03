<html>
    <head>        
	<title>Buat Kelas</title>
    </head>
    <body>    
    <h1>Buat Kelas </h1> 
	<form method="POST" action="create"> 	
	<p>Kode Kelas<input type="text" name ="idKelas"></p>	
	<p>Deskripsi <input type="text" name ="deskripsi"></p>

	<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Unggah Gambar </label><input type="file" name="gambar" />
	
	
	<p>
		<a href = "<?php echo base_url()?>index.php/admin/daftar_kelas"><button/>Submit</button></a>
	
	</p>
	
	</form>	
	
	</form>
		<a href = "<?php echo base_url()?>index.php/admin/daftar_kelas"><button/>Batal</button></a>
    </body>
</html>
