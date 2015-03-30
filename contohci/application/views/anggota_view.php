<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Anggota</title>
    </head>
    <body>

    <h1> Anggota </h1>
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 Username <?php echo $row->username ?> nama <?php echo $row->namaPanggilan ?> email <?php echo $row->email ?>  password <?php echo $row->password ?>
	 
	</td>

	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>/index.php/anggota/edit/<?php echo $row->username ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url() ?>/index.php/anggota/delete/<?php echo $row->username ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>
