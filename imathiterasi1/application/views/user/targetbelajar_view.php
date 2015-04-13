<html>
    <head>        
	<title>Target Belajar</title>
	<!--<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>-->
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus target belajar ini?")) {
			window.location.href = url;
		}		
	}
	</script>
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
    <a href=" <?php echo base_url();?>index.php/target_belajar/buatBaru"><button type = "submit"> Buat Baru</button></a>   
    <h1> Target Belajar </h1>
    <table>
	<?php 
	for($i = 0; $i < $tbRow; $i++)
	{?>
	<tr>
	<td>	
	
	 Menyelesaikan <?php echo $result[$i]->banyakSoal ?> soal latihan materi <?php echo $materi[$i]->nama?> 
	 kelas <?php $idKelas = $result[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?>  dengan target nilai <?php echo $result[$i]->targetNilai?>
	 (Dibuat: <?php echo $result[$i]->tanggal ?>)
	</td>
	<!-- Done Button-->
	<td>
	<a href="<?php echo base_url() ?>index.php/target_belajar/done/<?php echo $result[$i]->idTargetBelajar ?>">
                                    <button type="submit">Done</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>index.php/target_belajar/edit/<?php echo $result[$i]->idTargetBelajar ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<button type="submit"  onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/delete/<?php echo $result[$i]->idTargetBelajar ?>');">Hapus</button>
	</td>
        <tr>
	<?php }?>	
	        
	</table>


	<h1> History </h1>
	<!-- Hapus History-->

	<button type="submit" onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/hapusHistory');">Hapus History</button>
	
	<?php 
	for($i = 0; $i < $historyRow; $i++)
	{?>
         <p>Menyelesaikan <?php echo $history[$i]->banyakSoal ?> soal latihan materi <?php echo $materiHistory[$i]->nama?>
	 kelas <?php $idKelas = $history[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?> 
	 dengan target nilai <?php echo $history[$i]->targetNilai?>
	 (Dibuat: <?php echo $history[$i]->tanggal ?>)
        <p/>
        <?php } ?>
    </body>
</html>