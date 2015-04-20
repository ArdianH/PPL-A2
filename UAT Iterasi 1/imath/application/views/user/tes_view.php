<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>

<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
	
<style>
#txt {
  border:none;
  font-family:verdana;
  font-size:16pt;
  font-weight:bold;
  border-right-color:#FFFFFF
}
</style>
	
<script>
/* This script and many more are available free online at
The JavaScript Source :: http://www.javascriptsource.com
Created by: Neill Broderick :: http://www.bespoke-software-solutions.co.uk/downloads/downjs.php 
Modified by: Ardian*/

	var mins;
	var secs;
	var tempMins;
	var tempSecs;


	function countDown(mm,ss) {
		mins = 1 * m(mm); 		// change minutes here
		secs = 0 + s(":"+ss); 	// change seconds here (always add an additional second to your total)
		redo();
	}

	function m(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(0, i));
	}

	function s(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
			break;
		}
		return(obj.substring(i + 1, obj.length));
	}

	function dis(mins,secs) {
		var disp;
		if(mins <= 9) {
			disp = " 0";
		} else {
			disp = " ";
		}
		disp += mins + ":";
		if(secs <= 9) {
			disp += "0" + secs;
		} else {
			disp += secs;
		}
		return(disp);
	}

	function redo() {
		secs--;
		if(secs == -1) {
			secs = 59;
			mins--;
		}
		document.cd.disp.value = dis(mins,secs); 				// setup additional displays here.
		if((mins == 0) && (secs == 0)) {
			window.alert("Time is up. Press OK to continue."); 	// change timeout message as required
			window.location = "http://localhost/imath/"; 		// redirects to specified page once timer ends and ok button is pressed
		} else {
			countDown = setTimeout("redo()",1000);
		}
	}
	
	function localStore() {
		localStoreMin();
		localStoreSec();
		document.getElementById("waktutes").value = (59-(parseInt(localGetMin())))*60 + (60-(parseInt(localGetSec())));
	}
	
	function localStoreMin() {
		localStorage.setItem("Min", mins);
	}
	
	function localStoreSec() {
		localStorage.setItem("Sec", secs);
	}
	
	function localGetMin() {
		var temporerm = localStorage.getItem("Min");
		return temporerm;
	}

	function localGetSec() {
		var temporers = localStorage.getItem("Sec");
		return temporers;
	}
	
	function localClear() {
		localStorage.removeItem("Min");
		localStorage.removeItem("Sec");
		localStorage.clear();
		document.getElementById("Time").value ="";
	}
	
	function cekSession() {
		document.getElementById("minute").value = localGetMin();
		if (!(localGetMin()) || (localGetMin() === "") )
		{
			tempMins = "60";
			tempSecs = "01";
			countDown(tempMins, tempSecs);
		} else {
			countDown(localGetMin(), localGetSec());
		}
	}

	window.onload = cekSession;;
</script>
	
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
		if($this->session->userdata('gender') =="Perempuan"){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a></div>";
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<!-- nav end -->

<div class="container contents">
	<h1 align="center" style="color:red">Silahkan Mengerjakan Tes</h1>
	<form name="cd">
	Waktu Tersisa : 
	<input id="Time" readonly="true" type="text" value="00:00" border="0" name="disp">
	</form>
	<span id="minute"></span>
	<span id="waktuTes"></span>
	<h3>Total Skor : <?php echo $skor; ?> </h3> 
		<!--<input type="hidden" name="idSoal" value= * echo $idSoal; */ />-->

		<!--Jika belum menjawab(flagNext==FALSE) maka tombol kirim muncul
			Jika telah menjawab(flagNext==TRUE) maka tombol button NextSoal yang muncul-->
		<?php
		
		if(!$flagNext) : ?>
			<form method='POST' action='<?php echo base_url()."tes/processJawaban/";?>' onsubmit='return localGetMin()' >
			<h1>Soal <?php echo $nomor; ?></h1>
			<p><?php echo $pertanyaan ?></p>

			
			<?php if($gambar !== NULL) : ?>
				<img src=<?php echo base_url()."uploads/".$gambar; ?> />
				<br />
			<?php endif; ?>
			
			<input type='radio' name='jawab' id='idOpsiA' value='<?php echo $idOpsiA; ?>' required /> A. <?php echo $desOpsiA; ?> <br/>
			<input type='radio' name='jawab' id='idOpsiB' value='<?php echo $idOpsiB; ?>' required /> B. <?php echo $desOpsiB; ?> <br/>
			<input type='radio' name='jawab' id='idOpsiC' value='<?php echo $idOpsiC; ?>' required /> C. <?php echo $desOpsiC; ?> <br/>
			<input type='radio' name='jawab' id='idOpsiD' value='<?php echo $idOpsiD; ?>' required /> D. <?php echo $desOpsiD; ?> <br/>
			<input type='hidden' name='idOpsiA' value='<?php echo $idOpsiA; ?>' />
			<input type='hidden' name='idOpsiB' value='<?php echo $idOpsiB; ?>' />
			<input type='hidden' name='idOpsiC' value='<?php echo $idOpsiC; ?>' />
			<input type='hidden' name='idOpsiD' value='<?php echo $idOpsiD; ?>' />
			<input type='hidden' name='desOpsiA' value='<?php echo $desOpsiA; ?>' />
			<input type='hidden' name='desOpsiB' value='<?php echo $desOpsiB; ?>' />
			<input type='hidden' name='desOpsiC' value='<?php echo $desOpsiC; ?>' />
			<input type='hidden' name='desOpsiD' value='<?php echo $desOpsiD; ?>' />
			<input type='hidden' name='jawaban' value='<?php echo $jawaban; ?>' />
			<input type='submit' value='Kirim' onclick='localStore()' />
			</form>
			<?php if($flagInit) {
				echo "<script> localClear(); </script>";
			} ?>
		<?php else : ?>
			<form method='POST' action= '<?php echo base_url()."tes/processSoal/";?>' onsubmit='return localGetMin()'>
			<h1>Soal <?php echo $nomor; ?></h1>
			<p><?php echo $pertanyaan; ?></p>
			<input type='radio' name='jawab' id='idOpsiA' value='<?php echo $idOpsiA; ?>' <?php echo $checkA; ?> disabled/> A. <?php echo $desOpsiA;?> <br/>
			<input type='radio' name='jawab' id='idOpsiA' value='<?php echo $idOpsiB; ?>' <?php echo $checkB; ?> disabled/> B. <?php echo $desOpsiB;?> <br/>
			<input type='radio' name='jawab' id='idOpsiA' value='<?php echo $idOpsiC; ?>' <?php echo $checkC; ?> disabled/> C. <?php echo $desOpsiC;?> <br/>
			<input type='radio' name='jawab' id='idOpsiA' value='<?php echo $idOpsiD; ?>' <?php echo $checkD; ?> disabled/> D. <?php echo $desOpsiD;?> <br/>
			<input type='hidden' name='waktuTes' id='waktutes' value='01' />
			<input type='submit' value='Next Soal' onclick='localStore()' />
			</form>
		
			<?php
			if($flagJawaban == 1) {
				echo "Jawaban Anda Benar!";
			} else {
				echo "Jawaban Anda Salah :(";
			} ?>
			
		<?php endif; ?>
		
	<br/>
	<br/>
	<a href= "<?php echo base_url()."home"; ?>" onclick="localClear()"> << Keluar Tes >> </a>
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