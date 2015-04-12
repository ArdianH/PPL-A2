<html>
    <head>
        <!--<title><?=$page_title?></title>-->
	<title>Kelas</title>
    </head>
	
    <body>
	
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		echo "Hello ".$this->session->userdata('username')." :)";
		echo "<br/>";
		echo '<a href="'.base_url().'rapor"><button>RAPOR</button></a>';
		echo '<a href="'.base_url().'target_belajar"><button>TARGET BELAJAR</button></a>';
		echo '<a href="'.base_url().'prestasi"><button>PRESTASI</button></a>';
		echo '<a href="#"><button>PERMAINAN</button></a>';
		echo '<a href="'.base_url().'profil"><button>PROFIL</button></a>';
	}
	?>
	
	
    <h1> Kelas </h1>
	<table>
	<?php foreach($result as $row):?>	
	<tr>
		<td>
			Kelas <?php echo $row->idKelas ?> 
		</td>

	<td>
	<!-- Pilih Button-->
	<a href="<?php echo base_url() ?>materi/pilih/<?php echo $row->idKelas ?>">
                              <img src="<?php echo base_url();?>uploads/<?php echo $row->gambar ?>">
	</a>
	</td>

    </tr>
    
	<?php endforeach; ?>
	</table>

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
