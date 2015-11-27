<?php 

class Peta extends CI_Controller {
        
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		header('Access-Control-Allow-Origin: *');
    	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$this->load->model('model_master');
	}


	public function index()
	{
		$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/peta/petane-v2');
			$this->load->view('template_backoffice/footer');
	}

	
}

/* End of file jalan.php */
/* Location: ./application/controllers/jalan.php */