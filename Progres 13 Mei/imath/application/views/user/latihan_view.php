<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Latihan</title>
	
<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">

	<script>
		/* This script and many more are available free online at
		The JavaScript Source :: http://www.javascriptsource.com
		Created by: Neill Broderick :: http://www.bespoke-software-solutions.co.uk/downloads/downjs.php */

		var mins;
		var secs;
		var tempMins;
		var tempSecs;


		function countDown(mm,ss) {
		 	mins = 1 * m(mm); // change minutes here
		 	secs = 0 + s(":"+ss); // change seconds here (always add an additional second to your total)
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
		 	secs++;
		 	if(secs == 60) {
		  		secs = 00;
		  		mins++;
		 	}
		 	document.cd.disp.value = dis(mins,secs); // setup additional displays here.
		 	if((mins == 0) && (secs == 0)) {
		  		window.alert("Time is up. Press OK to continue."); // change timeout message as required
		  		window.location = "http://localhost/codeigniter/tes/processSoal/selesai"; // redirects to specified page once timer ends and ok button is pressed
		  		// window.location = "yourpage.htm" // redirects to specified page once timer ends and ok button is pressed
		 	} else {
		 		countDown = setTimeout("redo()",1000);
		 	}
		}
			
			function localStore() {
				localStoreMin();
				localStoreSec();
				document.getElementById("waktutes").value = parseInt(localGetMin())*60 + parseInt(localGetSec());
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
					tempMins = "00";
					tempSecs = "00";
					countDown(tempMins, tempSecs);
				} else {
					countDown(localGetMin(), localGetSec());
				}
			}
			
			function alertt(){
				alert(localGetMin() +":"+localGetSec());
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
	<div class="row">
		<ol class="linklist breadcrumb">
		  <li><a href="<?php echo base_url().'kelas/pilih/'.$this->session->userdata('idKelas'); ?>">Kelas <?php echo $this->session->userdata('kelas');?> </a></li>
		  <li><a href="<?php echo base_url().'kelas/lihatMateri/'.$this->session->userdata('idMateri'); ?>"><?php echo $this->session->userdata('namaMateri'); ?></a></li>
		</ol>
	</div>
	<div class="row">
		<div class="soalcontainer">
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default paneliMath">
					
						<div class="panel-heading merah">
							
							<h3 class="weight">SOAL</h3>
					
						</div>
						<div class="panel-body abu">
							<?php
								echo '<span class="panelResult">'.$nomor.'</span>';
							 ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default paneliMath">
						<div class="panel-heading hijau"><form name="cd"><h3 class="weight">WAKTU</h3> </div>
						<div class="panel-body abu"><input class="waktuBox panelResult" id="Time" readonly="true" type="text" value="00:00" border="0" name="disp">
							</form>
							<span id="minute"></span>
							<span id="waktuTes"></span></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default paneliMath">
						<div class="panel-heading unguGelap"><h3 class="weight">NILAI</h3></div>
						<div class="panel-body abu"><span class="panelResult"><?php echo $skor; ?> </span> </div>
					</div>
				</div>
			</div>
			<!--<input type="hidden" name="idSoal" value= * echo $idSoal; */ />-->

			<!--Jika belum menjawab(flagNext==FALSE) maka tombol kirim muncul
				Jika telah menjawab(flagNext==TRUE) maka tombol button NextSoal yang muncul-->
		</div>
		<div class="col-md-9">
			<div class="soalText">
				<?php
				if(!$flagNext) {
					echo "<form method=POST action= ".base_url()."index.php/latihan/processJawaban/ >";
					echo '<div class="row">';
					echo '<div class="pertanyaaniMath">';
					echo $pertanyaan."</div>";
					echo '</div>';
					echo '<div class="row gambarSoaliMath">';
					if(!is_null($gambar)){
						echo '<img src="'.base_url().'uploads/'.$gambar.'">';						
					}
					echo '</div>';
					echo '</div>';
					echo '<div class="jawabText">';
					//echo "<input type='text' name='jawab' size='30' required />";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiA' value='".$idOpsiA."' required /> A. ".$desOpsiA."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiB' value='".$idOpsiB."' /> B. ".$desOpsiB."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiC' value='".$idOpsiC."' /> C. ".$desOpsiC."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiD' value='".$idOpsiD."' /> D. ".$desOpsiD."</div>";
					echo "<input type='hidden' name='idOpsiA' value='".$idOpsiA."' />";
					echo "<input type='hidden' name='idOpsiB' value='".$idOpsiB."' />";
					echo "<input type='hidden' name='idOpsiC' value='".$idOpsiC."' />";
					echo "<input type='hidden' name='idOpsiD' value='".$idOpsiD."' />";
					echo "<input type='hidden' name='desOpsiA' value='".$desOpsiA."' />";
					echo "<input type='hidden' name='desOpsiB' value='".$desOpsiB."' />";
					echo "<input type='hidden' name='desOpsiC' value='".$desOpsiC."' />";
					echo "<input type='hidden' name='desOpsiD' value='".$desOpsiD."' />";
					echo "<input type='hidden' name='jawaban' value=".$jawaban." />";
					echo "<input type='hidden' name='namaMateri' value=".$namaMateri." />";
					echo '<div class="row soaliMath">';
					echo "<input type='hidden' name='pembahasan' value='".$pembahasan."' /></div>";
					echo '<div class="row soaliMath">';
					echo "<input class='orangeButton' type='submit' value='Submit' onclick='localStore()' />";
					echo "</form></div>";
					if($flagInit) {
						echo "<script> localClear(); </script>";
					}
				} else {
					echo "<form method=POST action= ".base_url()."index.php/latihan/processSoal/ >";
					echo '<div class="row soaliMath">';
					echo $pertanyaan."</div>";
					echo '<div class="row gambarSoaliMath">';
					if(!is_null($gambar)){
						echo '<img src="'.base_url().'uploads/'.$gambar.'">';
					}
					echo '</div>';
					echo '</div>';
					echo '<div class="jawabText">';
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiA' value='".$idOpsiA."' ".$checkA." /> A. ".$desOpsiA."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiB' value='".$idOpsiB."' ".$checkB." /> B. ".$desOpsiB."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiC' value='".$idOpsiC."' ".$checkC." /> C. ".$desOpsiC."</div>";
					echo '<div class="row soaliMath">';
					echo "<input type='radio' name='jawab' id='idOpsiD' value='".$idOpsiD."' ".$checkD." /> D. ".$desOpsiD."</div>";
					//echo "<input type='text' name='jawab' size='30' value=".$jawab." readonly/>";
					echo "<input type='hidden' name='waktuTes' id='waktutes' value='01' />";
					echo '<div class="row">';
					//echo "</form>";
					
					if($flagJawaban == 1) {
						echo '<div class="result">';
							echo '<div class="row">';
								echo '<div class="col-md-3">';						
									echo '</p><input class="orangeButton" type="submit" value="Lanjut" onclick="localStore()" /></p>';
								echo '</div><br>';
								echo '<div class="col-md-10">';						
									echo "<p><div class='resultBenar'>Kerja yang baik!</div></p>";
									echo "<details>";
									echo "<summary>Lihat Solusi dan Pembahasan</summary></p>";
									echo '<h3 class="textungu weight">Solusi</h3><span class="weight">Jawaban Benar:</span> '.$jawabanBenar.'</td>';									
									echo		'<br><span class="weight">Pembahasan:</span> <br>'.$pembahasanSoal.'';									
									echo "</details>";
								echo '</div>';
							echo '</div>';
						echo '</div>';
					} else {
						echo '<div class="result">';
							echo '<div class="row">';
								echo '<div class="col-md-3">';					
									echo "</p><input class='orangeButton' type='submit' value='Lanjut' onclick='localStore()' /></p>";
								echo '</div><br>';
								echo '<div class="col-md-10">';	
									echo "<p><div class='resultSalah'>Ups, jawabanmu belum benar </div><p>";
								echo '</div>';
							echo '</div>';
							echo '<div class="row">';								
								echo '<div class="col-md-10">';
								//echo "<br/>".$jawabanBenar;
								//echo '<td> Solusi : <br/>'.$jawabanBenar.'</td>';
								echo '<h3 class="textungu weight">Solusi</h3><span class="weight">Jawaban Benar:</span> '.$jawabanBenar.' ';
								echo '<br><span class="weight">Pembahasan:</span> <br> '.$pembahasanSoal;
								echo '</div>';
							echo '</div>';
						echo '</div>';		
					}
					echo "</form>";
				}
				?>
			</div>
		</div>
	</div>
	</div>
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