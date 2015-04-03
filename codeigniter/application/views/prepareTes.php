<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="orange">
	<h1 align="center" style="color:red">Selamat datang di halaman Tes <br> Silahkan pilih kelas</h1>
	
		<table align="center">
			<tr>
				<td>Kelas 1 : </td>
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/1"; ?>'">
					 Click</button>
				</td>
			</tr>	
			<tr>
				<td>Kelas 2 : </td>
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/2"; ?>'">
					 Click</button>
				</td>
			</tr>
			<tr>
				<td>Kelas 3 : </td>
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/3"; ?>'">
					 Click</button>
				</td>
			</tr>
		</table>
		
</body>
</html>