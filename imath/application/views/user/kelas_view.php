<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
    </head>
	
    <body>
	
    <h1> Kelas </h1>
	<table>
	<?php foreach($result as $row):?>	
	<tr>
		<td>
			Kelas <?php echo $row->idKelas ?> 
		</td>

	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>/index.php/materi/pilih/<?php echo $row->idKelas ?>">
                              <img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>">
	</a>
	</td>

    </tr>
    
	<?php endforeach; ?>
	</table>

    </body>
</html>
