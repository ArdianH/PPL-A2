<html>
    <head>        
	<title>Kelas</title>
    </head>
    <body>  

		<h1> Kelas <?php $idKelas=$result[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?></h1>		
		<p>	
			Deskripsi: <?php $deskripsi=$result[0]->deskripsi; echo $deskripsi; ?>
		</p>
		<p>
			Gambar: <img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>">
		</p>		
	
	
		<!-- Hapus Button-->
		<a href="<?php echo base_url()."index.php/admin/daftar_kelas/"?>"><button>Kembali</button></a>
    </body>
</html>