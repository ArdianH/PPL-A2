<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Target Belajar</title>
    </head>
    <body>
    <a href=" <?php echo base_url();?>index.php/buatTargetBelajar"><button> Buat Baru</button></a>   
    <h1> Target Belajar </h1>
    <table>
	<?php foreach($result as $row):?>	
	<tr>
	<td>
	 Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target <?php echo $row->targetNilai ?>
	 (Dibuat: <?php echo $row->tanggal ?>)
	</td>
	<!-- Done Button-->
	<td>
	<a href="<?php echo base_url() ?>index.php/TargetBelajarController/done/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Done</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>/index.php/TargetBelajarController/edit/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url() ?>/index.php/TargetBelajarController/delete/<?php echo $row->idTargetBelajar ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        <tr>
        <?php endforeach; ?>
	</table>


	<h1> History </h1>
	<!-- Hapus History-->
	<form method = "post" action = "../../index.php/deleteTargetBelajar">
	<button type = "submit">Hapus History</button>
	</form>
	
	 <?php foreach($history as $row):?>	
         <p>Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target <?php echo $row->targetNilai ?>
	 (Dibuat: <?php echo $row->tanggal ?>)
        <p/>
        <?php endforeach; ?>
    </body>
</html>
