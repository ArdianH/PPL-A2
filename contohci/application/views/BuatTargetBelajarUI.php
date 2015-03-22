<html>
    <head>        
	<title>Buat Target Belajar</title>
    </head>
    <body>    
    <h1>Buat Target Belajar </h1> 
	<form method="POST" action="buatTargetBelajar/create"> 	
	<p>username<input type="text" name ="username"></p>	
	<p>Kelas 
		<select>
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idkelas" onclick="pilihKelas()"><?php echo $row->idKelas ?> </option>
		<?php endforeach?>
		</select>
	<p>Materi <input type="text" name ="idmateri"></p>
	<p>BanyakSoal <input type="text" name ="banyaksoal"></p>
	<p>Nilai <input type="text" name ="targetnilai"></p>	
	<p>
		<input type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/TargetBelajarController"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>

