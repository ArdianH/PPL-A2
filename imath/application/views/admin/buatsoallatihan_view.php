<html>
    <head>        
	<title>Buat soal</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	jQuery(document).ready(function(){
	       function fetchMateri(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/admin/soal_latihan/materi/" + idKelas;
			//~ alert("Hi" + location);
			//var linkJSON = $(location).attr('href',toController);
			$.getJSON(location, function(arrayMateri) {
				var content = '';
				arrayMateri.forEach(function (materi) {
					content += '<option value="' + materi.idMateri + '">' + materi.nama + '</option>';
				});
				$('#idMateri').html(content);
			});
	       }
	       $("#idKelas").change(function() {	
			fetchMateri($("#idKelas").val());
	       });
	       $('#idKelas').change();
	       $
	     });
	</script>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="#">iMath</a>
	      </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">PROFIL ADMIN</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>index.php/">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>index.php/logout">LOG OUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
        <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>    
    <h1>Buat soal </h1> 
	<form method="POST" action="<?php echo base_url()?>index.php/admin/soal_latihan/create" enctype="multipart/form-data">
	Kelas 
		<select id = "idKelas" name="idKelas">
		<?php foreach($Kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idKelas"><?php echo $row->idKelas ?> </option>
		<?php endforeach?>
		</select>
	Materi
		<select id="idMateri" name="idMateri">
		</select>
	<p>pertanyaan<input type="text" name ="pertanyaan"></p>
	<input type="file" name="gambarSoal" id="gambarSoal" size="20" />
	<p>A. <input type="text" name ="optiona"></p>	
	<input type="file" name="gambara" id="gambara" size="20" />
	<p>B. <input type="text" name ="optionb"></p>
	<input type="file" name="gambarb" id="gambarb" size="20" />
	<p>C. <input type="text" name ="optionc"></p>
	<input type="file" name="gambarc" id="gambarc" size="20" />
	<p>D. <input type="text" name ="optiond"></p>
	<input type="file" name="gambard" id="gambard" size="20" />
	<p><select name ="jawaban">		
	<option value="a">A</option>
	<option value="b">B</option>
	<option value="c">C</option>
	<option value="d">D</option>
	</select></p>
	<p>pembahasan<input type="text" name ="pembahasan"></p>
	<input type="file" name="gambarSolusi" id="gambarSolusi" size="20" />	
	<p>
		<input type="submit" name="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/admin/soal_latihan"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>