<html>
    <head>        
	<title>Materi</title>
    </head>
	
    <body>

    <h1> Materi </h1>
	
    <table>
	<?php foreach($result as $row):?>
	<tr>
	
	<td>
	<p> Materi: <?php echo $row->idMateri ?> </p>
	<p> Nama: <?php echo $row->nama ?>	</p>
	<p> Deskripsi: <?php echo $row->deskripsi ?> </p>
	<p> Rangkuman: <?php echo $row->rangkuman ?> </p>	
	<p> --Link <?php echo $row->gambar ?> </p>
	</td>	
	
    </tr>
	<?php endforeach; ?>
	</table>

    </body>
</html>