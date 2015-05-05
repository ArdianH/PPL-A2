<html>
	<head>
	<title>Kebijakan Privasi</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
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
		  <ul class="nav navbar-nav navbar-right">
			<li>
			<?php
				if($this->session->userdata('loggedin')) {
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a></li><li>';
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					}
				} else {
						echo '<a href="'.base_url().'autentikasi"> LOG IN </a>';
				}
			?>
			</li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	<?php
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		echo '<div class="row">';
		echo '<div class="container" id="iconbar">';
		echo '<div class="row">';
		echo '<div class="col-md-2"><img src="'.base_url().'assets/images/home.png" img size="height="20" width="20"><a href="'.base_url().'">&nbspBERANDA</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">&nbspRAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">&nbspTARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">&nbspPRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">&nbspPERMAINAN</a></div>';
		echo '<div class="col-md-2">';
		if($this->session->userdata('gender') =="Perempuan"){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<span class="weight"><a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a></span></div>";
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>

<div class="container" align="center">
	<img class="imgLogin" src='<?php echo base_url() ?>assets/images/biru.jpg' height="700px">
	<div class="contentsKebijakanPrivasi">
		<h1 id="tulisanBiru" class="weight">Kebijakan Privasi</h1>
		<br/><br/>
		<p>
		<?php
			foreach($stringKebijakanPrivasi as $row) :
				echo $row."<br/>";
			endforeach;
		?>
		</p>
		<br/>
		</div>
		<?php echo $this->session->flashdata("notifKebijakanPrivasi"); ?>
	</div>

	   <footer class="footer">
		<div class="container">
		  <p class="text-muted">
			<div class="row">
			<div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
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