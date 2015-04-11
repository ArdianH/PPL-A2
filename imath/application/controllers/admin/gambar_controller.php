<?php
class gambar_controller extends CI_Controller{
	
	public function index()
	{
	    // Has the form been posted?
	    if (isset($_POST['submit']))
	    {
		// Load the library - no config specified here
		$this->load->library('upload');

		// Check if there was a file uploaded - there are other ways to
		// check this such as checking the 'error' for the file - if error
		// is 0, you are good to code
		if (!empty($_FILES['userfile1']['name']))
		{
		    // Specify configuration for File 1
		    $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '100';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';       

		    // Initialize config for File 1
		    $this->upload->initialize($config);

		    // Upload file 1
		    if ($this->upload->do_upload('userfile1'))
		    {
			$data = $this->upload->data();
		    }
		    else
		    {
			echo $this->upload->display_errors();
		    }

		}

		// Do we have a second file?
		if (!empty($_FILES['userfile2']['name']))
		{
		    // Config for File 2 - can be completely different to file 1's config
		    // or if you want to stick with config for file 1, do nothing!
		    $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '100';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';

		    // Initialize the new config
		    $this->upload->initialize($config);

		    // Upload the second file
		    if ($this->upload->do_upload('userfile2'))
		    {
			$data = $this->upload->data();
		    }
		    else
		    {
			echo $this->upload->display_errors();
		    }

		}
		
		// Do we have a second file?
		if (!empty($_FILES['userfile3']['name']))
		{
		    // Config for File 2 - can be completely different to file 1's config
		    // or if you want to stick with config for file 1, do nothing!
		    $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '100';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';

		    // Initialize the new config
		    $this->upload->initialize($config);

		    // Upload the second file
		    if ($this->upload->do_upload('userfile3'))
		    {
			$data = $this->upload->data();
		    }
		    else
		    {
			echo $this->upload->display_errors();
		    }

		}
		
		// Do we have a second file?
		if (!empty($_FILES['userfile4']['name']))
		{
		    // Config for File 2 - can be completely different to file 1's config
		    // or if you want to stick with config for file 1, do nothing!
		    $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '100';
		    $config['max_width']  = '1024';
		    $config['max_height']  = '768';

		    // Initialize the new config
		    $this->upload->initialize($config);

		    // Upload the second file
		    if ($this->upload->do_upload('userfile4'))
		    {
			$data = $this->upload->data();
		    }
		    else
		    {
			echo $this->upload->display_errors();
		    }

		}
	    }
	    else
	    {
		$this->load->view('admin/gambar_view');
	    }
	}
}
?>