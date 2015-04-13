<html>
    <head> 
	<title>Hubungi Kami</title>
    </head>
    <body>    
	<h1>Hubungi Kami</h1>
	<form method="POST" action="<?php echo base_url()?>index.php/hubungi_kami/create">
	<p>email<input type="email" name ="email" title="Email harus valid" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required></p>	
	<p>pesan <input type="text" name ="isi" size="50" ></p>
	<input type="submit" value="Submit" />
	</form>
	
	
    </body>
</html>