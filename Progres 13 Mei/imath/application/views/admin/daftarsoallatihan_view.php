<html>
    <head>
   <title>soal</title>
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
 
  <div class="container contents">
    <h1> Daftar Soal Latihan </h1>
    <!-- Button buat soal baru -->
    <span id="tulisanMerah" class="weight"><?php echo $this->session->flashdata('messageSoal'); ?></span><br>
    <a href=" <?php echo base_url();?>index.php/admin/soal_latihan/createview/<?php echo $materi[0] -> idMateri?>/<?php echo $materi[0] -> idKelas?>"><button> Buat Baru</button></a>
    <form method="POST" action="<?php echo base_url();?>index.php/admin/soal_latihan/view">
       Kelas <select id = "idKelas" name="idKelas">
        <?php foreach($Kelas as $row):?>
        <option name ="idKelas" <?php 
        if($row->idKelas == $materi[0]->idKelas)
          echo 'value="'.$row->idKelas.'" selected';
        else
          echo 'value="'.$row->idKelas.'"'; ?>>
        <?php echo $row->idKelas ?>
      </option>
        <?php endforeach?>
      </select>
      Materi
      <select id="idMateri" name="idMateri">
        <?php 
              echo '<option name = "idMateri" value="'.$materi[0]->idMateri.'" selected>';
              echo $materi[0]->nama;
              echo "</option>";
        ?>
      </select>
       <input class="adminButton" type="submit" value="Submit">
      </form>
      <table class="table table-hover table-striped tableimath">
    <thead>
          <tr>
  <th class="col-md-1">No</th>
          <th class="col-md-3">Pertanyaan</th>
          <th class="col-md-1">Jawaban</th>
          <th class="col-md-4">Pembahasan</th>
          <th class="col-md-3">Tindakan</th>
            </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach($result as $row):?> 
  <td>
      <?php echo $i; $i = $i+1; ?>
    </td>
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
      <a href="<?php echo base_url();?>index.php/admin/soal_latihan/detail/<?php echo $row->idSoal ?>">
                                              <img src="<?php echo base_url() ?>assets/images/info.png" width="50px" height="50px"></a>
            <!-- Edit Button-->
            <a href="<?php echo base_url();?>index.php/admin/soal_latihan/edit/<?php echo $row->idSoal ?>">
                                              <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
            <!-- Hapus Button-->
            <button class="buttonDelete" onclick="return confirmDelete('<?php echo base_url() ?>admin/soal_latihan/delete/<?php echo $row->idSoal?>/<?php echo $row->idMateri?>');">
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