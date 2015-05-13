<html>
    <head>
	<title>Kelas</title>
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus kelas ini? Semua materi kelas juga akan terhapus")) {
			window.location.href = url;
		}		
	}
	</script>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    	<h1>Daftar Kelas</h1>
    </div>
    	<a href=" <?php echo base_url();?>index.php/admin/daftar_kelas/buatBaru"><button type="button" class="btn btn-default blue"> Buat Baru</button></a>
    	<div class="table-responsive">
    	<table class="table table-hover table-striped tableimath">
	        <thead>
	    	 	<tr>
		            <th class="col-md-2">Kelas</th>
					<th class="col-md-4">Deskripsi</th>
					<th class="col-md-3">Kunjungan</th>
					<th class="col-md-3">Tindakan</th>
	        	</tr>
	        </thead>
	        <tbody>
	        		<?php 
				$jumlah = count($result);
				for($i=0; $i<$jumlah; $i++): ?>
	        	<tr>	
					<td class="col-md-2">
						<?php echo $result[$i]['idKelas'] ?>
					</td>	
					<td class="col-md-4">
						<?php echo $result[$i]['deskripsi'] ?>
					</td>
					<td class="col-md-3">
					<a href="<?php echo base_url();?>index.php/admin/kunjungan">
					
					<p><?php echo $jumlahPengunjung[$result[$i]['idKelas']]; ?></p></a>

					</td>		
					<td class="col-md-3">
					<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/detail/<?php echo $result[$i]['idKelas'] ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/info.png" width="50px" height="50px"></a>
					<!-- Edit Button-->
					<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/edit/<?php echo $result[$i]['idKelas'] ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
					<!-- Hapus Button
					<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/delete/<?php echo $result[$i]['idKelas'] ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px" alt="submit" ></a>-->
					<button class="buttonDelete" type="submit"  onclick="return confirmDelete('<?php echo base_url();?>admin/daftar_kelas/delete/<?php echo $result[$i]['idKelas'] ?>');">
						<img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px" alt="submit">
					</button>								
					<a href="<?php echo base_url();?>index.php/admin/daftar_kelas/unggah/<?php echo $result[$i]['idKelas'] ?>">
                                     <img src="<?php echo base_url() ?>assets/images/sertifikat.png" width="50px" height="50px"></a>
					
					</td>
				        </tr>
				    <?php endfor; ?>
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