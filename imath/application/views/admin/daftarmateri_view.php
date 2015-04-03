<html>
    <head>
	<title>MATERI</title>
    </head>
    
    <body>
     <a href=" <?php echo base_url();?>index.php/admin/daftar_materi/createview"><button> Buat Baru</button></a>

    <form method="POST" action="<?php echo base_url();?>index.php/admin/daftar_materi/viewMateri">
    <select name ="idKelas">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	</select>
	<input type="submit" value="Submit" />
	</form>

    <h1> Daftar Materi </h1>
    <table>
	<?php foreach($result as $row):?>	
	<td>
		<?php echo $row->idMateri ?>
	</td>
	<td>
		<?php echo $row->nama ?>
	</td>
	<td>
		<?php echo $row->deskripsi ?>
	</td>
	<td>
		<?php echo $row->rangkuman ?>
	</td>
	<td>
	<a href="<?php echo base_url();?>index.php/admin/daftar_materi/detail/<?php echo $row->idMateri ?>">
                                    <button type="submit">Lihat</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url();?>index.php/admin/daftar_materi/edit/<?php echo $row->idMateri ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url();?>index.php/admin/daftar_materi/delete/<?php echo $row->idMateri ?>">
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