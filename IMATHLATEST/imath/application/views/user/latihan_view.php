<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to My Web </title>
	
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
  		// window.location = "yourpage.htm" // redirects to specified page once timer ends and ok button is pressed
 	} else {
 		countDown = setTimeout("redo()",1000);
 	}
}
	
	function localStore() {
		localStoreMin();
		localStoreSec();
		document.getElementById("waktutes").value = localGetMin();
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
	
	function timeAkhir(){
		timeAkhir = mins;
	}
</script>
	
	
</head>

<body>
	<h1 align="center">Kerjakan dengan baik :)</h1>
	<form name="cd">
	Waktu: 
	<input id="Time" readonly="true" type="text" value="00:00" border="0" name="disp">
	</form>
	<span id="minute"></span>
	<h3>Nilai : <?php echo $skor; ?> </h3> 
		<!--<input type="hidden" name="idSoal" value= * echo $idSoal; */ />-->

		<!--Jika belum menjawab(flagNext==FALSE) maka tombol kirim muncul
			Jika telah menjawab(flagNext==TRUE) maka tombol button NextSoal yang muncul-->
		<?php
		if(!$flagNext) {
			echo "<form method=POST action= ".base_url()."index.php/latihan/processJawaban/ >";
			echo "<h1>Soal ".$nomor."</h1>";
			echo "<p>".$pertanyaan."</p>";

			echo "<img src=".base_url()."uploads/".$gambar." >";
			//echo "<input type='text' name='jawab' size='30' required />";
			echo "<input type='radio' name='jawab' id='idOpsiA' value='".$idOpsiA."' required /> A. ".$desOpsiA."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiB' value='".$idOpsiB."' /> B. ".$desOpsiB."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiC' value='".$idOpsiC."' /> C. ".$desOpsiC."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiD' value='".$idOpsiD."' /> D. ".$desOpsiD."<br/><br/>";
			echo "<input type='hidden' name='idOpsiA' value='".$idOpsiA."' />";
			echo "<input type='hidden' name='idOpsiB' value='".$idOpsiB."' />";
			echo "<input type='hidden' name='idOpsiC' value='".$idOpsiC."' />";
			echo "<input type='hidden' name='idOpsiD' value='".$idOpsiD."' />";
			echo "<input type='hidden' name='desOpsiA' value='".$desOpsiA."' />";
			echo "<input type='hidden' name='desOpsiB' value='".$desOpsiB."' />";
			echo "<input type='hidden' name='desOpsiC' value='".$desOpsiC."' />";
			echo "<input type='hidden' name='desOpsiD' value='".$desOpsiD."' />";
			echo "<input type='hidden' name='jawaban' value=".$jawaban." />";
	
			echo "<input type='hidden' name='pembahasan' value='".$pembahasan."' />";
			echo "<input type='submit' value='Submit' onclick='localStore()' />";
			echo "</form>";
			if($flagInit) {
				echo "<script> localClear(); </script>";
			}
		} else {
			echo "<form method=POST action= ".base_url()."index.php/latihan/processSoal/ >";
			echo "<h1>Soal ".$nomor."</h1>";
			echo "<p>".$pertanyaan."</p>";
			echo "<input type='radio' name='jawab' id='idOpsiA' value='".$idOpsiA."' ".$checkA." /> A. ".$desOpsiA."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiB' value='".$idOpsiB."' ".$checkB." /> B. ".$desOpsiB."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiC' value='".$idOpsiC."' ".$checkC." /> C. ".$desOpsiC."<br/>";
			echo "<input type='radio' name='jawab' id='idOpsiD' value='".$idOpsiD."' ".$checkD." /> D. ".$desOpsiD."<br/>";
			//echo "<input type='text' name='jawab' size='30' value=".$jawab." readonly/>";
			echo "<input type='submit' value='Next Soal' onclick='localStore()' />";
			echo "</form>";
			
			if($flagJawaban == 1) {
				echo "Kerja yang baik!";
				echo "<a href=".base_url()."index.php/latihan/solusiTes"." onclick='localClear()'>Lihat Solusi dan Pembahasan</a>";

			} else {
				echo "Ups, jawabanmu belum benar";
				//echo "<br/>".$jawabanBenar;
				//echo '<td> Solusi : <br/>'.$jawabanBenar.'</td>';
				
				
				echo 	'<table>';
				echo	'<tr>';
				echo		'<td> <br/> Solusi : <br/>'.$jawabanBenar.'</td>';
				echo	'</tr>';
				
				echo	'<tr>';
				echo		'<td> <br/> Pembahasan : <br/>'.$pembahasanSoal.'</td>';
				echo	'</tr>';
				echo 	'</table>';

		 
		

		
		
	
			}
			
		}
		?>
	<br/>
	<br/>

	
	
	<a href= "<?php echo base_url()."latihan/keluarTes"; ?>" onclick="localClear()">Keluar</a>
	

		
</body>
</html>