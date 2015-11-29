<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hunian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_hunian');
		$this->load->model('model_master');
		$this->load->model('model_kecamatan');
		$this->load->model('model_kelurahan');
		$this->load->model('model_kawasan');
		}

	
	public function get_isi_master($nama_tabel=false, $id=false)
	{
		$data = $this->model_hunian->get_nilai($nama_tabel, $id);
		
		//$this->output->set_content_type('application/json')->set_output(json_encode($output));
		return $data['isi'];
	}
	public function index($id=false)
	{
		$data['hunian'] = $this->model_hunian->get($id);

		if ($id!=false) {
			$data['kecamatan'] = $this->model_kecamatan->get_kecamatan();
			$data['kelurahan'] = $this->model_kelurahan->get_kelurahan();
			$data['kawasan'] = $this->model_kawasan->get();
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/hunian/edit_hunian', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			for ($i=0; $i < count($data['hunian']); $i++) { 
			//	$data['rt'][$i]['nilai_rt'] = $this->get_nilai_rt($data['rt'][$i]['id']);
				$data['hunian'][$i]['kecamatan'] = $this->model_kecamatan->get_nama_kecamatan($data['hunian'][$i]['id_kec']);
				$data['hunian'][$i]['kelurahan'] = $this->model_kelurahan->get_kelurahan($data['hunian'][$i]['id_kel']);
					//echo $data['kawasan'][$i]['id'];
			}
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/hunian/list_hunian', $data);
			$this->load->view('template_backoffice/footer');
			//	$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
		}
	}

	// public function get_rt_by_kawasan($id=false)
	// {
	// 	$data['rt'] = $this->model_rt->get_rt_by_kawasan($id);

	
	// 		for ($i=0; $i < count($data['rt']); $i++) { 
	// 			$data['rt'][$i]['nilai_rt'] = $this->get_nilai_rt($data['rt'][$i]['id']);
	// 			$data['rt'][$i]['kecamatan'] = $this->model_kecamatan->get_nama_kecamatan($data['rt'][$i]['id_kec']);
	// 			$data['rt'][$i]['kelurahan'] = $this->model_kelurahan->get_kelurahan($data['rt'][$i]['id_kel']);
	// 				//echo $data['kawasan'][$i]['id'];
	// 		}
	// 			$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
		
	// }

	public function add()
	{
		$data['kecamatan'] = $this->model_kecamatan->get_kecamatan();
		$data['kawasan'] = $this->model_kawasan->get();
		$data['master_ada_tidak'] = $this->model_hunian->get_nilai('master_ada_tidak');
		$data['master_air_bersih'] = $this->model_hunian->get_nilai('master_air_bersih');
		$data['master_atap'] = $this->model_hunian->get_nilai('master_atap');
		$data['master_dinding'] = $this->model_hunian->get_nilai('master_dinding');
		$data['master_fungsi'] = $this->model_hunian->get_nilai('master_fungsi');
		$data['master_hub_kk'] = $this->model_hunian->get_nilai('master_hub_kk');
		$data['master_kolom'] = $this->model_hunian->get_nilai('master_kolom');
		$data['master_kondisi'] = $this->model_hunian->get_nilai('master_kondisi');
		$data['master_kondisi_air_bersih'] = $this->model_hunian->get_nilai('master_kondisi_air_bersih');
		$data['master_kuda_kuda'] = $this->model_hunian->get_nilai('master_kuda_kuda');
		$data['master_lancar'] = $this->model_hunian->get_nilai('master_lancar');
		$data['master_lantai'] = $this->model_hunian->get_nilai('master_lantai');
		$data['master_listrik'] = $this->model_hunian->get_nilai('master_listrik');
		$data['master_lokasi_sanitasi'] = $this->model_hunian->get_nilai('master_lokasi_sanitasi');
		$data['master_milik_tanah'] = $this->model_hunian->get_nilai('master_milik_tanah');
		$data['master_pembuangan_drainase'] = $this->model_hunian->get_nilai('master_pembuangan_drainase');
		$data['master_pembuangan_sampah'] = $this->model_hunian->get_nilai('master_pembuangan_sampah');
		$data['master_pendapatan_kapita'] = $this->model_hunian->get_nilai('master_pendapatan_kapita');
		$data['master_plafond'] = $this->model_hunian->get_nilai('master_plafond');
		$data['master_pondasi'] = $this->model_hunian->get_nilai('master_pondasi');
		$data['master_topografi'] = $this->model_hunian->get_nilai('master_topografi');
	
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/hunian/add_hunian', $data);
		$this->load->view('template_backoffice/footer');
	//	$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function submit()
	{

		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/hunian/add_hunian');
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$object  	= $_POST;
			$geometry = $_POST['wkt'];
			$geo['id_kecamatan'] = $_POST['id_kec'];
			$geo['id_kelurahan'] = $_POST['id_kel'];
			$geo['rt'] = $_POST['rt'];
			$geo['rw'] = $_POST['rw'];

			// $nama['foto_bangunan']= pathinfo($_FILES['foto_bangunan']['name'], PATHINFO_FILENAME);
			// if($nama['foto_bangunan']!=""){
			// 	$foto_bangunan 	=	$this->model_master->upload_foto('foto_bangunan', $nama['foto_bangunan']);
			// 	 $object['foto_bangunan']  = substr($foto_bangunan, 0, -4);
			// }
			$insert = $this->model_hunian->add_geo($geo, $geometry);
			unset($object['wkt']);
			$insert = $this->model_hunian->add($object);
			if ($insert==true) {
				redirect('hunian');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['hunian'] = $this->model_hunian->get($this->input->post('id'));
			$data['kecamatan'] = $this->model_kecamatan->get_kecamatan();
			$data['kelurahan'] = $this->model_kelurahan->get_kelurahan();
			$data['kawasan'] = $this->model_kawasan->get();
			//$this->output->set_content_type('application/json')->set_output(json_encode($data));
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/hunian/edit_hunian', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$object  	= $_POST;
			$geometry = $_POST['wkt'];
			$geo['id_kecamatan'] = $_POST['id_kec'];
			$geo['id_kelurahan'] = $_POST['id_kel'];
			$geo['rt'] = $_POST['rt'];
			$geo['rw'] = $_POST['rw'];

			// $nama['foto_bangunan']= pathinfo($_FILES['foto_bangunan']['name'], PATHINFO_FILENAME);
			// if($nama['foto_bangunan']!=""){
			// 	$foto_bangunan 	=	$this->model_master->upload_foto('foto_bangunan', $nama['foto_bangunan']);
			// 	 $object['foto_bangunan']  = substr($foto_bangunan, 0, -4);
			// }
			$insert = $this->model_hunian->edit_geo($geo, $geometry);	
			unset($object['wkt']);
			$update = $this->model_hunian->edit($object);
			if ($update==true) {
				redirect('hunian');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($id)
	{
		$this->model_hunian->delete($id);
		redirect('hunian');
	}

	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */