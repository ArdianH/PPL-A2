<html>
    <head>        
	<title>Buat Target Belajar</title>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	jQuery(document).ready(function(){
	       function fetchMateri(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/target_belajar/materi/" + idKelas;
			//~ alert("Hi" + location);
			//var linkJSON = $(location).attr('href',toController);
			$.getJSON(location, function(arrayMateri) {
				var content = '';
				arrayMateri.forEach(function (materi) {
					content += '<option value="' + materi.idMateri + '">' + materi.nama + '</option>';
				});
				$('#pilihmateri').html(content);
			});
	       }
		$("#pilihkelas").change(function() {	
			fetchMateri($("#pilihkelas").val());
	       });
	       $('#pilihkelas').change();
	     });
	</script>
    </head>
    <body>    
    <h1>Buat Target Belajar </h1> 
	<form method="POST" action="create"> 	
	<p>username<input type="text" name ="username"></p>	
	Kelas 
		<select id = "pilihkelas">
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idkelas"><?php echo $row->idKelas ?> </option>
		<?php endforeach?>
		</select>
	Materi
		<select id="pilihmateri">
		</select>
	<p>Banyak Soal <input type="text" name ="banyaksoal"></p>
	<p>Nilai <input type="text" name ="targetnilai"></p>	
	<p>
		<input type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/target_belajar"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>

