<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
</head>

<body bgcolor="orange">
	<h1 align="center" style="color:red">Silahkan Mengerjakan Tes</h1>
	<form method="POST" action= <?php echo base_url()."tes/processJawaban/" ?> >
	
	<h1>Soal <?php echo $nomor; ?>. </h1>
	<p><?php echo $pertanyaan; ?></p>
	<input type="text" name="jawab" size="30" />
	<input type="hidden" name="idSoal" value=<?php echo $idSoal; ?> />
	<input type="submit" value="Kirim" />
	</form>
</body>
</html>