<html>
    <head>        
	<title>Ubah Anggota</title>
    </head>
    <body>    
    <h1>Ubah Data <?php $id=$result[0]->username;
    echo $id;?></h1> 
   
	<form method="POST" action="<?php echo base_url()?>index.php/admin/anggota/simpanPerubahan/<?php echo $id?>">
	<p>Username: <input type="text" name ="username" value="<?php echo $result[0]->username ;?>"></p>
	<p>Nama Panggilan: <input type="text" name ="namaPanggilan"  value="<?php echo $result[0]->namaPanggilan ;?>"></p>
	<p>Email: <input type="email" name ="email"  value="<?php echo $result[0]->email ;?>"></p>
	<p>Password: <input type="password" name ="password"  value="<?php echo $result[0]->password ;?>"></p>
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>

