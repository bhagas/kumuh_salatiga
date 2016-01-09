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
	public function get_hunian($rt=false, $rw=false, $id_kecamatan=false, $id_kelurahan=false)
	{
		$data['data'] = $this->model_hunian->get_hunian($rt, $rw, $id_kecamatan, $id_kelurahan);
		
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		//return $data['isi'];
	}
	public function index($id=false)
	{
		$data['hunian'] = $this->model_hunian->get($id);

		if ($id!=false) {
			$data['kecamatan'] = $this->model_kecamatan->get_kecamatan();
			$data['kelurahan'] = $this->model_kelurahan->get_kelurahan();
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
		

			$nama['foto_fungsi']= pathinfo($_FILES['foto_fungsi']['name'], PATHINFO_FILENAME);
			if($nama['foto_fungsi']!=""){
				$foto_fungsi 	=	$this->model_master->upload_foto('foto_fungsi', $nama['foto_fungsi']);
				 $object['foto_fungsi']  = substr($foto_fungsi, 0, -4);
			}
			$nama['foto_r_tamu']= pathinfo($_FILES['foto_r_tamu']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_tamu']!=""){
				$foto_r_tamu 	=	$this->model_master->upload_foto('foto_r_tamu', $nama['foto_r_tamu']);
				 $object['foto_r_tamu']  = substr($foto_r_tamu, 0, -4);
			}
			$nama['foto_r_tidur']= pathinfo($_FILES['foto_r_tidur']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_tidur']!=""){
				$foto_r_tidur 	=	$this->model_master->upload_foto('foto_r_tidur', $nama['foto_r_tidur']);
				 $object['foto_r_tidur']  = substr($foto_r_tidur, 0, -4);
			}
			$nama['foto_dapur']= pathinfo($_FILES['foto_dapur']['name'], PATHINFO_FILENAME);
			if($nama['foto_dapur']!=""){
				$foto_dapur 	=	$this->model_master->upload_foto('foto_dapur', $nama['foto_dapur']);
				 $object['foto_dapur']  = substr($foto_dapur, 0, -4);
			}

			$nama['foto_km_wc']= pathinfo($_FILES['foto_km_wc']['name'], PATHINFO_FILENAME);
			if($nama['foto_km_wc']!=""){
				$foto_km_wc 	=	$this->model_master->upload_foto('foto_km_wc', $nama['foto_km_wc']);
				 $object['foto_km_wc']  = substr($foto_km_wc, 0, -4);
			}
			$nama['foto_r_lain']= pathinfo($_FILES['foto_r_lain']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_lain']!=""){
				$foto_r_lain 	=	$this->model_master->upload_foto('foto_r_lain', $nama['foto_r_lain']);
				 $object['foto_r_lain']  = substr($foto_r_lain, 0, -4);
			}
			$nama['foto_topografi']= pathinfo($_FILES['foto_topografi']['name'], PATHINFO_FILENAME);
			if($nama['foto_topografi']!=""){
				$foto_topografi 	=	$this->model_master->upload_foto('foto_topografi', $nama['foto_topografi']);
				 $object['foto_topografi']  = substr($foto_topografi, 0, -4);
			}
			$nama['foto_lantai']= pathinfo($_FILES['foto_lantai']['name'], PATHINFO_FILENAME);
			if($nama['foto_lantai']!=""){
				$foto_lantai 	=	$this->model_master->upload_foto('foto_lantai', $nama['foto_lantai']);
				 $object['foto_lantai']  = substr($foto_lantai, 0, -4);
			}
			$nama['foto_dinding']= pathinfo($_FILES['foto_dinding']['name'], PATHINFO_FILENAME);
			if($nama['foto_dinding']!=""){
				$foto_dinding 	=	$this->model_master->upload_foto('foto_dinding', $nama['foto_dinding']);
				 $object['foto_dinding']  = substr($foto_dinding, 0, -4);
			}
			$nama['foto_atap']= pathinfo($_FILES['foto_atap']['name'], PATHINFO_FILENAME);
			if($nama['foto_atap']!=""){
				$foto_atap 	=	$this->model_master->upload_foto('foto_atap', $nama['foto_atap']);
				 $object['foto_atap']  = substr($foto_atap, 0, -4);
			}
			$nama['foto_plafond']= pathinfo($_FILES['foto_plafond']['name'], PATHINFO_FILENAME);
			if($nama['foto_plafond']!=""){
				$foto_plafond 	=	$this->model_master->upload_foto('foto_plafond', $nama['foto_plafond']);
				 $object['foto_plafond']  = substr($foto_plafond, 0, -4);
			}
			$nama['foto_pondasi']= pathinfo($_FILES['foto_pondasi']['name'], PATHINFO_FILENAME);
			if($nama['foto_pondasi']!=""){
				$foto_pondasi 	=	$this->model_master->upload_foto('foto_pondasi', $nama['foto_pondasi']);
				 $object['foto_pondasi']  = substr($foto_pondasi, 0, -4);
			}
			$nama['foto_kolom']= pathinfo($_FILES['foto_kolom']['name'], PATHINFO_FILENAME);
			if($nama['foto_kolom']!=""){
				$foto_kolom 	=	$this->model_master->upload_foto('foto_kolom', $nama['foto_kolom']);
				 $object['foto_kolom']  = substr($foto_kolom, 0, -4);
			}
			$nama['foto_kuda_kuda']= pathinfo($_FILES['foto_kuda_kuda']['name'], PATHINFO_FILENAME);
			if($nama['foto_kuda_kuda']!=""){
				$foto_kuda_kuda 	=	$this->model_master->upload_foto('foto_kuda_kuda', $nama['foto_kuda_kuda']);
				 $object['foto_kuda_kuda']  = substr($foto_kuda_kuda, 0, -4);
			}
			$nama['foto_pintu']= pathinfo($_FILES['foto_pintu']['name'], PATHINFO_FILENAME);
			if($nama['foto_pintu']!=""){
				$foto_pintu 	=	$this->model_master->upload_foto('foto_pintu', $nama['foto_pintu']);
				 $object['foto_pintu']  = substr($foto_pintu, 0, -4);
			}
			$nama['foto_jendela']= pathinfo($_FILES['foto_jendela']['name'], PATHINFO_FILENAME);
			if($nama['foto_jendela']!=""){
				$foto_jendela 	=	$this->model_master->upload_foto('foto_jendela', $nama['foto_jendela']);
				 $object['foto_jendela']  = substr($foto_jendela, 0, -4);
			}
			$nama['foto_roaster']= pathinfo($_FILES['foto_roaster']['name'], PATHINFO_FILENAME);
			if($nama['foto_roaster']!=""){
				$foto_roaster 	=	$this->model_master->upload_foto('foto_roaster', $nama['foto_roaster']);
				 $object['foto_roaster']  = substr($foto_roaster, 0, -4);
			}
			$nama['foto_air_bersih']= pathinfo($_FILES['foto_air_bersih']['name'], PATHINFO_FILENAME);
			if($nama['foto_air_bersih']!=""){
				$foto_air_bersih 	=	$this->model_master->upload_foto('foto_air_bersih', $nama['foto_air_bersih']);
				 $object['foto_air_bersih']  = substr($foto_air_bersih, 0, -4);
			}
			$nama['foto_pembuangan_sampah']= pathinfo($_FILES['foto_pembuangan_sampah']['name'], PATHINFO_FILENAME);
			if($nama['foto_pembuangan_sampah']!=""){
				$foto_pembuangan_sampah 	=	$this->model_master->upload_foto('foto_pembuangan_sampah', $nama['foto_pembuangan_sampah']);
				 $object['foto_pembuangan_sampah']  = substr($foto_pembuangan_sampah, 0, -4);
			}
			$nama['foto_lantai_kmwc']= pathinfo($_FILES['foto_lantai_kmwc']['name'], PATHINFO_FILENAME);
			if($nama['foto_lantai_kmwc']!=""){
				$foto_lantai_kmwc 	=	$this->model_master->upload_foto('foto_lantai_kmwc', $nama['foto_lantai_kmwc']);
				 $object['foto_lantai_kmwc']  = substr($foto_lantai_kmwc, 0, -4);
			}
			$nama['foto_saluran']= pathinfo($_FILES['foto_saluran']['name'], PATHINFO_FILENAME);
			if($nama['foto_saluran']!=""){
				$foto_saluran 	=	$this->model_master->upload_foto('foto_saluran', $nama['foto_saluran']);
				 $object['foto_saluran']  = substr($foto_saluran, 0, -4);
			}
			
			$nama['foto_dinding_kmwc']= pathinfo($_FILES['foto_dinding_kmwc']['name'], PATHINFO_FILENAME);
			if($nama['foto_dinding_kmwc']!=""){
				$foto_dinding_kmwc 	=	$this->model_master->upload_foto('foto_dinding_kmwc', $nama['foto_dinding_kmwc']);
				 $object['foto_dinding_kmwc']  = substr($foto_dinding_kmwc, 0, -4);
			}
			$nama['foto_lokasi_sanitasi']= pathinfo($_FILES['foto_lokasi_sanitasi']['name'], PATHINFO_FILENAME);
			if($nama['foto_lokasi_sanitasi']!=""){
				$foto_lokasi_sanitasi 	=	$this->model_master->upload_foto('foto_lokasi_sanitasi', $nama['foto_lokasi_sanitasi']);
				 $object['foto_lokasi_sanitasi']  = substr($foto_lokasi_sanitasi, 0, -4);
			}

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
		

			$nama['foto_fungsi']= pathinfo($_FILES['foto_fungsi']['name'], PATHINFO_FILENAME);
			if($nama['foto_fungsi']!=""){
				$foto_fungsi 	=	$this->model_master->upload_foto('foto_fungsi', $nama['foto_fungsi']);
				 $object['foto_fungsi']  = substr($foto_fungsi, 0, -4);
			}
			$nama['foto_r_tamu']= pathinfo($_FILES['foto_r_tamu']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_tamu']!=""){
				$foto_r_tamu 	=	$this->model_master->upload_foto('foto_r_tamu', $nama['foto_r_tamu']);
				 $object['foto_r_tamu']  = substr($foto_r_tamu, 0, -4);
			}
			$nama['foto_r_tidur']= pathinfo($_FILES['foto_r_tidur']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_tidur']!=""){
				$foto_r_tidur 	=	$this->model_master->upload_foto('foto_r_tidur', $nama['foto_r_tidur']);
				 $object['foto_r_tidur']  = substr($foto_r_tidur, 0, -4);
			}
			$nama['foto_dapur']= pathinfo($_FILES['foto_dapur']['name'], PATHINFO_FILENAME);
			if($nama['foto_dapur']!=""){
				$foto_dapur 	=	$this->model_master->upload_foto('foto_dapur', $nama['foto_dapur']);
				 $object['foto_dapur']  = substr($foto_dapur, 0, -4);
			}

			$nama['foto_km_wc']= pathinfo($_FILES['foto_km_wc']['name'], PATHINFO_FILENAME);
			if($nama['foto_km_wc']!=""){
				$foto_km_wc 	=	$this->model_master->upload_foto('foto_km_wc', $nama['foto_km_wc']);
				 $object['foto_km_wc']  = substr($foto_km_wc, 0, -4);
			}
			$nama['foto_r_lain']= pathinfo($_FILES['foto_r_lain']['name'], PATHINFO_FILENAME);
			if($nama['foto_r_lain']!=""){
				$foto_r_lain 	=	$this->model_master->upload_foto('foto_r_lain', $nama['foto_r_lain']);
				 $object['foto_r_lain']  = substr($foto_r_lain, 0, -4);
			}
			$nama['foto_topografi']= pathinfo($_FILES['foto_topografi']['name'], PATHINFO_FILENAME);
			if($nama['foto_topografi']!=""){
				$foto_topografi 	=	$this->model_master->upload_foto('foto_topografi', $nama['foto_topografi']);
				 $object['foto_topografi']  = substr($foto_topografi, 0, -4);
			}
			$nama['foto_lantai']= pathinfo($_FILES['foto_lantai']['name'], PATHINFO_FILENAME);
			if($nama['foto_lantai']!=""){
				$foto_lantai 	=	$this->model_master->upload_foto('foto_lantai', $nama['foto_lantai']);
				 $object['foto_lantai']  = substr($foto_lantai, 0, -4);
			}
			$nama['foto_dinding']= pathinfo($_FILES['foto_dinding']['name'], PATHINFO_FILENAME);
			if($nama['foto_dinding']!=""){
				$foto_dinding 	=	$this->model_master->upload_foto('foto_dinding', $nama['foto_dinding']);
				 $object['foto_dinding']  = substr($foto_dinding, 0, -4);
			}
			$nama['foto_atap']= pathinfo($_FILES['foto_atap']['name'], PATHINFO_FILENAME);
			if($nama['foto_atap']!=""){
				$foto_atap 	=	$this->model_master->upload_foto('foto_atap', $nama['foto_atap']);
				 $object['foto_atap']  = substr($foto_atap, 0, -4);
			}
			$nama['foto_plafond']= pathinfo($_FILES['foto_plafond']['name'], PATHINFO_FILENAME);
			if($nama['foto_plafond']!=""){
				$foto_plafond 	=	$this->model_master->upload_foto('foto_plafond', $nama['foto_plafond']);
				 $object['foto_plafond']  = substr($foto_plafond, 0, -4);
			}
			$nama['foto_pondasi']= pathinfo($_FILES['foto_pondasi']['name'], PATHINFO_FILENAME);
			if($nama['foto_pondasi']!=""){
				$foto_pondasi 	=	$this->model_master->upload_foto('foto_pondasi', $nama['foto_pondasi']);
				 $object['foto_pondasi']  = substr($foto_pondasi, 0, -4);
			}
			$nama['foto_kolom']= pathinfo($_FILES['foto_kolom']['name'], PATHINFO_FILENAME);
			if($nama['foto_kolom']!=""){
				$foto_kolom 	=	$this->model_master->upload_foto('foto_kolom', $nama['foto_kolom']);
				 $object['foto_kolom']  = substr($foto_kolom, 0, -4);
			}
			$nama['foto_kuda_kuda']= pathinfo($_FILES['foto_kuda_kuda']['name'], PATHINFO_FILENAME);
			if($nama['foto_kuda_kuda']!=""){
				$foto_kuda_kuda 	=	$this->model_master->upload_foto('foto_kuda_kuda', $nama['foto_kuda_kuda']);
				 $object['foto_kuda_kuda']  = substr($foto_kuda_kuda, 0, -4);
			}
			$nama['foto_pintu']= pathinfo($_FILES['foto_pintu']['name'], PATHINFO_FILENAME);
			if($nama['foto_pintu']!=""){
				$foto_pintu 	=	$this->model_master->upload_foto('foto_pintu', $nama['foto_pintu']);
				 $object['foto_pintu']  = substr($foto_pintu, 0, -4);
			}
			$nama['foto_jendela']= pathinfo($_FILES['foto_jendela']['name'], PATHINFO_FILENAME);
			if($nama['foto_jendela']!=""){
				$foto_jendela 	=	$this->model_master->upload_foto('foto_jendela', $nama['foto_jendela']);
				 $object['foto_jendela']  = substr($foto_jendela, 0, -4);
			}
			$nama['foto_roaster']= pathinfo($_FILES['foto_roaster']['name'], PATHINFO_FILENAME);
			if($nama['foto_roaster']!=""){
				$foto_roaster 	=	$this->model_master->upload_foto('foto_roaster', $nama['foto_roaster']);
				 $object['foto_roaster']  = substr($foto_roaster, 0, -4);
			}
			$nama['foto_air_bersih']= pathinfo($_FILES['foto_air_bersih']['name'], PATHINFO_FILENAME);
			if($nama['foto_air_bersih']!=""){
				$foto_air_bersih 	=	$this->model_master->upload_foto('foto_air_bersih', $nama['foto_air_bersih']);
				 $object['foto_air_bersih']  = substr($foto_air_bersih, 0, -4);
			}
			$nama['foto_pembuangan_sampah']= pathinfo($_FILES['foto_pembuangan_sampah']['name'], PATHINFO_FILENAME);
			if($nama['foto_pembuangan_sampah']!=""){
				$foto_pembuangan_sampah 	=	$this->model_master->upload_foto('foto_pembuangan_sampah', $nama['foto_pembuangan_sampah']);
				 $object['foto_pembuangan_sampah']  = substr($foto_pembuangan_sampah, 0, -4);
			}
			$nama['foto_lantai_kmwc']= pathinfo($_FILES['foto_lantai_kmwc']['name'], PATHINFO_FILENAME);
			if($nama['foto_lantai_kmwc']!=""){
				$foto_lantai_kmwc 	=	$this->model_master->upload_foto('foto_lantai_kmwc', $nama['foto_lantai_kmwc']);
				 $object['foto_lantai_kmwc']  = substr($foto_lantai_kmwc, 0, -4);
			}
			$nama['foto_saluran']= pathinfo($_FILES['foto_saluran']['name'], PATHINFO_FILENAME);
			if($nama['foto_saluran']!=""){
				$foto_saluran 	=	$this->model_master->upload_foto('foto_saluran', $nama['foto_saluran']);
				 $object['foto_saluran']  = substr($foto_saluran, 0, -4);
			}
			
			$nama['foto_dinding_kmwc']= pathinfo($_FILES['foto_dinding_kmwc']['name'], PATHINFO_FILENAME);
			if($nama['foto_dinding_kmwc']!=""){
				$foto_dinding_kmwc 	=	$this->model_master->upload_foto('foto_dinding_kmwc', $nama['foto_dinding_kmwc']);
				 $object['foto_dinding_kmwc']  = substr($foto_dinding_kmwc, 0, -4);
			}
			$nama['foto_lokasi_sanitasi']= pathinfo($_FILES['foto_lokasi_sanitasi']['name'], PATHINFO_FILENAME);
			if($nama['foto_lokasi_sanitasi']!=""){
				$foto_lokasi_sanitasi 	=	$this->model_master->upload_foto('foto_lokasi_sanitasi', $nama['foto_lokasi_sanitasi']);
				 $object['foto_lokasi_sanitasi']  = substr($foto_lokasi_sanitasi, 0, -4);
			}
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