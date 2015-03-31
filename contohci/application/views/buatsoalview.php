<html>
    <head>        
	<title>Buat soal</title>
    </head>
    <body>    
    <h1>Buat soal </h1> 
	<form method="POST" action="soalcontroller/create">
	<select name ="idKelas">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	</select>
	<select name ="idMateri">
	<?php foreach($Materi as $row):?>			
	<option value="<?php echo $row->idMateri ?>" ><?php echo $row->idMateri ?></option>
	<?php endforeach?>
	</select>	
	<p>pertanyaan<input type="text" name ="pertanyaan"></p>
	<p>gambar<input type="file" name="gambar" >
	<p>optiona<input type="text" name ="optiona"></p>
	<p>gambar<input type="file" name="gambara" >
	<p>optionb<input type="text" name ="optionb"></p>
	<p>gambar<input type="file" name="gambarb" >
	<p>optionc<input type="text" name ="deskripsi"></p>
	<p>gambar<input type="file" name="gambarc" >
	<p>optiond<input type="text" name ="deskripsi"></p>
	<p>gambar<input type="file" name="gambard" >
	<p><select name ="jawaban">		
	<option value="a">A</option>
	<option value="b">B</option>
	<option value="c">C</option>
	<option value="d">D</option>
	</select></p>
	<p>pembahasan<input type="text" name ="deskripsi"></p>
	
	<p>
		<input type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/soalcontroller"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>