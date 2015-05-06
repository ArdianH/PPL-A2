<html>
    <head>       
	<title>Anggota</title>
	<!--<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>-->
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus data anggota ini?")) {
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
	    <h1> Daftar Anggota </h1>
	</div>
    <div class="table-responsive">
        <table class="table table-hover table-striped tableimath">
	        <thead>
	    	 	<tr>
			<th class="col-md-1">No</th>
		            <th class="col-md-2">Username</th>
					<th class="col-md-2">Nama</th>
					<th class="col-md-2">Email</th>					
					<th class="col-md-2">Gender</th>
					<th class="col-md-2">Tindakan</th>
	        	</tr>
	        </thead>
	        <tbody>
			<?php 
				$i = 1; 
				foreach($result as $row):
			?>				
				<tr>
					<td class="col-md-1">
					 <?php echo $i; $i = $i +1;?>
					</td>	
					<td class="col-md-2">
					 <?php echo $row->username ?>
					</td>	
					<td class="col-md-2">
					<?php echo $row->namaPanggilan ?>
					</td>
					<td class="col-md-2">
					<?php echo $row->email ?>
					</td>					
					<td class="col-md-2">
					<?php echo $row->gender ?>
					</td>
					<td class="col-md-2">
					
					<!-- Edit Button-->
					<a href="<?php echo base_url() ?>/index.php/admin/anggota/edit/<?php echo $row->username ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>					
		
	<!-- Hapus Button-->
	<a onclick="return confirmDelete('<?php echo base_url() ?>index.php/admin/anggota/delete/<?php echo $row->username ?>');">
	<img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px">
	</a>
	</td>
	
	
					</td>
			        <tr>
			        <?php endforeach; ?>
			      </tbody>
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
