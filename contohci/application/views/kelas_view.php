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
	 Kelas <?php echo $row->nama ?> 
	</td>

	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>/index.php/materi/pilih/<?php echo $row->idKelas ?>">
                                    <button type="submit">Pilih</button></a>
	</td>

    </tr>
    
	<?php endforeach; ?>
	</table>

    </body>
</html>
