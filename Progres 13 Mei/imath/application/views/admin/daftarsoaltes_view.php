<html>
    <head>
	 <title>Daftar Soal Latihan</title>
   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
      function confirmDelete(url) {
        if (confirm("Kamu yakin ingin menghapus soal ini?")) {
          window.location.href = url;
        }   
      }
  </script>
  <script>
  $(document).ready(function(){
      $("#waktuForm").hide();
      $("#ubahwaktu").click(function(){
          $("#waktu").hide();
          $("#waktuForm").show();
      });
  });
  </script>
  <script>
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
        <li><a href="<?php echo base_url()?>'autentikasi/logout"> LOG OUT </a></li> 
      </ul>
    </div>  <!--/.nav-collapse -->
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

  <div class="contents container">
    <div class="titleAdmin">
      <h1>
     Daftar Soal Tes<?php if($isViewed == "true")  echo ' Kelas '.substr($currentkelas[0]->idKelas, 4, 5)?>
   </h1>
  </div>
  <div class="row">
  <span class="weight" id="tulisanBiru"><?php echo $this->session->flashdata('suksesSimpan'); ?></span>
  <?php if($isViewed == "true") {?>
    
  <div id="waktu">
    Waktu : <?php echo $currentkelas[0]->waktuTes ?> menit
    <button id="ubahwaktu" class="adminBiruButton"> Ubah Waktu</button>
  </div>
  
  <div id="waktuForm">
    <form method="POST" action="<?php echo base_url();?>index.php/admin/soal_tes/setWaktu">
      <input name="inputWaktu" id="inputWaktu" value="<?php echo $currentkelas[0]->waktuTes ?>" type="number" min="1" max="600"/> menit
      <input type="hidden" name="idKelas" id="idKelas" value="<?php echo $currentkelas[0]->idKelas?>"/>
      <input class="adminOrangeButton" type="submit" value="Submit">
    </form>    
  </div>
  <?php } ?>
  </div>
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-3">
    <!-- Button buat soal baru -->
      <form method="POST" action="<?php echo base_url();?>index.php/admin/soal_tes/view">
       Kelas <select id = "idKelas" name="idKelas">
        <?php foreach($Kelas as $row):?>
	<?php if($isViewed == 'true'){ ?>
		<option value="<?php echo $row->idKelas?>" <?php if($currentkelas[0]->idKelas == $row->idKelas) echo "selected"?> name ="idKelas"><?php echo $row->idKelas ?> </option>
	<?php } else { ?>
		<option value="<?php echo $row->idKelas?>" name ="idKelas"><?php echo $row->idKelas ?> </option>
	<?php }
	?>		
        <?php
	endforeach?>
      </select>
       <input class="adminOrangeButton" type="submit" value="Submit">
      </form>      
    </div>   
    <div class="col-md-3">
      <a href=" <?php echo base_url();?>index.php/admin/soal_tes/createview"><button class="adminBiruButton"> Buat Baru</button></a>
    </div>
    <div class="col-md-3">
      <?php if($isViewed == "true"){
		echo '<a href="'.base_url().'admin/soal_tes/atur/'.$currentkelas[0]->idKelas.'"><button class="adminBiruButton"> Atur Soal Ditampilkan</button></a>';
	}
	?>
    </div>
  </div>
      <table class="table table-hover table-striped tableimath">
    <thead>
          <tr>
          <th class="col-md-3">Pertanyaan</th>
          <th class="col-md-1">Jawaban</th>
          <th class="col-md-4">Pembahasan</th>
          <th class="col-md-1">Tampilkan</th>
          <th class="col-md-3">Tindakan</th>
            </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach($result as $row):?> 
  	<td>
  		<?php echo $row->pertanyaan ?>
  	</td>
  	<td>
  		<?php echo $row->jawaban ?>
  	</td>
     <td>
      <?php echo $row->pembahasan ?>
    </td>
    <td>
	<?php if ($row->isDitunjukkan == "Ya") {?>
		<span id="tulisanBiru" class="weight"><?php echo $row->isDitunjukkan ?></span>
	<?php } else{ ?>
	<span id="tulisanMerah" class="weight"><?php echo $row->isDitunjukkan ?></span><?php } ?>
    </td>
    <td>
      <a href="<?php echo base_url();?>index.php/admin/soal_tes/detail/<?php echo $row->idSoal ?>">
                                              <img src="<?php echo base_url() ?>assets/images/info.png" width="50px" height="50px"></a>
            <!-- Edit Button-->
            <a href="<?php echo base_url();?>index.php/admin/soal_tes/edit/<?php echo $row->idSoal ?>">
                                              <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
            <!-- Hapus Button-->
            <button class="buttonDelete" onclick="return confirmDelete('<?php echo base_url() ?>admin/soal_tes/delete/<?php echo $row->idSoal?>');">
                                              <img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px"></button>
    </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  	</table>
</div>
  <footer class="footer">
        <div class="container">
          <p class="text-muted">
            <div class="row">
           <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
          <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
          <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
          <div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>   
          </div>
          <div class="row">
            <div class="col-md-12"><p>Copyright(c) 2015</p></div>
          </div>
          </p>
        </div>
      </footer>

    </body>
</html>