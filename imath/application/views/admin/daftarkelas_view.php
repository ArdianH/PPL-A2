<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
    </head>
    <body>  
    <h1> Daftar Kelas </h1>
	<a href=" <?php echo base_url();?>index.php/admin/daftar_kelas/buatBaru"><button> Buat Baru</button></a> 
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 Kelas <?php echo $row->idKelas ?> dengan deskripsi <?php echo $row->deskripsi ?> gambar <?php echo $row->gambar ?>
	</td>
	<!-- Done Button-->
	<td>
	<a href="<?php echo base_url() ?>index.php/admin/daftar_kelas/detail/<?php echo $row->idKelas ?>">
                                    <button type="submit">Detail</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>/index.php/admin/daftar_kelas/edit/<?php echo $row->idKelas ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url()."index.php/admin/daftar_kelas/delete/".$row->idKelas."/" ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>

    </body>
</html>
