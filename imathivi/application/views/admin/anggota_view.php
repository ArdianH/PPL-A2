<html>
    <head>       
	<title>Anggota</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/soal_latihan"><p>Soal Tes</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/anggota"><p>Data Anggota</p></a></div> 
          <div class="col-md-2"><a href="<?php echo base_url();?>index.php/admin/pesan"><p>Pesan Anggota</p></a></div>   
        </div>
        </div>
      </div>
    </nav>
<div class="container contents">
	<div class="titleText">
	    <h1> Daftar Anggota </h1>
	</div>
    <div class="table-responsive">
        <table class="table table-hover table-striped tableimath">
	        <thead>
	    	 	<tr>
		            <th class="col-md-2">Username</th>
					<th class="col-md-2">Nama</th>
					<th class="col-md-2">Email</th>
					<th class="col-md-2">Password</th>
					<th class="col-md-2">Gender</th>
					<th class="col-md-2">Tindakan</th>
	        	</tr>
	        </thead>
	        <tbody>
	        <?php foreach($result as $row):?>	
				<tr>
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
					<?php echo $row->password ?>
					</td>
					<td class="col-md-2">
					<?php echo $row->gender ?>
					</td>
					<td class="col-md-2">
					<!-- Edit Button-->
					<a href="<?php echo base_url() ?>/index.php/admin/anggota/edit/<?php echo $row->username ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
					<a href="<?php echo base_url() ?>/index.php/admin/anggota/delete/<?php echo $row->username ?>">
				                                    <img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px"></a>
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
