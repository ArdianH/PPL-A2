<html>
    <head>        
	<title>Ubah Profil</title>
	<script type="text/javascript">
	  function checkForm(form)
	  {
	    if(form.password.value != "" && form.password.value == form.ulangipassword.value) {
	      return true;
	    }
	    else{
		alert("Password tidak sesuai");
		return false;
	    }
	  }

	</script>
    </head>
    <body>    
    <h1>Ubah Profil 
    <?php $id=$result[0]->username;
    echo $id;?></h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/profil/simpanPerubahan" onsubmit="return checkForm(this)">
	<p>Nama Panggilan:<input type="text" name ="namapanggilan"  value="<?php echo $result[0]->namaPanggilan ;?>"></p>	
	<p>Email: <input type="email" name ="email" value="<?php echo $result[0]->email ;?>"></p>
	<p>Password:<input type="password" name ="password"  value=""></p>
	<p>Ulang Password: <input type="password" name ="ulangipassword" value=""></p>
	<p>Username:<?php echo $result[0]->username;?></p>
	<p>Gender: <?php echo $result[0]->gender;?></p>
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	
    </body>
</html>

