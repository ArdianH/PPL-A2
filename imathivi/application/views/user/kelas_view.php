<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
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
        <a class="navbar-brand" href="#">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/"></a></li>
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
		echo "Hello ".$this->session->userdata('username')." :)";
		echo '<div class="col-md-2"><a href="'.base_url().'rapor"><button>RAPOR</button></a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'target_belajar"><button>TARGET BELAJAR</button></a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'prestasi"><button>PRESTASI</button></a></div>';
		echo '<div class="col-md-2"><a href="#"><button>PERMAINAN</button></a></div>';
		echo '<div class="col-md-2"><a href="'.base_url().'profil"><button>PROFIL</button></a></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
    <div class="container">
      <div class="jumbotron">
        <h1>Kelas 1</h1>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
      </div>
    </div>

	
    <h1> Kelas </h1>
	<?php foreach($result as $row):?>	
	<div class="row">
		<div class="col-md-4">
			<a href="<?php echo base_url() ?>materi/pilih/<?php echo $row->idKelas ?>">
                              <img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>">
            <p>	
			Kelas <?php echo $row->idKelas ?> </p>
			</a>
		</div>

	</div>
    
	<?php endforeach; ?>

	<?php
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
	?>	
	
	
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
