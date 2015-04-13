<html>
    <head>        
	<title>Buat Materi</title>
    </head>
    <body>    
    <h1>Gambar </h1> 
    <form method="POST" action="<?php echo base_url()?>index.php/admin/gambar_controller" enctype="multipart/form-data">
		<input type="file" name="userfile1" id="userfile1" size="20" />
	</p>
	<p>
		<?php echo form_label('File 2', 'userfile2') ?>
		<?php echo form_upload('userfile2') ?>
	</p>
	<p>
		<?php echo form_label('File 3', 'userfile3') ?>
		<?php echo form_upload('userfile3') ?>
	</p>
	<p>
		<?php echo form_label('File 4', 'userfile4') ?>
		<?php echo form_upload('userfile4') ?>
	</p>
	<input type="submit" name="submit" value="Simpan" />
	</form>
	
    </body>
</html>

