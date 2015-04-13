<html>
    <head>
	<title>Rapor</title>
    </head>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#pilihmateri").change(function(){
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
			var location = baseUrl + "/index.php/rapor/hasil/1/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			$.get(location, function(data, status){
				//alert("Data: " + data + "\nStatus: " + status);				
				$('#number').html(data); //isi id = "number" dengan data
			});
		});
		$('#pilihmateri').change();
	});     
	</script>
    <body>
	    <h1>RAPOR</h1> 		
		<form method="GET" action="" >
		<?php foreach($kelas_model as $row):?>			
		<a href="<?php echo base_url() ?>index.php/rapor/view/<?php echo $row->idKelas?>"> <?php echo $row->idKelas ?></a>		
		<?php endforeach?>
		<input id="pilihkelas" type="hidden" name="idKelas" value="<?php 
			$url=current_url();
			$arr = explode("/",$url);
			$length = count($arr);
			echo $arr[$length - 1];			
		?>">
	<br>
		<select name ="idMateri" id="pilihmateri">
		<?php foreach($result as $row):?>			
		<option value="<?php echo $row->idMateri; ?>" ><?php echo $row->nama ?></option>
		<?php endforeach?>
		</select>
	
	<br>			
	</form>
	<h1>Ringkasan</h1>
	<p>Total Latihan: <span id="number"></span></p>
	<p>Rata-rata Nilai: <span id="rata-rata"></span></p>
    </body>
</html>