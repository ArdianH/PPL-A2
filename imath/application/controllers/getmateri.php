<?php
    class TargetBelajarController extends CI_Controller{
        public function index()
        {
            $this->load->model('Materi');
	    
	    $q = $this->input->get('q');
	    $data['materi'] = $this->Materi->getAllMateri($q);
	    $this->load->view('getmateri_view', $data);
	}
}
?>