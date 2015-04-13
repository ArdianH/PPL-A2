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

<body bgcolor="aqua">
	<h1 align="center" style="color:blue">Detail nilai Tes</h1>
		<br/>
		<br/>

		<table align="center">
			<tr>
				<td><?php echo "Hello".$namaPanggilan; ?></td>
				<td></td>
			</tr>
			<tr>
				<td>Nilai Tes kelas <?php echo $kelas; ?> : </td>
				<td><?php echo $skor; ?></td>
			</tr>
			<tr>
				<td>Jumlah Benar <?php echo $jumlahBenar; ?> : </td>
				<td>Jumlah Salah <?php echo $jumlahSalah; ?></td>
			</tr>	
			<tr>
				<td></td>
				<td><button onclick="location.href = '<?php echo base_url()."tes/solusiTes/".$kelas."/"; ?>'; localClear()">
					 Lihat Solusi dan Pembahasan Tes</button>
				</td>
			</tr>
			<tr>
				<td><a href= "<?php echo base_url()."tes/keluarTes"; ?>" onclick="localClear()"> << Keluar Tes </a></td>
				<td></td>
			</tr>	
		</table>
		
</body>
</html>