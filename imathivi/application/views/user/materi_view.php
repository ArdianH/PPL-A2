<html>
    <head>        
	<title>Materi</title>
    </head>
    <body>
    <!--<a href=" <?php echo base_url();?>index.php/buatTargetBelajar"><button> Buat Baru</button></a>   -->
    <h1> Materi </h1>
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
	<a href="<?php echo base_url() ?>/index.php/materi/latihanMateri/<?php echo $row->idMateri ?>"
	"<?php echo base_url() ?>/index.php/materi/jawaban/<?php echo $row->idMateri ?>"
	>
                                    Latihan
									<!--<button type="submit">Latihan</button></a>-->
	</td>
	




    <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>

