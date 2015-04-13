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
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/SD001"; ?>'">
					 Click</button>
				</td>
			</tr>	
			<tr>
				<td>Kelas 2 : </td>
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/SD002"; ?>'">
					 Click</button>
				</td>
			</tr>
			<tr>
				<td>Kelas 3 : </td>
				<td><button onclick = "location.href = '<?php echo base_url()."tes/retrieveSoal/SD003"; ?>'">
					 Click</button>
				</td>
			</tr>
			<a href=<?php echo base_url()."autentikasi/logout";?> >Logout</a>
		</table>
		
</body>
</html>