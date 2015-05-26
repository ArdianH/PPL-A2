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
			var location = baseUrl + "/index.php/admin/soal_tes/materi/" + idKelas;
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
 <!--========================== ADMIN NAVBAR ============================-->
    	<nav class="navbar navbar-default navbar-static-top">
		<div class="container" id="navbar">
			<div class="navbar-header" id="logobar">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>index.php">
					<img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";>
				</a>
			</div>
		<!-- Navbar Atas -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url()?>admin/dashboard"> DASHBOARD </a></li>
				<li><a href="<?php echo base_url()?>"> BERANDA</a></li>
				<li><a href="<?php echo base_url()?>autentikasi/logout"> LOG OUT </a></li>	
			</ul>
		</div>	<!--/.nav-collapse -->
	</div>      	
	
	<div class="container" id="iconbar">
        
		<ul class="navbar-nav navbar-left">
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_kelas">KELAS</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_materi">MATERI</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_latihan">SOAL LATIHAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_tes">SOAL TES</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/anggota">DATA ANGGOTA</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/pesan">PESAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/lain_lain">LAIN-LAIN</a></li>
		</ul>
	</div>
	
</nav>
 <!--======================= END OF ADMIN NAVBAR ============================-->
    <div class="container contents">
	    <h1>Buat soal </h1> 
		<form class="formImath" method="POST" action="<?php echo base_url()?>index.php/admin/soal_tes/create" enctype="multipart/form-data">
		Kelas 
			<select id = "idKelas" name="idKelas">
			<?php foreach($Kelas as $row):?>			
			<option value="<?php echo $row->idKelas?>" name ="idKelas" <?php if($row->idKelas == $currentKelas) echo "selected";?>><?php echo $row->idKelas ?> </option>
			<?php endforeach?>
			</select>
		Materi
			<select id="idMateri" name="idMateri">
			</select></br></br>
		<label>Pertanyaan</label></br><textarea name ="pertanyaan" required></textarea></br>
		<input type="file" name="gambarSoal" id="gambarSoal" size="20" /></br></br>
		<label>A.  </label><input type="text" name ="optiona" required></br>	
		<input type="file" name="gambara" id="gambara" size="20" /></br></br>
		<label>B.  </label><input type="text" name ="optionb" required></br>
		<input type="file" name="gambarb" id="gambarb" size="20" /></br></br>
		<label>C.  </label><input type="text" name ="optionc" required></br>
		<input type="file" name="gambarc" id="gambarc" size="20" /></br></br>
		<label>D.  </label><input type="text" name ="optiond" required></br>
		<input type="file" name="gambard" id="gambard" size="20" /></br></br>
		<label>Jawaban</label></br><select name ="jawaban">		
		<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
		<option value="d">D</option>
		</select></br></br>
		<label>Pembahasan</label></br><textarea name ="pembahasan" required></textarea></br></br>
		<input type="file" name="gambarSolusi" id="gambarSolusi" size="20" />	
		</br></br>
		<label>Apakah soal tes ini akan ditampilkan?</label>
		</br>
		<input type="radio" name="isDitunjukkan" value ="ya"> Ya
		<input type="radio" name="isDitunjukkan" value ="tidak" required> Tidak
		</br></br>
			<input class="asButton" type="submit" name="submit" value="Simpan" />
		
			<a href = "<?php echo base_url()?>admin/soal_tes/daftar_soal/<?php echo $currentKelas?>"><input type ="button" class="rdButton" value = "Batal"/></a>
			</form>
	</div>

	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>           
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p class="footerColor">Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	</footer>
    </body>
</html>