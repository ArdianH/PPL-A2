<html>
    <head>        
	<title>Ubah Target Belajar</title>
    </head>
    <body>    
    <h1>Ubah Target Belajar </h1> 
    <?php $id=$result[0]->idTargetBelajar;
    echo $id;?>
	<form method="POST" action="<?php echo base_url()?>index.php/TargetBelajarController/simpanPerubahan/<?php echo $id?>">
	<p>username<input type="text" name ="username" value="<?php echo $result[0]->username ;?>"></p>
	<p>Kelas <input type="text" name ="idkelas"  value="<?php echo $result[0]->idKelas ;?>"></p>
	<p>Materi <input type="text" name ="idmateri" value="<?php echo $result[0]->idMateri ;?>"></p>
	<p>BanyakSoal <input type="text" name ="banyaksoal"  value="<?php echo $result[0]->banyakSoal ;?>"></p>
	<p>Nilai <input type="text" name ="targetnilai" value="<?php echo $result[0]->targetNilai ;?>"></p>	
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>

