<html>
    <head>        
	<title>Target Belajar</title>	
    </head>
    <body>
    <a href=" <?php echo base_url();?>index.php/target_belajar/buatBaru"><button type = "submit"> Buat Baru</button></a>   
    <h1> Target Belajar </h1>
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target nilai <?php echo $row->targetNilai ?>
	 (Dibuat: <?php echo $row->tanggal ?>)
	</td>
	<!-- Done Button-->
	<td>
	<a href="<?php echo base_url() ?>index.php/target_belajar/done/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Done</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>index.php/target_belajar/edit/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url() ?>index.php/target_belajar/delete/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>


	<h1> History </h1>
	<!-- Hapus History-->

	<a href="<?php echo base_url() ?>index.php/target_belajar/hapusHistory">
                                    <button type="submit">Hapus History</button></a>	
	
	 <?php foreach($history as $row):?>	
         <p>Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target <?php echo $row->targetNilai ?>
	 (Dibuat: <?php echo $row->tanggal ?>)
        <p/>
        <?php endforeach; ?>
    </body>
</html>
