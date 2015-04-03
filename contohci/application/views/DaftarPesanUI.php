<html>
    <head>
	<!--INDAH-->
        <!--<title><?=$page_title?></title>-->
	<title>Pesan</title>
    </head>
    <body>  
    <h1> Daftar Pesan </h1>
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 pesan dengan ID <?php echo $row->idPesan ?> dari email <?php echo $row->email?> isi pesan : <?php echo $row->isi ?>
	</td>

	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url()."index.php/PesanController/delete/".$row->idPesan."/" ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>