<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body>
	<h1 align="center" style="color:red">Welcome to CRUD LatihanSoal</h1>
	<?php 
	if($flag) {
		<table border="1">
			<tr>
				<th>Kode</th>
				<th>Kelas</th>
				<th>Materi</th>
				<th>Tipe</th>
				<th>Format</th>
				<th>Gambar</th>
				<th>Tulisan</th>
				<th>Jawaban</th>
				<th>Pembahasan</th>
				<th>MODIFY DATA</th>
			</tr>
			foreach($data as $d) {
				<tr>
					<td> $d['kode'] </td>
					<td> $d['kelas'] </td>
					<td> $d['materi'] </td>
					<td> $d['tipe'] </td>
					<td> $d['format'] </td>
					<td> $d['gambar'] </td>
					<td> $d['tulisan'] </td>
					<td> $d['jawaban'] </td>
					<td> $d['pembahasan'] </td>
					<td>
					<a href ="base_url().index.php/control/edit_data/$d['kode']">edit</a>
					<a href ="base_url().index.php/control/delete_data/$d['kode']">delete</a>
					</td>
				</tr>
			}	
			
		</table>
		<a href = "base_url().index.php/control/add_data/">Add Soal</a>
	}
	?>
	<form method="POST" action= <?php echo base_url()."index.php/control/viewdata" ?> >
		<input type="submit" name="submit" value="Tampilkan Semua" />		
	</form>
</body>
</html>