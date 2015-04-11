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
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_soal"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>

    <a href=" <?php echo base_url();?>index.php/admin/soal_latihan/createview"><button> Buat Baru</button></a>
    <form method="POST" action="<?php echo base_url();?>index.php/admin/soal_latihan/view">
    Kelas 
    <select id = "idKelas" name="idKelas">
    <?php foreach($Kelas as $row):?>      
    <option value="<?php echo $row->idKelas?>" name ="idKelas"><?php echo $row->idKelas ?> </option>
    <?php endforeach?>
    </select>
    Materi
    <select id="idMateri" name="idMateri">
    </select>
    <input type="submit" value="Submit" />
  </form>
    <h1> Daftar soal </h1>
    <table>
	<?php foreach($result as $row):?>	
	<td>
		<?php echo $row->idSoal ?>
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
          <a href="<?php echo base_url();?>index.php/admin/soal_latihan/delete/<?php echo $row->idSoal ?>">
                                            <img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px"></a>
  </td>
        </tr>
    <?php endforeach; ?>
	</table>

    </body>
</html>