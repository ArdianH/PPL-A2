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
    	<div class="titleText">
    	<h1> Daftar Materi </h1>
    	<span id="tulisanMerah" class="weight"><?php echo $this->session->flashdata('messageMateri'); ?></span><br>
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