<html>
    <head>
	<title>Kelas</title>
    </head>
    
    <body>
     <a href=" <?php echo base_url();?>index.php/admin/daftar_kelas/buatBaru"><button> Buat Baru</button></a>

    <h1> Daftar Kelas </h1>
    <table>
	<thead>
		<td>Materi</td><td>Deskripsi</td><td>Tindakan</td>
	</thead>
	<?php foreach($result as $row):?>	
	<td>
		<?php echo $row->idKelas ?>
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
	<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/delete/<?php echo $row->idKelas ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
	<td>
	<img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>">
	</td>
        </tr>
    <?php endforeach; ?>
	</table>
    </body>
</html>