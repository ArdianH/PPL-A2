<html>
    <head>        
	<title>Ubah Target Belajar</title>	
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/imath.css">
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
    <h1>Ubah Target Belajar </h1> 
    <?php $id=$result[0]->idTargetBelajar;
    echo $id;?>
	<form id="ubahtargetbelajar" method="POST" action="<?php echo base_url()?>index.php/target_belajar/simpanPerubahan/<?php echo $id?>" onsubmit="return confirm('Kamu yakin ingin mengubah target belajar ini?');">
	<p>username<input type="text" name ="username" value="<?php echo $result[0]->username ;?>"></p>
	Kelas 
		<select name = "kelas" id = "pilihkelas" onchange="showMateri(this.value)">
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idkelas" <?php $idKelas=$row->idKelas; $kelasSelected = $result[0]->idKelas; if ($idKelas == $kelasSelected) echo "selected";?>><?php echo $row->idKelas ?> </option>		
		<?php endforeach?>		
		</select>
		
	Materi
		<select id="pilihmateri" name ="idmateri">
		</select>
	<p>BanyakSoal <input type="text" name ="banyaksoal"  value="<?php echo $result[0]->banyakSoal ;?>"></p>
	<p>Nilai <input type="text" name ="targetnilai" value="<?php echo $result[0]->targetNilai ;?>"></p>	
	<p>
		<input type="submit" value="Submit" />
	</p>
	
	</form>
	<a href="<?php echo base_url() ?>index.php/target_belajar"><button>Batal</button></a>
    </body>
</html>