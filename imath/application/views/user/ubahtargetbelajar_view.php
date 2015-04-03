<html>
    <head>        
	<title>Ubah Target Belajar</title>
	<!--<script src="<?php echo base_url(); ?>/assets/js/dropdown_script.js"></script>-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/imath.css">
    </head>
    <body>    
    <h1>Ubah Target Belajar </h1> 
    <?php $id=$result[0]->idTargetBelajar;
    echo $id;?>
	<form method="POST" action="<?php echo base_url()?>index.php/target_belajar/simpanPerubahan/<?php echo $id?>">
	<p>username<input type="text" name ="username" value="<?php echo $result[0]->username ;?>"></p>
	Kelas 
		<select name = "kelas" id = "pilihkelas" onchange="showMateri(this.value)">
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idkelas"><?php echo $row->idKelas ?> </option>
		<?php endforeach?>		
		</select>
		
	<div id="txtHint"><b>Person info will be listed here...</b></div>
	<p>Materi <input type="text" name ="idmateri" value="<?php echo $result[0]->idMateri ;?>"></p>
	<p>BanyakSoal <input type="text" name ="banyaksoal"  value="<?php echo $result[0]->banyakSoal ;?>"></p>
	<p>Nilai <input type="text" name ="targetnilai" value="<?php echo $result[0]->targetNilai ;?>"></p>	
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>