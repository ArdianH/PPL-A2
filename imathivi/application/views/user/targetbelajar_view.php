<!DOCTYPE html>
<html lang="en">
    <head>        
	<title>Target Belajar</title>	
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
            <li><a href="../navbar/">LOG IN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
        <div class="row">
        <div class="container" id="iconbar">
          <div class="row">
          <div class="col-md-2"><a href="#"><p>Rapor</p></a></div>
          <div class="col-md-2"><a href="#"><p>Target Belajar</p></a></div>
          <div class="col-md-2"><a href="#"><p>Prestasi</p></a></div>
          <div class="col-md-2"><a href="#"><p>Permainan</p></a></div> 
          <div class="col-md-2"><p></p></div>
          <div class="col-md-2"><p>Hai Anna</p></div>        
        </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-3">
            <img src="">
          </div>
          <div class="col-md-9">
            <h1> Target Belajar</h1>
            	<a href=" <?php echo base_url();?>index.php/target_belajar/buatBaru"><button>Buat Baru</button></a>
          </div>
        </div>
    </div>

    <div class="container" id="contTargetBelajar">
    	<div class="row">
    	<h2> Target Belajar </h2>
    	</div>
    	<table class="table" id="targetBelajar">
    		<?php foreach($result as $row):?>	
				<tr>
					<td>
					 Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target nilai <?php echo $row->targetNilai ?>
					 (Dibuat: <?php echo $row->tanggal ?>)
					</td>
					<!-- Done Button-->
					<td>
					<a href="<?php echo base_url() ?>index.php/target_belajar/done/<?php echo $row->idTargetBelajar ?>">
				                                    <button type="submit">Done</button></a>
					</td>
					<td>
					<!-- Edit Button-->
					<a href="<?php echo base_url() ?>index.php/target_belajar/edit/<?php echo $row->idTargetBelajar ?>">
				                                    <button type="submit">Edit</button></a>
					</td>
					<td>
					<!-- Hapus Button-->
					<a href="<?php echo base_url() ?>index.php/target_belajar/delete/<?php echo $row->idTargetBelajar ?>">
				                                    <button type="submit">Hapus</button></a>
					</td>
	        	<tr>
	        <?php endforeach; ?>
	    </table>
	    <div class="row">
	    	<h2>History</h2>
	    	<a href="<?php echo base_url() ?>index.php/target_belajar/hapusHistory">
                                    <button type="submit">Hapus History</button></a>	
			 <?php foreach($history as $row):?>	
		         <p>Menyelesaikan <?php echo $row->banyakSoal ?> soal latihan materi <?php echo $row->idMateri ?> kelas <?php echo $row->idKelas ?>  dengan target <?php echo $row->targetNilai ?>
			 (Dibuat: <?php echo $row->tanggal ?>)
		        <p/>
		        <?php endforeach; ?>
	    </div>	    
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
