<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="aqua">
	<h1 align="center" style="color:blue">Solusi dan Pembahasan Tes Kelas <?php echo $kelas;?> </h1>
		<br/>
		<br/>
		
		<table align="center">
		<?php 
		foreach($dataSoalTes as $row) {
		echo	'<tr>';
		echo		'<td> Pertanyaan : <br/>'.$row->pertanyaan.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td> Solusi : '.$row->jawaban.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td> Pembahasan : <br/>'.$row->pembahasan.'</td>';
		echo	'</tr>';
		echo	'<tr>';
		echo		'<td><hr/></td>';
		echo	'</tr>';
		}
		?>
		
			<tr>
				<td><a href="<?php echo base_url()."tes/index"; ?>"> << Keluar </a></td>
				<td></td>
			</tr>
		</table>
		
</body>
</html>