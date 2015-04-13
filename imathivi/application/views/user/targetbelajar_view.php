<html>
    <head>        
	<title>Target Belajar</title>
	<!--<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>-->
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus target belajar ini?")) {
			window.location.href = url;
		}		
	}
	</script>
    </head>
    <body onload="getNamaMateri()">
    <a href=" <?php echo base_url();?>index.php/target_belajar/buatBaru"><button type = "submit"> Buat Baru</button></a>   
    <h1> Target Belajar </h1>
    <table>
	<?php 
	for($i = 0; $i < $tbRow; $i++)
	{?>
	<tr>
	<td>	
	
	 Menyelesaikan <?php echo $result[$i]->banyakSoal ?> soal latihan materi <?php echo $materi[$i]->nama?> 
	 kelas <?php $idKelas = $result[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?>  dengan target nilai <?php echo $result[$i]->targetNilai?>
	 (Dibuat: <?php echo $result[$i]->tanggal ?>)
	</td>
	<!-- Done Button-->
	<td>
	<a href="<?php echo base_url() ?>index.php/target_belajar/done/<?php echo $result[$i]->idTargetBelajar ?>">
                                    <button type="submit">Done</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>index.php/target_belajar/edit/<?php echo $result[$i]->idTargetBelajar ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<button type="submit"  onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/delete/<?php echo $result[$i]->idTargetBelajar ?>');">Hapus</button>
	</td>
        <tr>
	<?php }?>	
	        
	</table>


	<h1> History </h1>
	<!-- Hapus History-->

	<button type="submit" onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/hapusHistory');">Hapus History</button>
	
	<?php 
	for($i = 0; $i < $historyRow; $i++)
	{?>
         <p>Menyelesaikan <?php echo $history[$i]->banyakSoal ?> soal latihan materi <?php echo $materiHistory[$i]->nama?>
	 kelas <?php $idKelas = $history[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?> 
	 dengan target nilai <?php echo $history[$i]->targetNilai?>
	 (Dibuat: <?php echo $history[$i]->tanggal ?>)
        <p/>
        <?php } ?>
    </body>
</html>