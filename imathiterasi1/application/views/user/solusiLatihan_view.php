<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body>
	<h1 align="center">Solusi dan Pembahasan Latihan Materi <?php echo $kelas;?> </h1>
		<br/>
		<br/>
		
		<table align="center">
		<?php 
		echo	'<table>';
		echo	'<tr>';
		echo		'<td> Pertanyaan : <br/>'.$dataSoalTes->pertanyaan.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td> Solusi : '.$dataSoalTes->jawaban.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td> Pembahasan : <br/>'.$dataSoalTes->pembahasan.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td><hr/></td>';
		echo	'</tr>';
		echo	'</table>';
		?>
		
			<tr>
				<td><a href="<?php echo base_url()."index.php/latihan/processSoal"; ?>"> Sudah Mengerti </a></td>
				<td></td>
			</tr>
		</table>
		
</body>
</html>