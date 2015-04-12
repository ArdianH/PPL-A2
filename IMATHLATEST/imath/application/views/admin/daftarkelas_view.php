<html>
    <head>
	<title>Kelas</title>
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus kelas ini? Semua materi kelas juga akan terhapus")) {
			window.location.href = url;
		}		
	}
	</script>
    </head>
    
    <body>
     <a href=" <?php echo base_url();?>admin/daftar_kelas/buatBaru"><button> Buat Baru</button></a>


    <h1> Daftar Kelas </h1>
    <table>
	<thead>
		<td>Kelas</td><td>Deskripsi</td><td>Tindakan</td>
	</thead>
	<?php foreach($result as $row):?>	
	<td>
		<a href="<?php  $idKelas = $row->idKelas; echo base_url()."admin/daftar_materi/view/".$idKelas.'/">'.$idKelas;?></a>
	</td>	
	<td>
		<?php echo $row->deskripsi ?>
	</td>	
	<td>
	<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/detail/<?php echo $row->idKelas ?>">
                                    <button type="submit">Lihat</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/edit/<?php echo $row->idKelas ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->	
	<button type="submit"  onclick="return confirmDelete('<?php echo base_url();?>admin/daftar_kelas/delete/<?php echo $row->idKelas ?>');">Hapus</button>
	</td>
	
	<td>
	<img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>">
	</td>
	<td>
	<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/unggah/<?php echo $row->idKelas ?>">
                                    <button type="submit">Unggah Sertifikat</button></a>
	</td>
		<td>
	<img src="<?php echo base_url();?>uploads/<?php echo $row->sertifikat ?>">
	</td>
        </tr>
    <?php endforeach; ?>
	</table>
    </body>
</html>