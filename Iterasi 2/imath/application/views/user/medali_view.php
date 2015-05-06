<html>
    <head>        
	<title>Prestasi - iMath</title>		
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
	
    <body>

<!-- ========================= Navigation Bar iMath  =============================-->
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
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'permainan">&nbspPERMAINAN</a></div>';
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
<!-- ========================= END  =============================-->

<div class="container contents">      
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/medali.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard">Prestasi</h2><br>
				<div class="right">
					<button class="purpleButton">Medali</button>
					<a href="<?php echo base_url()?>prestasi/sertifikat"><button class="orangeButton">Sertifikat</button></a>
				</div>
      			</div>
      		</div>
    	</div> 
	<?php
		$url = $_SERVER['REQUEST_URI'];
		$arr = explode("/", $url);
		$currentKelas = $arr[count($arr) - 1];
	?>
	
	<span id="kelas">KELAS</span>	
		<?php foreach($kelas as $row):
			$idKelas = $row->idKelas;			
			//echo $kelas;
			if($idKelas == $currentKelas)
			{
				echo '<button class="circleGreen buttonDelete">';
				echo substr($idKelas,4,5);
				echo '</button>';
			}
			else
			{
			?>
			<a href="<?php echo base_url() ?>prestasi/medali/<?php echo $row->idKelas?>">
			<?php
				echo '<button class="circle buttonDelete">';
				echo substr($idKelas,4,5);
				echo '</button></a>';
			}		
		endforeach ?><br>
	
	<div class="container">
		<div class="rangkuman">
			<span id="medali"> Medali Kelas <?php echo substr($currentKelas,4,5)?></span>
			<br>
			<div class="row medaliBg">
				<?php if(count($medali) > 0):?>			
				<?php foreach($medali as $row):?>
					<div class="col-md-4">		
						<div class="fixednama">
							<?php echo $row -> nama;?>
						</div>
							<?php echo '<img src="'.base_url().'assets/images/medali.png" height="200" width="200">';?>							
					</div>				
				<?php endforeach;
					else:
						echo "Kamu belum mendapat medali untuk kelas ini";
					endif;
				?>
			</div>
		</div>

	</div>
		
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