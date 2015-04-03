<html>
    <head>
	<title>DETAIL MATERI</title>
    </head>
    
    <body>
    

    <h1> Materi </h1>
    
		<?php $id=$result[0]->idMateri; echo $id; ?>
		<?php $nama=$result[0]->nama; echo $nama; ?>
		<?php $deskripsi=$result[0]->deskripsi; echo $deskripsi; ?>
		<?php $rangkuman=$result[0]->rangkuman; echo $rangkuman; ?>
	
    </body>
</html>