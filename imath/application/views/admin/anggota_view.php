<html>
    <head>        
	<title>Anggota</title>
    </head>
    <body>

    <h1> Anggota </h1>
    <table>
	<thead>
		<td>Username</td>
		<td>Nama</td>
		<td>Email</td>
		<td>Password</td>
		<td>Gender</td>
		<td>Tindakan</td>
	</thead>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 <?php echo $row->username ?>
	</td>	
	<td>
	<?php echo $row->namaPanggilan ?>
	</td>
	<td>
	<?php echo $row->email ?>
	</td>
	<td>
	<?php echo $row->password ?>
	</td>
	<td>
	<?php echo $row->gender ?>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>/index.php/admin/anggota/edit/<?php echo $row->username ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url() ?>/index.php/admin/anggota/delete/<?php echo $row->username ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>
