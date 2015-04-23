<html>
    <head>        
	<title>Ubah Profil</title>
	<script type="text/javascript">
	  function checkForm(form)
	  {
	    if(form.password.value != "" && form.password.value == form.ulangipassword.value) {
	      return true;
	    }
	    else{
		alert("Password tidak sesuai");
		return false;
	    }
	  }

	</script>
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
		echo '<div class="row">';
        echo '<div class="container" id="iconbar">';
        echo '<div class="row">';
        echo '<div class="col-md-2"></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">RAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">TARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">&nbspPRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">PERMAINAN</a></div>';
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
<!-- nav end -->
<div class="container contents">	
	<div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<?php		
					if(($result[0]->gender) == 'Perempuan')
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
      				<h2 class="userDashboard">Ubah Profil</h2><br><br>				
				<form method="POST" action="<?php echo base_url()?>index.php/profil/simpanPerubahan" onsubmit="return checkForm(this)" class="formimath">
				<div class="right">
					<input type="submit" value="Simpan" class="orangeButton"/>
				</div>
      			</div>			
      		</div>
    	</div> 
	
	<div class="container formiMath">    					
			<div class="row">
				<div class="col-md-3">Nama Panggilan:</div>
				<div class="col-md-9">
					<input pattern="^[a-zA-Z ]{2,50}" title="minimal 2 karakter, maksimal 50 karakter, alfabet A-Z" class="box-input" type="text" name="namapanggilan" value="<?php echo $result[0]->namaPanggilan ;?>"><br><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Email: </div>
				<div class="col-md-9">					
					<input class="box-input" type="email" name="email" value="<?php echo $result[0]->email ;?>" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"><br><br>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Password:</div>
				<div class="col-md-9">					
					<input class="box-input" type="password" name="password" value="" pattern=".{5,}" title="Minimum 5 karakter"><br><br>
				</div>
			</div>
			<div class="row">
			<div class="col-md-3">Ulang Password: </div>
			<div class="col-md-9">				
				<input class="box-input" type="password" name="ulangipassword" pattern=".{5,}" title="Minimum 5 karakter"><br><br><br>
			</div>
			<div class="col-md-3">Username: </div>
			<div class="col-md-9"><?php echo $result[0]->username;?><br><br></div>
			<div class="col-md-3">Gender:</div>
			<div class="col-md-9"><?php echo $result[0]->gender;?></div>					
	</div>
	</form>
	
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

