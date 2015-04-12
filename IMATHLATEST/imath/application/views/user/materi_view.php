<html>
    <head>        
	<title>Kelas</title>
    </head>
    <body>
    <h1> Kelas </h1>
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	
	<td>
	Materi <?php echo $row->nama ?> 
	</td>
	
	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>/index.php/materi/lihatMateri/<?php echo $row->idMateri ?>">
                                    Lihat Rangkuman Materi</a>
									<!--<button type="submit">Lihat Rangkuman Materi</button></a>-->
	</td>
	
	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>index.php/latihan/retrieveSoal/<?php echo $row->idKelas ?>">
                                    Latihan
									<!--<button type="submit">Latihan</button></a>-->
	</td>
<?php if($this->session->userdata('loggedin')) { ?>
	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>tes/retrieveSoal/<?php echo $row->idKelas ?>">
                                    Tes
									<!--<button type="submit">Latihan</button></a>-->
	</td>
<?php } ?>	




    <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>

