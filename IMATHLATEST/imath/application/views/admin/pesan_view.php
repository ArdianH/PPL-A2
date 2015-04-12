<html>
    <head>
	<title>Daftar Pesan</title>
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus kelas ini? Semua materi kelas juga akan terhapus")) {
			window.location.href = url;
		}		
	}
	</script>
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
	<button type="submit"  onclick="return confirmDelete('<?php echo base_url() ?>/index.php/admin/pesan/delete/<?php echo $row->idPesan?>');">Hapus</button>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>
	</body>
</html>