<html>
    <head>
	<title>soal</title>
	<script>
		$('#f_city, #f_city_label').hide();
		$('#f_state').change(function(){
		    var state_id = $('#f_state').val();
		    if (state_id != ""){
		        var post_url = "/index.php/soalcontroller/getmateribykelas" + state_id;
		        $.ajax({
		            type: "POST",
		             url: post_url,
		             success: function(idKelas) //we're calling the response json array 'cities'
		              {
		                $('#f_city').empty();
		                $('#f_city, #f_city_label').show();
		                   $.each(cities,function(id,city) 
		                   {
		                    var opt = $('<option />'); // here we're creating a new select option for each group
		                      opt.val(id);
		                      opt.text(city);
		                      $('#f_city').append(opt); 
		                });
		               } //end success
		         }); //end AJAX
		    } else {
		        $('#f_city').empty();
		        $('#f_city, #f_city_label').hide();
		    }//end if
		});
	</script>
    </head>
    
    <body>
     <a href=" <?php echo base_url();?>index.php/soalcontroller/createview"><button> Buat Baru</button></a>

    <form method="POST" action="<?php echo base_url();?>index.php/soalcontroller/viewsoal">
    <select name ="idKelas" onchange="showMateri(this.value)">
	<?php foreach($Kelas as $row):?>			
	<option value="<?php echo $row->idKelas ?>" ><?php echo $row->idKelas ?></option>
	<?php endforeach?>
	<input type="submit" value="Submit" />
</form>

    <h1> Daftar soal </h1>
    <table>
	<?php foreach($result as $row):?>	
	<td>
		<?php echo $row->idsoal ?>
	</td>
	<td>
		<?php echo $row->pertanyaan ?>
	</td>
	<td>
		<?php echo $row->jawaban ?>
	</td>
	<td>
		<?php echo $row->deskripsiJawaban ?>
	</td>
	<td>
	<a href="<?php echo base_url();?>index.php/soalcontroller/detail/<?php echo $row->idsoal ?>">
                                    <button type="submit">Lihat</button></a>
	</td>
	<td>
	<!-- Edit Button-->
	<a href="<?php echo base_url();?>index.php/soalcontroller/edit/<?php echo $row->idsoal ?>">
                                    <button type="submit">Edit</button></a>
	</td>
	<td>
	<!-- Hapus Button-->
	<a href="<?php echo base_url();?>index.php/soalcontroller/delete/<?php echo $row->idsoal ?>">
                                    <button type="submit">Hapus</button></a>
	</td>
        </tr>
    <?php endforeach; ?>
	</table>

    </body>
</html>