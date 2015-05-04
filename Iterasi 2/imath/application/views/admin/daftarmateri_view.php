<html>
    <head>
	<title>MATERI</title>
   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus materi ini?")) {
			window.location.href = url;
		}		
	}
	</script>
    </head>
    <body>

 <!-- Navigation Bar iMath -->
    	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="<?php echo base_url();?>index.php"><img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";></a>
	      </div>
        <!-- Navbar Atas -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right"><li><a href="<?php echo base_url();?>index.php/profil">PROFIL ADMIN</a></li>
            <li><a href="<?php echo base_url();?>index.php/admin/dashboard">DASHBOARD</a></li>
            <li><a href="<?php echo base_url();?>index.php/home">BERANDA IMATH</a></li>
            <li><a href="<?php echo base_url();?>index.php/autentikasi/logout">LOG OUT</a></li>
          </ul>
        </div>
      </div>
      <!-- Navbar khusus admin -->
      <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_kelas"><p>Kelas</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/daftar_materi"><p>Materi</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Latihan</p></a></div>
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
   <!--  nav collapse -->
   
    <div class="container contents">
    	<div class="titleText">
    	<h1> Daftar Materi </h1>
    </div>
    	<div class="row">
    		<div class="col-md-4">
    		<form method="POST" action="<?php echo base_url();?>index.php/admin/daftar_materi/viewMateri">
			    <select name ="idKelas">
				<?php foreach($Kelas as $row):?>			
				<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
				<?php endforeach?>
				</select>
				<input type="submit" value="Submit" />
			</form>
		</div>
		<div class="col-md-4">
			<a href=" <?php echo base_url();?>index.php/admin/daftar_materi/createview"><button> Buat Baru</button></a>
		</div>
	</div>
		<div class="table-responsive">
	    	<table class="table table-hover table-striped tableimath">
		        <thead>
		    	 	<tr>
			            <th class="col-md-2">Materi</th>
						<th class="col-md-3">Deskripsi</th>
						<th class="col-md-4">Rangkuman</th>
						<th class="col-md-3">Tindakan</th>
		        	</tr>
		        </thead>
		        <tbody>
					<?php foreach($result as $row):?>
					<tr>	
					<td class="col-md-2">
						<?php echo $row->nama ?>
					</td>
					<td class="col-md-3">
						<?php echo $row->deskripsi ?>
					</td>
					<td class="col-md-4">
						<?php echo $row->rangkuman ?>
					</td>
					<td class="col-md-3">
					<a href="<?php echo base_url();?>index.php/admin/daftar_materi/detail/<?php echo $row->idMateri ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/info.png" width="50px" height="50px"></a>				
					<!-- Edit Button-->
					<a href="<?php echo base_url();?>index.php/admin/daftar_materi/edit/<?php echo $row->idMateri ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>				
					<!-- Hapus Button-->
					<button class="buttonDelete" onclick="return confirmDelete('<?php echo base_url() ?>admin/daftar_materi/delete/<?php echo $row->idMateri?>');">
				                                    <img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px"></button>
					</td>
				   </tr><?php endforeach; ?>
				</table>
			</div>
		</div>
		<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>        
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
    </body>
</html>