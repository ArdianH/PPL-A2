<html>
    <head>        
	<title>Buat Materi</title>
    </head>
    <body>    
    <h1>Gambar </h1> 
		<?php echo form_open_multipart('admin/gambar_controller');  ?>
	<p>
		<?php echo form_label('File 1', 'userfile1') ?>
		<?php echo form_upload('userfile1') ?>
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
	<p><?php echo form_submit('submit', 'Upload them files!') ?></p>
	<?php form_close() ?>
	
    </body>
</html>

