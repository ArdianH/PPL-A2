<html>
    <head>        
	<title>Data Anggota</title>
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus materi ini?")) {
			window.location.href = url;
		}		
	}
	</script>
    </head>
    <body>

    <h1> Data Anggota </h1>
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
	<button type="submit" onclick="confirmDelete('<?php echo base_url() ?>/index.php/admin/anggota/delete/<?php echo $row->username ?>')">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>
