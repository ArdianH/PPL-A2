<html>
    <head>
	<title>Rapor</title>
    </head>
    
    <body>
	    <h1>RAPOR</h1> 
		
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD001"> 
                                    Kelas 1</a>
									
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD002">
                                    Kelas 2</a>
									
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD003">
                                    Kelas 3</a>
									
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD004">
                                    Kelas 4</a>
									
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD005">
                                    Kelas 5</a>
									
	<a href="<?php echo base_url() ?>index.php/matericontroller/view/SD006">
                                    Kelas 6</a>
									

	<br>
	<select name ="idMateri" onchange="showCatatan(this.value)">
	<?php foreach($result as $row):?>			
	<option value="<?php echo $row->idMateri ?>" ><?php echo $row->nama ?></option>
	<?php endforeach?>
	</select>
	
	<br>
	<input type='button' onclick='ajaxFunction()' value='GO'/>
	
	<div id='ajaxDiv'>Your result will display here</div>
	
	<!--http://www.w3schools.com/php/php_ajax_database.asp-->
	
	


    </body>
</html>