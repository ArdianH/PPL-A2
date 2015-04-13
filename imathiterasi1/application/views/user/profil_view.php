<!DOCTYPE html> 
<html>
    <head>
	<meta charset = "utf-8">
	<title>Profil</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
    <body>
<nav class="navbar navbar-default navbar-static-top">
      <div class="container" id="logobar">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url()?>home">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
						echo '<br/>';
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Login </a>';
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
		echo '<div class="col-md-2">';
		echo '<a href="'.base_url().'profil">';
		echo "Hai ".$this->session->userdata('namaPanggilan')." :)</a></div>";
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">RAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">TARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">PRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="#">PERMAINAN</a></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>    
<div class="container contents">    
    <h1> Profil</h1>
    
	
	<?php foreach($result as $row):?>
	<?php		
		if(($row->gender) == 'Perempuan')
		{			
			echo "hahahaha";
			echo $userGender;
			echo '<div id="profil"><img src="'.base_url().'assets/images/Girl.png" img size="height="200" width="200"></div>';
		}
		else
		{
			echo '<div id="profil"><img src="'.base_url().'assets/images/Boy.png" img size="height="200" width="200"></div>';
		}
	?>
	<a href="<?php echo base_url() ?>/index.php/profil/ubah/<?php echo $row->username ?>">
                                    <button type="submit">Ubah</button></a>		
	
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