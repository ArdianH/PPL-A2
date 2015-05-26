<html>
    <head>        
	<title>Ubah soal</title>
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
          var currentMateri = <?php echo $currentMateri ?>;
          if (materi.idMateri == currentMateri)
          {
            content += '<option value="' + materi.idMateri + '" selected>' + materi.nama +'  </option>';
          }
          else
          {
            content += '<option value="' + materi.idMateri + '">' + materi.nama +'</option>';
          }
          
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
				<li><a href="<?php echo base_url()?>"> BERANDA iMATH </a></li>
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
      <h1>Ubah soal </h1>
      <form class="formImath" method="POST" action="<?php echo base_url()?>index.php/admin/soal_latihan/simpanPerubahan/<?php echo $soal[0]->idSoal ?>" 
        onsubmit="return confirm('Kamu yakin ingin mengubah soal ini?');" enctype="multipart/form-data">
      Kelas 
        <select id = "idKelas" name="idKelas">
        <?php foreach($Kelas as $row):?>      
        <option value="<?php echo $row->idKelas?>" name ="idKelas" <?php if($row->idKelas == $currentKelas) echo "selected";?>>
          <?php echo substr($row->idKelas, 0, 2).' '.substr($row->idKelas, 4, 5) ?>
        </option>
        <?php endforeach?>
        </select>
      Materi
        <select id="idMateri" name="idMateri">
        </select></br></br>
      <label>Pertanyaan</label></br><textarea name ="pertanyaan" required><?php echo $soal[0]->pertanyaan ;?></textarea>
            <input type="file" name="gambarSoal" id="gambarSoal" size="20" /></br>
      <label>A.  </label><input type="text" name ="optiona" value="<?php echo $pilihanJawaban[0]->deskripsi ;?>" required></input>
      <input type="file" name="gambara" id="gambara" size="20" /></br></br>
      <label>B.  </label><input type="text" name ="optionb" value="<?php echo $pilihanJawaban[1]->deskripsi ;?>" required>
      <input type="file" name="gambarb" id="gambarb" size="20" /></br></br>
      <label>C.  </label><input type="text" name ="optionc" value="<?php echo $pilihanJawaban[2]->deskripsi ;?>" required>
      <input type="file" name="gambarc" id="gambarc" size="20" /></br></br>
      <label>D.  </label><input type="text" name ="optiond" value="<?php echo $pilihanJawaban[3]->deskripsi ;?>" required>
      <input type="file" name="gambard" id="gambard" size="20" /></br>
      <label>Jawaban</label>
      <select name ="jawaban">
      <option value="a" <?php $jawabanBenar = $soal[0]->jawaban; if($jawabanBenar=="a") echo "selected"?>>A</option>
      <option value="b" <?php $jawabanBenar = $soal[0]->jawaban; if($jawabanBenar=="b") echo "selected"?>>B</option>
      <option value="c" <?php $jawabanBenar = $soal[0]->jawaban; if($jawabanBenar=="c") echo "selected"?>>C</option>
      <option value="d" <?php $jawabanBenar = $soal[0]->jawaban; if($jawabanBenar=="d") echo "selected"?>>D</option>        
      </select></br>
      <label>Pembahasan</label></br><textarea name ="pembahasan" required><?php echo $soal[0]->pembahasan ?></textarea></br>
      <input type="file" name="gambarSolusi" id="gambarSolusi" size="20" /> </br></br>
        <input class="asButton"type="submit" name="submit" value="Simpan" />
        <a href = "<?php echo base_url()?>index.php/admin/soal_latihan/show/<?php echo $currentMateri?>"><input type = "button"class="rdButton" value="Batal"/></a>
      </form>
    </div>
	
    <footer class="footer">
        <div class="container">
          <p class="text-muted">
            <div class="row">
            <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
            <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
            <div class="col-md-3"><a href="#"><p>HUBUNGI KAMI</p></a></div>
            <div class="col-md-3"><a href="#"><p>BANTUAN</p></a></div>        
          </div>
          <div class="row">
            <div class="col-md-12"><p>Copyright(c) 2015</p></div>
          </div>
          </p>
        </div>
      </footer>
    </body>
</html>