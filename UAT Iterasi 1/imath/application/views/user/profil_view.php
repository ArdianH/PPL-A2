<!DOCTYPE html> 
<html>
    <head>
	<meta charset = "utf-8">
	<title>Profil</title>
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
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a></li><li>';
						echo '<a href="'.base_url().'autentikasi/logout"> Keluar </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Keluar </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Masuk </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>      
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		echo '<div class="row">';
        echo '<div class="container" id="iconbar">';
        echo '<div class="row">';
        echo '<div class="col-md-2"></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">RAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">TARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">PRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">PERMAINAN</a></div>';
		echo '<div class="col-md-2">';
		$gender = $this->session->userdata('gender');
		if($gender=='Laki-Laki'){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a>:)</div>";
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<!-- nav end -->
<div class="container contents">      
<?php foreach($result as $row):?>
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4">
      				<?php		
					if(($row->gender) == 'Perempuan')
					{			
						echo '<div id="profil"><img src="'.base_url().'assets/images/Girl.png" img size="height="200" width="200"></div>';
					}
					else
					{
						echo '<div id="profil"><img src="'.base_url().'assets/images/Boy.png" img size="height="200" width="200"></div>';
					}
				?>
      			</div>
      			<div class="col-md-8">
      				<h2 class="userDashboard"> Profil </h2> 
				<a href="<?php echo base_url() ?>/index.php/profil/ubah/<?php echo $row->username ?>">
                                    <button type="submit" class="orangeButton">Ubah</button></a>		
      			</div>
      		</div>
    	</div>     
		<p>Nama Panggilan: <?php echo $row->namaPanggilan?> </p>
		
		<p>Email: <?php echo $row->email?></p>	
		
		<p>Username: <?php echo $row->username?> </p>
		
		<p>Gender: <?php echo $row->gender?> </p>
		
		<?php endforeach; ?>
	 </div>

       <footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
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