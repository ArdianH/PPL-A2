<html>
<head>
	<title>Ular Tangga - iMath</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
	<style type="text/css">
		#s1{
			position: absolute;
			left: 32%;
			top: -6%;
		}
		#s2{
			position: absolute;
			left: 54%;
			top: -7%;
		}
		#s3{
			position: absolute;
			left: 49.5%;
			top: -1%;
		}
		#s4{
			position: absolute;
			left: 27%;
			top: 3%;
		}
		#l1{
			position: absolute;
			left: 28.5%;
			top: 30.8%;
		}
		#l2{
			position: absolute;
			left: 50.5%;
			top: 20.8%;
		}
		#l3{
			position: absolute;
			left: 41%;
			top: -19%;
		}
		#player{
			position: absolute;
			left: 74.5%;
			top: 55%;
		}		
		#dice{
			position: absolute;
			left: 74.5%;
			top: 65%;
		}
		td{
			font-size:20px;
		}
		#dialogoverlay{
			display: none;
			opacity: .8;
			position: fixed;
			top: 0px;
			left: 0px;
			background: #FFF;
			width: 100%;
			z-index: 10;
		}
		#dialogbox{
			display: none;
			position: fixed;
			background: #6B4700;
			border-radius:7px; 
			width:550px;
			z-index: 10;
		}
		#dialogbox > div{ background:#FFF; margin:8px; }
		#dialogbox > div > #dialogboxhead{ background: #6B4700; font-size:19px; padding:3px; color:#CCC; text-align:center;}
		#dialogbox > div > #dialogboxbody{ background: #FFFF4D; padding:30px; color:#43433C; text-align:center;}
		#dialogbox > div > #dialogboxfoot{ background: #6B4700; padding:5px; text-align:center; }
	</style>

</head>

