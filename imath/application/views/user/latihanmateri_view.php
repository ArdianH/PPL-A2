<html>
    <head>        
	<title>Latihan</title>
    </head>
	
    <body>

    <h1> Latihan Soal Materi </h1>

	
    <table>
	<?php foreach($result as $row):?>
	
	<tr>
	<td>
	Soal 1
	</td>
	</tr>
	
	<tr>
	<td>
	<?php echo $row->pertanyaan ?>	
	</td>
	</tr>
	
	<?php endforeach; ?>
	</table>
	
	
	
    <table>
	<?php foreach($hasil as $row):?>
	
	<tr>
	<td>
	<?php echo $row->deskripsi ?>	
	</td>
	</tr>
	
	<?php endforeach; ?>
	</table>

    </body>
</html>