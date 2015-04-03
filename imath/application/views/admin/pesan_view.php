<html>
    <head>
	<title>Daftar Pesan</title>
    </head>
    <body>    
    <h1> Pesan </h1>
    <table>
	<thead>
		<tr>
			<th>Email</th>			
			<th>Pesan</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 <?php echo $row->email?>
	</td>
	<!-- Done Button-->
	<td>
	<p><?php echo $row->tanggal?></p>
	<?php echo $row->isi?> 
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url() ?>/index.php/admin/pesan/delete/<?php echo $row->idPesan?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>
	</body>
</html>