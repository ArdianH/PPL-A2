<html>
    <head>
	<title>soal</title>
	<script>
		$('#f_city, #f_city_label').hide();
		$('#f_state').change(function(){
		    var state_id = $('#f_state').val();
		    if (state_id != ""){
		        var post_url = "/index.php/soalcontroller/getmateribykelas" + state_id;
		        $.ajax({
		            type: "POST",
		             url: post_url,
		             success: function(idKelas) //we're calling the response json array 'cities'
		              {
		                $('#f_city').empty();
		                $('#f_city, #f_city_label').show();
		                   $.each(cities,function(id,city) 
		                   {
		                    var opt = $('<option />'); // here we're creating a new select option for each group
		                      opt.val(id);
		                      opt.text(city);
		                      $('#f_city').append(opt); 
		                });
		               } //end success
		         }); //end AJAX
		    } else {
		        $('#f_city').empty();
		        $('#f_city, #f_city_label').hide();
		    }//end if
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
     <a href=" <?php echo base_url();?>index.php/soalcontroller/createview"><button> Buat Baru</button></a>

    <form method="POST" action="<?php echo base_url();?>index.php/soalcontroller/viewsoal">
    <select name ="idKelas" onchange="showMateri(this.value)">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	<input type="submit" value="Submit" />
</form>

    <h1> Daftar soal </h1>
    <table>
	<?php foreach($result as $row):?>	
	<td>
		<?php echo $row->idsoal ?>
	</td>
	<td>
		<?php echo $row->pertanyaan ?>
	</td>
	<td>
		<?php echo $row->jawaban ?>
	</td>
	<td>
		<?php echo $row->deskripsiJawaban ?>
	</td>
	<td>
	<a href="<?php echo base_url();?>index.php/soalcontroller/detail/<?php echo $row->idsoal ?>">
                                    <button type="submit">Lihat</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url();?>index.php/soalcontroller/edit/<?php echo $row->idsoal ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url();?>index.php/soalcontroller/delete/<?php echo $row->idsoal ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        </tr>
    <?php endforeach; ?>
	</table>

    </body>
</html>