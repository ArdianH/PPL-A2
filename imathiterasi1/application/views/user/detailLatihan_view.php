<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
	<script>
		function clearLocal(){
			window.localStorage.clear();
		}
	</script>
</head>

<body>



	<h1 align="center">Selamat, kamu telah menyelesaikan materi <?php echo $kelas; ?> !</h1>
		<br/>
		<br/>

		<table align="center">
			<tr>
				<td>Soal :</td>
				<td><?php echo $skor/10; ?> Benar <?php echo 10-($skor/10); ?> Salah</td>			

			</tr>
			<tr>
				<td>Waktu :</td>
				<td><?php echo floor($waktuTes/60)." menit ".($waktuTes%60)." detik"; ?></td>
			</tr>
			<tr>
				<td>Nilai Latihan Materi : </td>
				<td><?php echo $skor; ?></td>
			</tr>	
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><a href= "<?php echo base_url()."index.php/latihan/keluarTes"; ?>" onclick="localClear()"> OK </a></td>
				<td></td>
			</tr>	
		</table>
		
</body>
</html>