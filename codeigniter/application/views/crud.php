<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body>
	<h1 align="center" style="color:red">Welcome to CRUD LatihanSoal</h1>
	<?php 	
	echo "<b><center>".$this->session->flashdata("messageAdddata")."</b></center>";
	echo "<b><center>".$this->session->flashdata("messageUpdatedata")."</b></center>";
	echo "<b><center>".$this->session->flashdata("messageDeletedata")."</b></center>";
	if($flag) {
	echo	"<table border='1'>";
	echo		"<tr>";
	echo			"<th>Kode</th>";
	echo			"<th>Kelas</th>";
	echo			"<th>Materi</th>";
	echo			"<th>Tipe</th>";
	echo			"<th>Format</th>";
	echo			"<th>Gambar</th>";
	echo			"<th>Tulisan</th>";
	echo			"<th>Jawaban</th>";
	echo			"<th>Pembahasan</th>";
	echo			"<th>MODIFY DATA</th>";
	echo		"</tr>";
			foreach($data->result_array() as $d) {
	echo			"<tr>";
	echo				"<td>".$d['kode']."</td>";
	echo				"<td>".$d['kelas']."</td>";
	echo				"<td>".$d['materi']."</td>";
	echo				"<td>".$d['tipe']."</td>";
	echo				"<td>".$d['format']."</td>";
	echo				"<td>".$d['gambar']."</td>";
	echo				"<td>".$d['tulisan']."</td>";
	echo				"<td>".$d['jawaban']."</td>";
	echo				"<td>".$d['pembahasan']."</td>";
	echo				"<td align='center'>";
	echo				"<a href =".base_url()."control/redirect_editdata/".$d['kode'].">edit</a>";
	echo				"&nbsp &nbsp &nbsp";
	echo				"<a href =".base_url()."control/deletedata/".$d['kode'].">delete</a>";
	echo				"</td>";
	echo			"</tr>";
			}	
			
	echo	"</table>";
	echo	"<a href = ".base_url()."control/redirect_adddata/>Add Soal</a>";

	}
	?>
	<form method="POST" action= <?php echo base_url()."control/viewdata" ?> >
		<input type="submit" name="submit" value="Tampilkan Semua" /> <br />
		<br />
		<a href = "<?php echo base_url()."control/index"; ?>" > Go Back </a>
	</form>
</body>
</html>