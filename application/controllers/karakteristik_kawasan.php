<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karakteristik_kawasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_rt');
		$this->load->model('model_master');
		$this->load->model('model_kecamatan');
		$this->load->model('model_kelurahan');
		$this->load->model('model_kawasan');
		$this->load->model('model_karakteristik_kawasan');
		}




	public function index($id=false)
	{
		$data['karakteristik'] = $this->model_karakteristik_kawasan->get($id);

		if ($id!=false) {
			$data['kawasan'] = $this->model_kawasan->get();
			$data['isi_karakteristik'] = $this->model_karakteristik_kawasan->get_isi_karakteristik();
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/karakteristik_kawasan/edit_karakteristik', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			for ($i=0; $i < count($data['karakteristik']); $i++) { 
				$data['karakteristik'][$i]['isi_karakteristik'] = $this->model_karakteristik_kawasan->get_isi_karakteristik($data['karakteristik'][$i]['karakteristik']);
				$data['karakteristik'][$i]['kawasan'] = $this->model_kawasan->get($data['karakteristik'][$i]['id_kawasan']);
					//echo $data['kawasan'][$i]['id'];
			}
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/karakteristik_kawasan/list_karakteristik', $data);
			$this->load->view('template_backoffice/footer');
			//	$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
		}
	}


	public function add()
	{
		$data['kawasan'] = $this->model_kawasan->get();
		$data['isi_karakteristik'] = $this->model_karakteristik_kawasan->get_isi_karakteristik();
		
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/karakteristik_kawasan/add_karakteristik', $data);
		$this->load->view('template_backoffice/footer');
	}

	public function submit()
	{

		$this->form_validation->set_rules('id_kawasan', 'Kawasan', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$data['kawasan'] = $this->model_kawasan->get();
			$data['isi_karakteristik'] = $this->model_karakteristik_kawasan->get_isi_karakteristik();

			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/karakteristik_kawasan/add_karakteristik', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$object  	= $_POST;

			$insert = $this->model_karakteristik_kawasan->add($object);
			if ($insert==true) {
				redirect('karakteristik_kawasan');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('id_kawasan', 'Kawasan', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['karakteristik'] = $this->model_karakteristik_kawasan->get($this->input->post('id'));
			$data['isi_karakteristik'] = $this->model_karakteristik_kawasan->get_isi_karakteristik();
			
			$data['kawasan'] = $this->model_kawasan->get();
			//$this->output->set_content_type('application/json')->set_output(json_encode($data));
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/karakteristik_kawasan/edit_karakteristik', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$object  	= $_POST;

			$update = $this->model_karakteristik_kawasan->edit($object);
			if ($update==true) {
				redirect('karakteristik_kawasan');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($id)
	{
		$this->model_karakteristik_kawasan->delete($id);
		redirect('karakteristik_kawasan');
	}

	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */