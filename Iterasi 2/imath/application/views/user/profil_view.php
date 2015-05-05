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
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> LOG IN </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>      
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		
        echo '<div class="container" id="iconbar">';
        
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
	}
	?>
</nav>
<!-- nav end -->
<div class="container contents">      
<?php foreach($result as $row):?>
	<div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
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
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard">Profil</h2><br><br>
				<div class="right">
					<a href="<?php echo base_url() ?>/index.php/profil/ubah/<?php echo $row->username ?>"><button type="submit" class="orangeButton">Ubah</button></a>	  
				</div>
      			</div>
      		</div>
    	</div> 
	 
	<div class="container">    
		<div class="profil">
			<p id="tulisanBiru" class="weight"><?php echo $this->session->flashdata('message'); ?></p>
			<div class="row">
				<div class="col-md-3">	Nama Panggilan: </div>
				<div class="col-md-9"> <?php echo $row->namaPanggilan?> </div>
			</div>	
			<div class="row">
				<div class="col-md-3">	Email:	</div>
				<div class="col-md-9"> <?php echo $row->email?></div>
			</div>	
			<div class="row">
				<div class="col-md-3">Username:</div>
				<div class="col-md-9"> <?php echo $row->username?></div>
			</div>	
			<div class="row">
				<div class="col-md-3">Gender</div>
				<div class="col-md-9"> <?php echo $row->gender?></div>
			</div>
		</div>
		<?php endforeach?>
	</div>
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