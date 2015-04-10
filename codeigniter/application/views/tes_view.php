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
 	secs--;
 	if(secs == -1) {
  		secs = 59;
  		mins--;
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
	
	function alertt(){
		alert(localGetMin() +":"+localGetSec());
	}

	window.onload = cekSession;;
</script>
	
</head>

<body bgcolor="orange">
	<h1 align="center" style="color:red">Silahkan Mengerjakan Tes</h1>
	<form name="cd">
	Waktu Tersisa : 
	<input id="Time" readonly="true" type="text" value="00:00" border="0" name="disp">
	</form>
	<span id="minute"></span>
	<h3>Total Skor : <?php echo $skor; ?> </h3> 
		<!--<input type="hidden" name="idSoal" value= * echo $idSoal; */ />-->

		<!--Jika belum menjawab(flagNext==FALSE) maka tombol kirim muncul
			Jika telah menjawab(flagNext==TRUE) maka tombol button NextSoal yang muncul-->
		<?php
		
		if(!$flagNext) {
			echo "<form method=POST action= ".base_url()."tes/processJawaban/ >";
			echo "<h1>Soal ".$nomor."</h1>";
			echo "<p>".$pertanyaan."</p>";
			//echo "<input type='text' name='jawab' size='30' required />";
			echo "<input type='radio' name='jawab' id='opsiA' value='".$opsiA."' required /> A. ".$opsiA."<br/>";
			echo "<input type='radio' name='jawab' id='opsiB' value='".$opsiB."' /> B. ".$opsiB."<br/>";
			echo "<input type='radio' name='jawab' id='opsiC' value='".$opsiC."' /> C. ".$opsiC."<br/>";
			echo "<input type='radio' name='jawab' id='opsiD' value='".$opsiD."' /> D. ".$opsiD."<br/><br/>";
			echo "<input type='hidden' name='opsiA' value='".$opsiA."' />";
			echo "<input type='hidden' name='opsiB' value='".$opsiB."' />";
			echo "<input type='hidden' name='opsiC' value='".$opsiC."' />";
			echo "<input type='hidden' name='opsiD' value='".$opsiD."' />";
			echo "<input type='hidden' name='jawaban' value=".$jawaban." />";
			echo "<input type='submit' value='Kirim' onclick='localStore()' />";
			echo "</form>";
			if($flagInit) {
				echo "<script> localClear(); </script>";
			}
		} else {
			echo "<form method=POST action= ".base_url()."tes/processSoal/ >";
			echo "<h1>Soal ".$nomor."</h1>";
			echo "<p>".$pertanyaan."</p>";
			echo "<input type='radio' name='jawab' id='opsiA' value='".$opsiA."' ".$checkA." /> A. ".$opsiA."<br/>";
			echo "<input type='radio' name='jawab' id='opsiB' value='".$opsiB."' ".$checkB." /> B. ".$opsiB."<br/>";
			echo "<input type='radio' name='jawab' id='opsiC' value='".$opsiC."' ".$checkC." /> C. ".$opsiC."<br/>";
			echo "<input type='radio' name='jawab' id='opsiD' value='".$opsiD."' ".$checkD." /> D. ".$opsiD."<br/>";
			//echo "<input type='text' name='jawab' size='30' value=".$jawab." readonly/>";
			echo "<input type='submit' value='Next Soal' onclick='localStore()' />";
			echo "</form>";
			
			if($flagJawaban == 1) {
				echo "Jawaban Anda Benar!";
			} else {
				echo "Jawaban Anda Salah :(";
			}
			
		}
		?>
	<br/>
	<br/>
	<a href= "<?php echo "#" ?>" onclick="localStore()">Store</a>
	<a href= "<?php echo "#" ?>" onclick="printMinSec()">print</a>
	<a href= "<?php echo "#" ?>" onclick="alertt()">all</a>
	<a href= "<?php echo base_url()."tes/keluarTes"; ?>" onclick="localClear()">Keluar Tes</a>
	
</body>
</html>