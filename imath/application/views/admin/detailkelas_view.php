<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
    </head>
    <body>  
		<?php foreach($result as $row):?>
    <h1> Kelas <?php echo $row->idKelas?> SD</h1>
    <table>
	
	<tr>
	<td>
	 Deskripsi : <?php echo $row->deskripsi?>
	</td>


        <tr>
        <?php endforeach; ?>
	</table>
	
		<!-- Hapus Button-->
	<a href="<?php echo base_url()."index.php/KelasController/"?>">
                                    <button type="submit">Kembali</button></a>

    </body>
</html>