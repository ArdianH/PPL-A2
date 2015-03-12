<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="gold">
	<h1 align="center" style="color:red"> Form Add LatihanSoal</h1>
	<form method="POST" action= <?php echo base_url()."control/adddata"; ?> >
	
		<table align="center">
			<tr>
				<td>Kelas : </td>
				<td><input type="text" name="kelas" size="5" required/></td>
			</tr>
			<tr>
				<td>Materi : </td>
				<td><input type="text" name="materi" size="25" required/></td>
			</tr>
			<tr>
				<td>Tipe : </td>
				<td><input type="text" name="tipe" size="10" required/></td>
			</tr>
			<tr>
				<td>Format : </td>
				<td><input type="text" name="format" size="10" required/></td>
			</tr>
			<tr>
				<td>Gambar : </td>
				<td><textarea name="gambar" height="4" width="35"></textarea></td>
			</tr>
			<tr>
				<td>Tulisan : </td>
				<td><textarea name="tulisan" height="8" width="35"></textarea></td>
			</tr>
			<tr>
				<td>Jawaban : </td>
				<td><textarea name="jawaban" height="4" width="35" required></textarea></td>
			</tr>
			<tr>
				<td>Pembahasan : </td>
				<td><textarea name="pembahasan" height="8" width="35" required></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"/>
			</tr>
			<tr>
				<td><a href="<?php echo base_url()."control/redirect_viewdata"; ?>"> Go Back </a></td>
				<td></td>
			</tr>
		</table>
		
	</form>
</body>
</html>