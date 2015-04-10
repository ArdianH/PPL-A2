//thescript.js of Tugas 3 PPW by Shirley Anugrah Hayati

/**	
===========================================================================================================
	Fungsi yang dijalankan setiap kali user menekan button search. Fungsi ini melakukan:
	1.  Memproses input user yaitu kata (search) yang dicari
	2. Menghitung berapa kali user telah men-search
	3. Menghitung berapa kali user men-search kata yang sama
============================================================================================================
*/
function show()
{		
	var str = document.getElementById("search").value; //mengambil isi dari kotak search
	if(str != "")
	{	
		localStorage.str = str; 
		localStorage.isReset = "false"; //ketika ada input baru, berarti localStorage.isReset = false (tidak direset)
		process(str); //memproses input
		counter(); //menambah counter ketika input dimasukkan
		pair(str); //membuat relasi antara input dengan banyaknya input itu diberikan user		
	}
	else
	{
		alert("No query asked, please write your query"); //jika user tidak memasukkan apa-apa, namun hanya mengklik button, pesan ini ditampilkan
		localStorage.str = "";
	}
}

/**	
===========================================================================================================
	Fungsi ini menambahkan localStorage.counter setiap kali user me-request query
============================================================================================================
*/
function counter()
{		
	if(typeof(Storage)!=="undefined") //periksa apakah browser mendukung web storage
	{
		if(localStorage.counter) //jika localStorage.counter sudah ada, ditambah 1 terus
		{
			localStorage.counter=Number(localStorage.counter)+1;
		}
		else
		{
			localStorage.counter=1;
		}		
	}
	else
	{
		alert("Sorry, your browser does not support web storage...");
	}
}
/**	
===========================================================================================================
	Fungsi ini mereset semua data statistik
============================================================================================================
*/
function reset()
{	
	localStorage.counter = 0;
	localStorage.count = 0;
	localStorage.all = "";
	localStorage.keyArray = null;
	localStorage.numArray = null;		
	
	document.getElementById("counter").innerHTML= 0;
	document.getElementById("keyNum").innerHTML= "Empty";	
	document.getElementById("chart").innerHTML= "";
	localStorage.isReset = true; //true menandakan dalam posisi awal (nol, belum ada isi) semua
}

//variabel sementara
var keyArray; 
var numArray; 

/**	
===========================================================================================================
	Fungsi ini menyimpan/mengambil array ke/darilocalStorage
	Array harus diubah ke string dulu
	localStorage.keyArray menyimpan key atau query yang dimasukkan user
	localStorage.numArray menyimpan banyaknya query yang sudah dimasukkan user
============================================================================================================
*/
function localArray(action, array1, array2)
{	
	if(typeof(Storage)!=="undefined")
	{	
		if(action == "set") //jika perintahnya set, berarti menyimpan array ke localStoragge
		{
			if(localStorage.keyArray && localStorage.numArray) //jika localStorage.keyArray dan localStorage.numArray sudah ada
			{
				var joinedArray1 = array1.join("|"); //menggabungkan semua elemen array1 dengan pembatas | untuk antara elemen ke-(n) dan ke-(n+1)
				localStorage.keyArray = joinedArray1; //simpan ke localStorage.keyArray
			
				var joinedArray2 = array2.join("|"); //menggabungkan semua elemen array2 dengan pembatas | untuk antara elemen ke-(n) dan ke-(n+1)
				localStorage.numArray = joinedArray2; //simpan ke localStorage.numArray
			}
			else //jika localStorage.keyArray dan localStorage.numArray belum ada
			{
				localStorage.keyArray = array1.toString(); //ubah array1 jadi string simpan ke localStorage.keyArray
				localStorage.numArray = array2.toString(); //ubah array2 jadi string simpan ke localStorage.keyArray
			}
		}
		else if(action == "get") //jika perintahnya get, berarti mengambil array dari localStoragge
		{
			var getArray1 = localStorage.keyArray;
			keyArray = getArray1.split("|"); //string dari localStorage.keyArray yang disimpan ke getArray1 displit dengan pembatasnya "|" lalu disimpan ke variabel keyArray
			
			var getArray2 = localStorage.numArray;
			numArray = getArray2.split("|"); //string dari localStorage.numArray yang disimpan ke getArray2 displit dengan pembatasnya "|" lalu disimpan ke variabel numArray
		}
	}
}

