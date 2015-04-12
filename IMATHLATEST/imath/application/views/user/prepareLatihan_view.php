<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body>
	<h1 align="center">Soal Latihan<br> Silahkan pilih materi</h1>
	
		<table align="center">
			<tr>
				<td>Materi Penjumlahan </td>
				<td><button onclick = "location.href = '<?php echo base_url()."latihan/retrieveSoal/1"; ?>'">
					 Click</button>
				</td>
			</tr>	
			<tr>
				<td>Materi X </td>
				<td><button onclick = "location.href = '<?php echo base_url()."latihan/retrieveSoal/2"; ?>'">
					 Click</button>
				</td>
			</tr>
			<tr>
				<td>Materi Y </td>
				<td><button onclick = "location.href = '<?php echo base_url()."latihan/retrieveSoal/3"; ?>'">
					 Click</button>
				</td>
			</tr>
		</table>
		
</body>
</html>