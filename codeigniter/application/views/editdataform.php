<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="gold">
	<h1 align="center" style="color:red"> Form Edit LatihanSoal</h1>
	<form method="POST" action= <?php echo base_url()."control/editdata"; ?> >
	
		<table align="center">
			<tr>
				<td>Kode : </td>
				<td><input type="text" name="kode" size="5" value="<?php echo $kode;?>" readonly /></td>
			</tr>		
			<tr>
				<td>Kelas : </td>
				<td><input type="text" name="kelas" size="5" value="<?php echo $kelas;?>" required/></td>
			</tr>
			<tr>
				<td>Materi : </td>
				<td><input type="text" name="materi" size="25" value="<?php echo $materi;?>" required/></td>
			</tr>
			<tr>
				<td>Tipe : </td>
				<td><input type="text" name="tipe" size="10" value="<?php echo $tipe;?>" required/></td>
			</tr>
			<tr>
				<td>Format : </td>
				<td><input type="text" name="format" size="10" value="<?php echo $format;?>" required/></td>
			</tr>
			<tr>
				<td>Gambar : </td>
				<td><textarea name="gambar" height="4" width="35"> <?php echo $gambar; ?> </textarea></td>
			</tr>
			<tr>
				<td>Tulisan : </td>
				<td><textarea name="tulisan" height="8" width="35"> <?php echo $tulisan; ?> </textarea></td>
			</tr>
			<tr>
				<td>Jawaban : </td>
				<td><textarea name="jawaban" height="4" width="35" required> <?php echo $jawaban;?> </textarea></td>
			</tr>
			<tr>
				<td>Pembahasan : </td>
				<td><textarea name="pembahasan" height="8" width="35" required> <?php echo $pembahasan;?> </textarea></td>
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