/**	
==================================================================================================================
	Fungsi ini membuat relasi antara anggota keyArray dengan anggota numArray [Mirip HashMap/HashSet di Java]
	Misal user memasukkan "C", "A", "C" ke search box, maka pair( ) akan memasangkan A dengan 1, dan C dengan 2
	yang artinya A dimasukkan 1 kali dan C dimasukkan 2 kali
	Urutan penulisan berdasarkan karakter yang paling kecil ditampilkan di paling atas, misalnya A < C, A di paling atas
===================================================================================================================
*/
function pair(key)
{
	var count = localStorage.count; //variabel lokal count
	if(localStorage.count == 0) //ketika localStorage.count masih, nol berarti membuat array baru
	{
		keyArray = new Array(); 
		keyArray[0] = key; //masukkan key yang dimasukkan user ke dalam keyArray index ke-0
		numArray = new Array();
		numArray[0] = 1;	//banyaknya key itu dimasukkan user pasti 1, jadi numArray index ke-0 berisi 1
		count++; 
	}
	else //jika localStorage.count > 0
	{
		localArray("get", keyArray, numArray); //ambil array dari localStorage
		var flag = false; //untuk menandakan query yang berbeda. False jika query beda, true jika query sama
		
		//Looping mengecek seluruh elemen keyArray apakah key baru sudah ada di array atau belum 
		for(var i = 0; i < keyArray.length; i++)
		{
			//jika ditemukan ada yang sama, flag jadi true, kemudian isi numArray ke-i ditambah 1
			if(key == keyArray[i]) 
			{
				flag = true
				numArray[i] = Number(numArray[i]) + 1;
				break; //keluar loop
			}
		}
		
		//Jika key belum ada di keyArray
		if(flag == false)
		{
			keyArray[count] = key; //masukkan key ke dalam keyArray sebagai elemen paling akhir
			numArray[count] = 1; //masukkan 1 ke numArray sebagai elemen paling akhir
			count++;			
		}
	}
	sort(keyArray, numArray); //sort keyArray dan numArray sesuai dengan karakter anggota keyArray
	localArray("set", keyArray, numArray); //simpan array ke local storage
	localStorage.count = count; //simpan count terbaru ke localStorage.count
	
	var all = "";
	for(var i = 0; i < count; i++)
	{			
		var str = keyArray[i] + " {" + numArray[i] + "} <br>"; //memasangkan elemen keyArray dengan elemen numArray dengan dijadikan string
		all = all + str;
	}	
	localStorage.all = all; //simpan ke localStorage.all semua gabungkan isi array
}

/**	
===========================================================================================================
	Fungsi ini mengurutkan dua anggota array dengan algoritma Selection Sort
	Array b bergantung pada array a 
	a untuk diisi keyArray dan b diisi numArray
============================================================================================================
*/
function sort(a, b)
{		
	for(var i = 0; i < a.length; i++)
	{
		var min = i;		
		for(var j = i+1; j <a.length; j++)
		{
			if(a[j] < a[min])
				min = j;		
		}		
		var tmp1 = a[i];
		var tmp2 = b[i];
		a[i] = a[min];
		b[i] = b[min];		
		a[min] = tmp1;
		b[min] = tmp2;
	}	
}

