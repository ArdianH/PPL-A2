<html>
    <head>
	<title>Rapor</title>
    </head>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#pilihmateri").change(function(){
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
			var location = baseUrl + "/index.php/rapor/hasil/1/" + $("#pilihkelas").val() + "/" + $("#pilihmateri").val();
			var coba;
			$.getJSON(location, function(data, status){
				jumlahData = data.jumlahData;
				hasil = data.hasil
				//alert("Data: " + coba + "\nStatus: " + status);				
				$('#number').html(data.jumlahData); //isi id = "number" dengan data
				$('#rata-rata').html(data.hasil);
				var result = JSON.stringify(data.result);
				//var data = json_decode(result, TRUE);
				var array = result.split('}');				
				(function( $ ){
					$.fn.makeChart = function() {
					//alert('Haaaiiii...'+ jumlahData + " " + hasil);
					
					// Declare some common variables and container elements
					
					
					
					
					
					
					
					
					
					
					$('#chart').html("<h1>"+array[0]+"</h1>");
					return this;
					}; 
				})( jQuery );
				$('#chart').makeChart();

			});
		});
		
		

		
		$('#pilihmateri').change();
	});
	//http://www.smashingmagazine.com/2011/09/23/create-an-animated-bar-graph-with-html-css-and-jquery/

		//function makeChart(int jumlahData, int hasil)
	//{
			//var myChart = "";
			
			
			//localArray("get", keyArray, numArray); //Ambil keyArray dan numArray dari localStorage
			
			//Looping sepanjang keyArray untuk membuat chart
			//for(i = 0; i < data.parse.length; i++)
			//{
				//myChart = myChart + "<p>" + keyArray[i] + " [" + numArray[i] + "]</p>" + //tampilkan query dengan banyaknya query di atas gambar batang/bar
				//"<img src=\"Bar.png\" alt=\"bar\" height=\"55\" width=\"" + size(numArray[i], localStorage.counter) + "\"> " + //tampilkan gambar batang (bar) dengan panjang (banyaknya query ke-i/total banyaknya query)*750
				//percentage(numArray[i], localStorage.counter) + "&#37; <br>"; //Untuk persentase (query/total query)
			//}
			
			//document.getElementById("chart").innerHTML = myChart; //Menampilkan chart/diagramnya
	//		$('#chart').html(jumlahData);
	//}	
	</script>
    <body>
	    <h1>RAPOR</h1> 		
		<form method="GET" action="" >
		<?php foreach($kelas_model as $row):?>			
		<a href="<?php echo base_url() ?>index.php/rapor/view/<?php echo $row->idKelas?>"> <?php echo $row->idKelas ?></a>		
		<?php endforeach?>
		<input id="pilihkelas" type="hidden" name="idKelas" value="<?php 
			$url=current_url();

			$arr = explode("/",$url);
			$length = count($arr);
			echo $arr[$length - 1];			
		?>">
	<br>
		<select name ="idMateri" id="pilihmateri" onchange="showAlertBox()">
		<?php foreach($result as $row):?>			
		<option value="<?php echo $row->idMateri; ?>" ><?php echo $row->nama ?></option>
		<?php endforeach?>
		</select>
	
	<br>			
	</form>
	<a href="<?php echo base_url()."index.php/rapor/ambilTerbaru/1/SD001/1"?>">trigger</a>
	<h1>Ringkasan</h1>
	<p>Total Latihan: <span id="number"></span></p>
	<p>Rata-rata Nilai: <span id="rata-rata"></span></p>
	<p>chart: <span id="chart"></span></p>
    </body>
</html>