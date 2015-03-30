<html>
    <head>        
	<title>Ubah Anggota</title>
    </head>
    <body>    
    <h1>Ubah Anggota </h1> 
    <?php $id=$result[0]->username;
    echo $id;?>
	<form method="POST" action="<?php echo base_url()?>index.php/anggota/simpanPerubahan/<?php echo $id?>">
	<p>username<input type="text" name ="username" value="<?php echo $result[0]->username ;?>"></p>
	<p>password <input type="text" name ="password"  value="<?php echo $result[0]->password ;?>"></p>

	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>