/**	
===========================================================================================================
	Fungsi ini memproses input search user untuk mencari skripsi yang berhubungan dengan input search user
	diambil dari webservice "http://mahasiswa.cs.ui.ac.id/~rizal.fa/ajax/skripsi.php?q=" dengan AJAX
============================================================================================================
*/
function process(str)
{	
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("result").innerHTML=xmlhttp.responseText; //Ambil objek JSON
			var hasil = JSON.parse(xmlhttp.responseText); //parse objek JSON ke hasil
			var cetakHasil = "";
			
			//Loop sepanjang hasil
			for(var i = 0; i <hasil.length; i++)
			{
				//Ambil judul buku, jika judul tidak ada, judul = "TIDAK ADA JUDUL"
				var judul = hasil[i].judul;
				if(judul == null)
					judul = "<em>[ TIDAK ADA JUDUL ]</em>";

				//Ambil nama pengarang, jika pengarang tidak ada, pengarang = unknown
				var pengarang = hasil[i].pengarang;
				if(pengarang == null)
					pengarang = "<em>unknown</em>";
					
				//Ambil lokasi
				var lokasi = hasil[i].lokasi;
					
				//Ambil abstrak, jika abstrak tidak ada, nanti akan ditampilkan "Abstrak tidak tersedia"
				var abstrak = hasil[i].abstrak;
				if(abstrak == null)
					abstrak = "Abstrak tidak tersedia";

				//Menggabung semua informasi yang diinginkan ke satu variabel, yaitu semua
				var semua = "<p><strong> " + judul + "</strong></p><p>Penulis: " + pengarang + " | Lokasi: " + lokasi +
				"</p><details><summary>Abstrak</summary> " + abstrak + "</details><br><hr><br>"; 
				cetakHasil = cetakHasil + semua; //lalu ditambahkan dengan hasil yang ingin ditampilkan terus menerus selama looping
			}

			if(cetakHasil != "") //jika ada skripsi yang berhubungan dengan query yang ditanyakan di search box, tampilkan hasilnya
				document.getElementById("result").innerHTML = "<div id = \"resultStr\">Result(s) for " + str + ": </div>" + cetakHasil;
			else //jika ternyata tidak ada skripsi yang sesuai dengan query, tampilkan tidak ada hasil ditemukan untuk query tersebut
				document.getElementById("result").innerHTML = "<div id = \"resultStr\">No result found for " + str + "</div>";
		}
	}
	//kirim request ke server
	xmlhttp.open("GET","http://mahasiswa.cs.ui.ac.id/~rizal.fa/ajax/skripsi.php?q="+str,true); 
	xmlhttp.send();
}

/**	
===========================================================================================================
	Fungsi ini mengalikan 750 dengan (number/total) untuk nanti dipakai sebagai panjang batang dari diagram batang
	750 px adalah panjang maksimal bar
	@return 750*(number/total)
============================================================================================================
*/
function size(number, total)
{
	return number*750/total;
}

/**	
===========================================================================================================
	Fungsi ini mencari persentase dari rasio number/total
	@return 100*(number/total)
============================================================================================================
*/
function percentage(number, total)
{
	return number*100/total;
}

/**	
===========================================================================================================
	Fungsi untuk membuat diagram batang (bar chart)	
============================================================================================================
*/
function makeChart()
{
	var myChart = "";
	
	localArray("get", keyArray, numArray); //Ambil keyArray dan numArray dari localStorage
	
	//Looping sepanjang keyArray untuk membuat chart
	for(i = 0; i < keyArray.length; i++)
	{
		myChart = myChart + "<p>" + keyArray[i] + " [" + numArray[i] + "]</p>" + //tampilkan query dengan banyaknya query di atas gambar batang/bar
		"<img src=\"Bar.png\" alt=\"bar\" height=\"55\" width=\"" + size(numArray[i], localStorage.counter) + "\"> " + //tampilkan gambar batang (bar) dengan panjang (banyaknya query ke-i/total banyaknya query)*750
		percentage(numArray[i], localStorage.counter) + "&#37; <br>"; //Untuk persentase (query/total query)
	}
	
	document.getElementById("chart").innerHTML = myChart; //Menampilkan chart/diagramnya
}

/**	
===========================================================================================================
	Fungsi ini dijalankan setiap kali halaman statistics.html dibuka
============================================================================================================
*/
function statisticsStarter()
{	
	//Jika sebelumnya tidak direset, tampilkan tampilan statistik sebelumnya
	if(localStorage.isReset == "false")
	{
		if(localStorage.counter)
			document.getElementById("counter").innerHTML= localStorage.counter;
		else
			document.getElementById("counter").innerHTML= 0;
	
		if(localStorage.all)
			document.getElementById("keyNum").innerHTML = localStorage.all;
		else
			document.getElementById("keyNum").innerHTML = "Empty";
	
		if(localStorage.count == null)
			localStorage.count = 0;
	
		makeChart(); //buat chart
	}
	else
	{
		document.getElementById("keyNum").innerHTML = "Empty";
		document.getElementById("counter").innerHTML = 0;
//		isReset();
	}
}