<body onload="draw(7)">
<!-- =========================  Navigation Bar iMath =========================== -->
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
						echo '<a href="'.base_url().'admin/dashboard"> DASHBOARD ADMIN </a></li><li>';
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
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'permainan">&nbspPERMAINAN</a></div>';
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
<!-- =========================  Navigation Bar iMath =========================== -->
<div class="container contents">      
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/ut.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard">Permainan Ular Tangga</h2><br>				
				<div class="right">
					<button class="orangeButton" type="button" onclick="loadbuttons()" id="okbtn">Mulai</button>					
				</div>
      			</div>
      		</div>
    	</div> 
	<center>	
	
	<table>
		<form name="snl">
		<tr>
			<td><div id="board"></div></td>
			<td width="30px" height="30px"><div id="dice"></div></td>
		</tr>
		<tr>	
			<td colspan="2" align="center">Sisa Move : <span id="moveLeft"></span></td>	
		</tr>
		<tr>
			<td align="center">				
				<input type="button" value="KELUAR PERMAINAN" onclick="history.go(-1)" id="okbtn">
			</td>
		</tr>
		</form>
	</table>
	</center>
	<div id="player">
	<!--<img src="<?php //echo base_url()?>assets/images/lds/player1.gif" width=70 height=70></img>-->
	</div>
	<div id="dice">
	<!--<img src="<?php //echo base_url()?>assets/images/lds/dice5.png" width=70 height=70></img>-->
	</div>	

	<div id="dialogoverlay"></div>
	<div id="dialogbox">
	  <div>
		<div id="dialogboxhead"></div>
		<div id="dialogboxbody"></div>
		<div id="dialogboxfoot"></div>
	  </div>
	</div>
		
		
	<script type="text/javascript">
	function CustomAlert(){
		this.render = function(dialog){
			var winW = window.innerWidth;
			var winH = window.innerHeight;
			var dialogoverlay = document.getElementById('dialogoverlay');
			var dialogbox = document.getElementById('dialogbox');
			dialogoverlay.style.display = "block";
			dialogoverlay.style.height = winH+"px";
			dialogbox.style.left = (winW/2) - (550 * .5)+"px";
			dialogbox.style.top = "100px";
			dialogbox.style.display = "block";
			document.getElementById('dialogboxhead').innerHTML = "NOTIFIKASI";
			document.getElementById('dialogboxbody').innerHTML = dialog;
			document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
		}
		this.ok = function(){
			document.getElementById('dialogbox').style.display = "none";
			document.getElementById('dialogoverlay').style.display = "none";
		}
	}
	var Alert = new CustomAlert();
	function CustomConfirm(){
		this.render = function(dialog,op,id){
			var winW = window.innerWidth;
			var winH = window.innerHeight;
			var dialogoverlay = document.getElementById('dialogoverlay');
			var dialogbox = document.getElementById('dialogbox');
			dialogoverlay.style.display = "block";
			dialogoverlay.style.height = winH+"px";
			dialogbox.style.left = (winW/2) - (550 * .5)+"px";
			dialogbox.style.top = "100px";
			dialogbox.style.display = "block";
			
			document.getElementById('dialogboxhead').innerHTML = "Confirm that action";
			document.getElementById('dialogboxbody').innerHTML = dialog;
			document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Confirm.yes(\''+op+'\',\''+id+'\')">Yes</button> <button onclick="Confirm.no()">No</button>';
		}
		this.no = function(){
			document.getElementById('dialogbox').style.display = "none";
			document.getElementById('dialogoverlay').style.display = "none";
		}
		this.yes = function(op,id){
			if(op == "delete_post"){
				deletePost(id);
			}
			document.getElementById('dialogbox').style.display = "none";
			document.getElementById('dialogoverlay').style.display = "none";
		}
	}
	var Confirm = new CustomConfirm();
	function CustomPrompt(){
		this.render = function(dialog,func){
			var winW = window.innerWidth;
			var winH = window.innerHeight;
			var dialogoverlay = document.getElementById('dialogoverlay');
			var dialogbox = document.getElementById('dialogbox');
			dialogoverlay.style.display = "block";
			dialogoverlay.style.height = winH+"px";
			dialogbox.style.left = (winW/2) - (550 * .5)+"px";
			dialogbox.style.top = "100px";
			dialogbox.style.display = "block";
			document.getElementById('dialogboxhead').innerHTML = "PERTANYAAN";
			document.getElementById('dialogboxbody').innerHTML = dialog;
			document.getElementById('dialogboxbody').innerHTML += '<br><input id="prompt_value1">';
			document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Prompt.ok(\''+func+'\')">OK</button> <button onclick="Prompt.cancel(\''+func+'\')">Cancel</button>';
		}
		this.cancel = function(func){
			var prompt_value1 = document.getElementById('prompt_value1').value;
			window[func](-9999);
			document.getElementById('dialogbox').style.display = "none";
			document.getElementById('dialogoverlay').style.display = "none";
		}
		this.ok = function(func){
			var prompt_value1 = document.getElementById('prompt_value1').value;
			window[func](prompt_value1);
			document.getElementById('dialogbox').style.display = "none";
			document.getElementById('dialogoverlay').style.display = "none";
		}
	}
	var Prompt = new CustomPrompt();	
	</script>

	<script type="text/javascript">
		var owls=new Array(13,33,43);
		var snakes=new Array([45,31],[42,16],[37,22], [24,5]);	//[src,dst],[src,dst],[src,dst]
		var ladders=new Array([7,21],[12,26],[39,47]);	//[src,dst],[src,dst],[src,dst]
		var playersteps;
		var soal;
		var jawaban;
		var itemp;
		var prevblocktemp;
		var answer = -1;
		var flagAnswer;
		var flagSnake;
		var flagLadder;
		var playernumtemp;
		var numtemp;
		var oldsteptemp;
		var moveLeft = 30;
		
		var jArray= <?php echo json_encode($stringBantuan ); ?>;

	    var jumlahSoal = parseInt(<?php echo count($stringBantuan) ?>);
   		var arrSoal = new Array(jumlahSoal);
    	var arrJawaban = new Array(jumlahSoal);
		
		jArray = shuffleArray(jArray);
		
		for(var i=0;i< jumlahSoal; i++){
	        arrSoal[i] = jArray[i].substring(0,jArray[i].length-5);
	        arrJawaban[i] = jArray[i].substring(jArray[i].length-5);
	    }
		
		function shuffleArray(array) {
	    	for (var i = array.length - 1; i > 0; i--) {
	        	var j = Math.floor(Math.random() * (i + 1));
	        	var temp = array[i];
	        	array[i] = array[j];
	        	array[j] = temp;
	    	}
	    	return array;
		}

		function getSoal(){
			var soal = ""+arrSoal.pop(i);
			return soal;
		}

		function getJawaban(){
			var jawaban = ""+arrJawaban.pop(i);
			return jawaban;
		}		
		
		function sleep(milliseconds) { 
			var start = new Date().getTime(); 
			for (var i = 0; i < 1e7; i++) { 
					if ((new Date().getTime() - start) > milliseconds){ break; } 
			} 
		}	 
		
		
		//this function draws the game board dynamically.
		function draw(num)
		{
			var str="<table border='1'>";
			var x=num*num;								//x adalah jumlah block pada board(nomor block)
			for(i=1;i<=num;i++)							
			{											
				str+="<tr height='70'>";
				
					if(i%2!=0)							// jika nomor baris/row ganjil
					{
						if(i!=1)						
						{
							x=x-num-1;				
						}
						for(j=0;j<num;j++,x--) {
							if(j%2!=0)
								str+="<td width=\"70\" align=\"center\" id=\""+x+"\">"+x+"</td>";
							else
								str+="<td width=\"70\" align=\"center\" id=\""+x+"\">"+x+"</td>";
						}
					}
					else								//jika row genap
					{
						x=x-num+1;						
						for(j=0;j<num;j++,x++) {
							if(j%2!=0)
								str+="<td width=\"70\" align=\"center\" id=\""+x+"\">"+x+"</td>";
							else
								str+="<td width=\"70\" align=\"center\" id=\""+x+"\">"+x+"</td>";
						
						}
					}
				str+="</tr>";
			}
			str+="</table>";							

			document.getElementById("board").innerHTML=str;		//draw board pada div id board.
			newImage = "url(<?php echo base_url()?>assets/images/lds/bg.png)";
            document.getElementById('board').style.backgroundImage = newImage;
			document.getElementById(num*num).innerHTML= "<img src='<?php echo base_url()?>/assets/images/lds/giphy.gif' width=\"70\" height=\"70\"></img>";	//lambang block finish
			document.getElementById(owls[0]).innerHTML="<img src='<?php echo base_url()?>/assets/images/lds/owl2.png' width=\"70\" height=\"70\"></img>";
			document.getElementById(owls[1]).innerHTML="<img src='<?php echo base_url()?>/assets/images/lds/owl1.png' width=\"70\" height=\"70\"></img>";
			document.getElementById(owls[2]).innerHTML="<img src='<?php echo base_url()?>/assets/images/lds/owlt2.png' width=\"70\" height=\"70\"></img>";
	
			
		}		//END OF DRAW BOARD
		
		//this function populates buttons based on the total number of players.
		function loadbuttons()
		{
			totalplayers = 1;

			str=" ";
			for(i=0;i<totalplayers;i++)
			{	
			if(i==0)
			//bisa dibuat onclick karakter = rolldice.
				str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width=70 height=70 id='btn"+i+"' value='player"+(i+1)+"' onclick='startplay(7,"+i+")'></img> &emsp;<i>&lt;&lt; Klik Cloudie untuk kocok dadu</i> <br/>";
			else
				str+="<br/><br/><br/><img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width=70 height=70></img><input type=\"button\" value=\"player "+(i+1)+"\" id=\"btn"+i+"\" onclick=\"startplay(7,"+i+")\" disabled=\"true\"><br/>";
			}
			document.getElementById("player").innerHTML = str;
			playersteps=new Array(totalplayers);
			for(i=0;i<totalplayers;i++) //ga perlu diprune
				playersteps[i]=0;//ga perlu diprune
			//OK button akan disable ketika permainan dimulai.
			document.getElementById("okbtn").disabled=true;

		}
		
		// this function does the work of a dice.
		function rolldice()
		{
			var t=Math.floor((Math.random() * 10));
			dice=(t%6)+1;
			document.getElementById("dice").innerHTML ="<img src='<?php echo base_url()?>assets/images/lds/dice"+dice+".png' width=\"70\" height=\"70\" ></img>";
		}
		

		function setParam(i, prevblock) 
		{
			itemp = i;
			prevblocktemp = prevblock;
			return;
		}

		function setJawabanLadder(val)
		{
			answer = parseInt(val);
			var playernum = playernumtemp;
			var num = numtemp;
			var oldstep = oldsteptemp;
			if(parseInt(answer) !== parseInt(jawaban)) {
				alert("Jawaban kamu Salah.");
			} else {
				playersteps[playernum]=ladders[itemp][1];
				alert("Jawaban kamu Benar! Berhasil naik Tangga dari petak "+prevblocktemp+" ke petak "+playersteps[playernum]+".");				
			}
			
			if(playersteps[playernum]<(num*num))
			{
				if(oldstep!=0)
				{
					str=oldstep;
					for(i=0;i<playersteps.length;i++)
					{
						if(playersteps[i]==oldstep)
							//str+="<img src='<?php echo base_url()?>assets/images/snl/coin"+(i+1)+".gif'></img>"
							str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"					
					}
					document.getElementById(oldstep).innerHTML=str;
				}
				str=playersteps[playernum];
				for(i=0;i<playersteps.length;i++)
				{
					if(playersteps[i]==playersteps[playernum])
						//str+="<img src='<?php echo base_url()?>assets/images/snl/coin"+(i+1)+".gif'></img>"
						str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"				
				}
				document.getElementById(playersteps[playernum]).innerHTML=str;
			}
			else if(playersteps[playernum]==(num*num))
			{
				draw(7);
				Alert.render("<span style='color:green'><b>Selamat Kamu Menang!!</b></span><br/> Skor kamu: "+moveLeft*100+".");
				document.getElementById("player").innerHTML ="";
				document.getElementById("players").value ="1";
				document.getElementById("dice").innerHTML ="";
				document.getElementById("moveLeft").innerHTML =30;
				document.getElementById("okbtn").disabled=false;
				moveLeft = 30;
			}
			else{
				playersteps[playernum]=oldstep;
			}
			playernumtemp = playernum;
			numtemp = num;
			oldsteptemp = oldstep;
			flagLadder = false;
			return;
		}
		
		function setJawabanSnake(val){
			answer = parseInt(val);
			var playernum = playernumtemp;
			var num = numtemp;
			var oldstep = oldsteptemp;
			if(parseInt(answer) !== parseInt(jawaban)) {
				playersteps[playernum]=snakes[itemp][1];
				alert("Jawaban kamu Salah. Menuruni Ular dari petak "+prevblocktemp+" ke petak "+playersteps[playernum]+".");
			} else {
				alert("Jawaban kamu Benar!");			
			}				

			if(playersteps[playernum]<(num*num))
			{
				if(oldstep!=0)
				{
					str=oldstep;
					for(i=0;i<playersteps.length;i++)
					{
						if(playersteps[i]==oldstep)
							//str+="<img src='<?php echo base_url()?>assets/images/snl/coin"+(i+1)+".gif'></img>"
							str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"					
					}
					document.getElementById(oldstep).innerHTML=str;
				}
				str=playersteps[playernum];
				for(i=0;i<playersteps.length;i++)
				{
					if(playersteps[i]==playersteps[playernum])
						//str+="<img src='<?php echo base_url()?>assets/images/snl/coin"+(i+1)+".gif'></img>"
						str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"				
				}
				document.getElementById(playersteps[playernum]).innerHTML=str;
			}
			else if(playersteps[playernum]==(num*num))
			{
				draw(7);
				Alert.render("<span style='color:green'><b>Selamat Kamu Menang!!</b></span><br/> Skor kamu: "+moveLeft*100+".");
				document.getElementById("player").innerHTML ="";
				document.getElementById("players").value ="1";
				document.getElementById("dice").innerHTML ="";
				document.getElementById("moveLeft").innerHTML =30;
				document.getElementById("okbtn").disabled=false;
				moveLeft = 30;
			}
			else{
				playersteps[playernum]=oldstep;
			}
			playernumtemp = playernum;
			numtemp = num;
			oldsteptemp = oldstep;
			flagSnake = false;
			return;
			}
		//the main function which is used to play the game executed by each player button.
		function startplay(num,playernum)
		{
			rolldice();
			oldstep=playersteps[playernum];
			playersteps[playernum]+=dice;
			document.getElementById("moveLeft").innerHTML = --moveLeft;
			//To enable the next players button
			document.getElementById("btn"+playernum).disabled=true;
			chk=-1;
			oldsteptemp = oldstep;
			playernumtemp = playernum;
			numtemp = num;
			i=playernum;
			do
			{
				i++;
				if(i==playersteps.length)
					i=0;
				if(playersteps[i]>=0)
				{
					document.getElementById("btn"+i).disabled=false;
					break;
				}
				else
					document.getElementById("btn"+i).disabled=true;
			}while(i!=playernum);
			
			//Loop to handle the execution if the block reached is a magic door.
			for(i=0;i<owls.length;i++)
			{
				if(playersteps[playernum]==owls[i])
				{
					var t=Math.floor((Math.random() * 100));
					prevblock=playersteps[playernum];
					playersteps[playernum]=(t%(num*num))+1;
					
					//this loop checks if the player reaches again a teleport place then increase its position by 1.
					for(j=0;j<owls.length;j++)
					{
						if(playersteps[playernum]==owls[i])
						{
							playersteps[playernum]++;
							break;
						}
					}
					Alert.render("<span style='color:blue'><b>Magic Owl!!</b></span><br/> Kamu menghilang dari petak "+prevblock+" dan muncul di petak "+playersteps[playernum]+".");
					break;
				}
			}
			
			
			
			//Loop to handle the execution if the block reached is a ladder.
			for(i=0;i<ladders.length;i++)
			{
				if(playersteps[playernum]==ladders[i][0])		//cek jika kotak pemain adalah tangga
				{
					prevblock=playersteps[playernum];			
					//panggil soal disini & cek jawaban.
					flagLadder = true;
					soal = getSoal();
					jawaban = getJawaban();
					setParam(i, prevblock);
					Prompt.render(soal, 'setJawabanLadder');
					break;
				}
			}
			

			//Loop to handle the execution if the block reached is a snake.
			for(i=0;i<snakes.length;i++)
			{
				if(playersteps[playernum]==snakes[i][0])		//cek jika kotak pemain adalah ular
				{
					prevblock=playersteps[playernum];
					flagSnake = true;
					soal = getSoal();
					jawaban = getJawaban();
					setParam(i, prevblock);
					Prompt.render(soal, 'setJawabanSnake');
					break;
				}
			}
			
			//Updating the board based on the players position
			if(parseInt(moveLeft) > 0) 
			{
				if(playersteps[playernum]<(num*num) && !flagSnake && !flagLadder && parseInt(moveLeft)>0)
				{
					if(oldstep!=0)
					{
						str=oldstep;
						for(i=0;i<playersteps.length;i++)
						{
							if(playersteps[i]==oldstep)
								//str+="<img src='<?php echo base_url()?>assets/images/snl/"+(i+1)+".gif'></img>"
								str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"
						}
						document.getElementById(oldstep).innerHTML=str;
					}
					str=playersteps[playernum];
					for(i=0;i<playersteps.length;i++)
					{
						if(playersteps[i]==playersteps[playernum])
							//str+="<img src='<?php echo base_url()?>assets/images/snl/coin"+(i+1)+".gif'></img>"
							str+="<img src='<?php echo base_url()?>assets/images/lds/player"+(i+1)+".gif' width='50' height='50'></img>"
					}
					document.getElementById(playersteps[playernum]).innerHTML=str;
				}
				else if(playersteps[playernum]==(num*num) && !flagLadder && !flagSnake && parseInt(moveLeft)>0)
				{
					draw(7);
					Alert.render("<span style='color:green'><b>Selamat Kamu Menang!!</b></span><br/> Skor kamu: "+moveLeft*100+".");
					document.getElementById("player").innerHTML ="";
					document.getElementById("dice").innerHTML ="";
					document.getElementById("moveLeft").innerHTML =30;
					document.getElementById("okbtn").disabled=false;
					moveLeft = 30;
					
					jArray= <?php echo json_encode($stringBantuan ); ?>;
					jumlahSoal = <?php echo count($stringBantuan) ?>;
					jumlahSoal = parseInt(jumlahSoal);
					arrSoal = new Array(jumlahSoal);
					arrJawaban = new Array(jumlahSoal);
					jArray = shuffleArray(jArray);
					for(var i=0;i< jumlahSoal; i++){
						arrSoal[i] = jArray[i].substring(0,jArray[i].length-5);
						arrJawaban[i] = jArray[i].substring(jArray[i].length-5);
					}
				}
				else if(playersteps[playernum]>(num*num) && !flagLadder && !flagSnake && parseInt(moveLeft)>0){
					playersteps[playernum]=oldstep;
				}
				else {
				}
				
			}else {
					draw(7);
					Alert.render("<span style='color:red'><b>Game Over</b></span><br/> Kamu kalah kehabisan langkah :(");
					document.getElementById("player").innerHTML ="";
					//document.getElementById("players").value ="1";
					document.getElementById("dice").innerHTML ="";
					document.getElementById("moveLeft").innerHTML =30;
					document.getElementById("okbtn").disabled=false;
					moveLeft = 30;
					jArray= <?php echo json_encode($stringBantuan ); ?>;
					jumlahSoal = <?php echo count($stringBantuan) ?>;
					jumlahSoal = parseInt(jumlahSoal);
					arrSoal = new Array(jumlahSoal);
					arrJawaban = new Array(jumlahSoal);
					jArray = shuffleArray(jArray);
					for(var i=0;i< jumlahSoal; i++){
						arrSoal[i] = jArray[i].substring(0,jArray[i].length-5);
						arrJawaban[i] = jArray[i].substring(jArray[i].length-5);
			}
				
		}

		}
		
	</script>	
</div>
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>           
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p class="footerColor">Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	</footer>
</body>

</html>