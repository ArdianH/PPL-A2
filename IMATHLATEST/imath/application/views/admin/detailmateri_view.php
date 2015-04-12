<html>
    <head>
	<title>DETAIL MATERI</title>
    </head>
    
    <body>
    

    <h1> Materi  Kelas <?php $idKelas=$result[0]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2); ?>		</h1>
    		
		<p>
			Nama: <?php $nama=$result[0]->nama; echo $nama; ?>
		</p>
		<p>	
			Deskripsi: <?php $deskripsi=$result[0]->deskripsi; echo $deskripsi; ?>
		</p>
		<p>
			Gambar: <img src="<?php echo base_url();?>uploads/<?php echo $result[0]->gambar ?>">
		</p>
		<p>
			Rangkuman: <?php $rangkuman=$result[0]->rangkuman; echo $rangkuman; ?>
		</p>
	
    </body>
</html>