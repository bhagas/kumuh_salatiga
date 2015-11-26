<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rt extends CI_Controller {

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
		}

	public function get_nilai_kumuh($nilai=false, $nama_tabel=false)
	{
		$data['data'] = $this->model_master->get_nilai($nama_tabel);
		foreach ($data['data'] as $item) {
			//$item['min'];
			if($nilai >= $item['min'] && $nilai<=$item['max']){
				$output['nilai'] = $item['nilai'];
				$output['ket'] = $item['ket'];
				break;
			}else{
				$output['nilai'] = 1;
				$output['ket'] = "Nilai berada dibawah ketentuan";
				
			}
		}	
		//$this->output->set_content_type('application/json')->set_output(json_encode($output));
		return $output['nilai'];
	}

		public function get_nilai_prioritas($nilai=false, $nama_tabel=false)
	{
		$data['data'] = $this->model_master->get_nilai_prioritas($nama_tabel);
		foreach ($data['data'] as $item) {
			//$item['min'];
			if($nilai == $item['id']){
				$output['nilai'] = $item['nilai'];
				$output['ket'] = $item['ket'];
				break;
			}else{
				$output['nilai'] = 1;
				$output['ket'] = "Nilai berada dibawah / diatas ketentuan";
	
				
			}
		}	
		//$this->output->set_content_type('application/json')->set_output(json_encode($output));
		return $output['nilai'];
	}
	public function get_nilai_rt($id_rt=false)
	{

		$data['data'] = $this->model_master->get_kawasan_by_id($id_rt);
		if($data['data']){
		$i=0;

		foreach ($data['data'] as $item) {
			//tingkat kekumuhan
			$data['data'][$i]['keteraturan_bangunan'] = $this->get_nilai_kumuh($item['keteraturan_bangunan'], "keteraturan_bangunan");
			$data['data'][$i]['ketentuan_kepadatan'] = $this->get_nilai_kumuh($item['ketentuan_kepadatan'], "ketentuan_kepadatan");
			$data['data'][$i]['syarat_teknis_bangunan'] = $this->get_nilai_kumuh($item['syarat_teknis_bangunan'], "syarat_teknis_bangunan");
			$data['data'][$i]['area_tidak_terlayani_jalan'] = $this->get_nilai_kumuh($item['area_tidak_terlayani_jalan'], "area_tidak_terlayani_jalan");
			$data['data'][$i]['jalan_buruk'] = $this->get_nilai_kumuh($item['jalan_buruk'], "jalan_buruk");
			$data['data'][$i]['akses_air_minum'] = $this->get_nilai_kumuh($item['akses_air_minum'], "akses_air_minum");
			$data['data'][$i]['tidak_terpenuhi_air_minum'] = $this->get_nilai_kumuh($item['tidak_terpenuhi_air_minum'], "tidak_terpenuhi_air_minum");
			$data['data'][$i]['area_genangan'] = $this->get_nilai_kumuh($item['area_genangan'], "area_genangan");
			$data['data'][$i]['tidak_ada_drainase'] = $this->get_nilai_kumuh($item['tidak_ada_drainase'], "tidak_ada_drainase");
			$data['data'][$i]['drainase_tidak_terhubung'] = $this->get_nilai_kumuh($item['drainase_tidak_terhubung'], "drainase_tidak_terhubung");
			$data['data'][$i]['drainase_kotor'] = $this->get_nilai_kumuh($item['drainase_kotor'], "drainase_kotor");
			$data['data'][$i]['konstruksi_drainase_buruk'] = $this->get_nilai_kumuh($item['konstruksi_drainase_buruk'], "konstruksi_drainase_buruk");
			$data['data'][$i]['sistem_air_limbah'] = $this->get_nilai_kumuh($item['sistem_air_limbah'], "sistem_air_limbah");
			$data['data'][$i]['sarpras_air_limbah'] = $this->get_nilai_kumuh($item['sarpras_air_limbah'], "sarpras_air_limbah");
			$data['data'][$i]['sarpras_sampah'] = $this->get_nilai_kumuh($item['sarpras_sampah'], "sarpras_sampah");
			$data['data'][$i]['sistem_sampah'] = $this->get_nilai_kumuh($item['sistem_sampah'], "sistem_sampah");
			$data['data'][$i]['sarpras_sampah_pelihara'] = $this->get_nilai_kumuh($item['sarpras_sampah_pelihara'], "sarpras_sampah_pelihara");
			$data['data'][$i]['prasarana_bakar'] = $this->get_nilai_kumuh($item['prasarana_bakar'], "prasarana_bakar");
			$data['data'][$i]['sarana_bakar'] = $this->get_nilai_kumuh($item['sarana_bakar'], "sarana_bakar");

			$data['data'][$i]['nilai'] = $data['data'][$i]['keteraturan_bangunan'] + $data['data'][$i]['ketentuan_kepadatan'] + $data['data'][$i]['syarat_teknis_bangunan'] + $data['data'][$i]['area_tidak_terlayani_jalan'];
			$data['data'][$i]['nilai'] = $data['data'][$i]['nilai'] + $data['data'][$i]['jalan_buruk'] + $data['data'][$i]['akses_air_minum'] + $data['data'][$i]['tidak_terpenuhi_air_minum'] + $data['data'][$i]['area_genangan'];
			$data['data'][$i]['nilai'] = $data['data'][$i]['nilai'] + $data['data'][$i]['tidak_ada_drainase'] + $data['data'][$i]['drainase_tidak_terhubung'] + $data['data'][$i]['drainase_kotor'] + $data['data'][$i]['konstruksi_drainase_buruk'];
		 	$data['data'][$i]['nilai'] = $data['data'][$i]['nilai'] + $data['data'][$i]['sistem_air_limbah'] + $data['data'][$i]['sarpras_air_limbah'] + $data['data'][$i]['sarpras_sampah'] + $data['data'][$i]['sistem_sampah'] + $data['data'][$i]['sarpras_sampah_pelihara'];
		 	$data['data'][$i]['nilai'] = $data['data'][$i]['nilai'] + $data['data'][$i]['prasarana_bakar'] + $data['data'][$i]['sarana_bakar'];
			if($data['data'][$i]['nilai'] <= 34){
				$data['data'][$i]['tingkat'] = "Kumuh Ringan";
			}else if( $data['data'][$i]['nilai'] >= 35 && $data['data'][$i]['nilai'] <= 54){
				$data['data'][$i]['tingkat'] = "Kumuh Sedang";
			}else if($data['data'][$i]['nilai'] >= 55){
					$data['data'][$i]['tingkat'] = "Kumuh Berat";				
			}
		
			//end
			//prioritas penaganan
			$data['data'][$i]['kawasan_strategis'] = $this->get_nilai_prioritas($item['kawasan_strategis'], "kawasan_strategis");
			$data['data'][$i]['kepadatan_penduduk'] = $this->get_nilai_prioritas($item['kepadatan_penduduk'], "kepadatan_penduduk");
			$data['data'][$i]['potensi_sosek'] = $this->get_nilai_prioritas($item['potensi_sosek'], "potensi_sosek");
			$data['data'][$i]['dukungan_masyarakat'] = $this->get_nilai_prioritas($item['dukungan_masyarakat'], "dukungan_masyarakat");
			$data['data'][$i]['komitmen_pemda'] = $this->get_nilai_prioritas($item['komitmen_pemda'], "komitmen_pemda");

			$data['data'][$i]['nilai_pertimbangan'] = $data['data'][$i]['kawasan_strategis'] + $data['data'][$i]['kepadatan_penduduk'] + $data['data'][$i]['potensi_sosek'] + $data['data'][$i]['dukungan_masyarakat'];
			$data['data'][$i]['nilai_pertimbangan'] = $data['data'][$i]['nilai_pertimbangan'] + $data['data'][$i]['komitmen_pemda'];
			if($data['data'][$i]['nilai_pertimbangan'] <= 11){
				$data['data'][$i]['pertimbangan'] = "Rendah";
			}else if( $data['data'][$i]['nilai_pertimbangan'] >= 12 && $data['data'][$i]['nilai_pertimbangan'] <= 18){
				$data['data'][$i]['pertimbangan'] = "Sedang";
			}else if($data['data'][$i]['nilai_pertimbangan'] >= 25){
					$data['data'][$i]['pertimbangan'] = "Tinggi";				
			}
		
			//end
			// legalitas
			if($item['status_tanah'] == 1){
				$data['data'][$i]['status_tanah']  = 1;
			} else 	if($item['status_tanah'] == 2){
				$data['data'][$i]['status_tanah']  = -1;
			}
			if($item['sesuai_rtrw'] == 1){
				$data['data'][$i]['sesuai_rtrw']  = 1;
			} else 	if($item['sesuai_rtrw'] == 2){
				$data['data'][$i]['sesuai_rtrw']  = -1;
			}
			if($item['imb'] == 1){
				$data['data'][$i]['imb']  = 1;
			} else 	if($item['imb'] == 2){
				$data['data'][$i]['imb']  = -1;
			}
			$data['data'][$i]['nilai_legal'] = $data['data'][$i]['status_tanah'] + $data['data'][$i]['sesuai_rtrw'] + $data['data'][$i]['imb'];

			if($data['data'][$i]['nilai_legal'] >= 1){
				$data['data'][$i]['legal'] = "LEGAL";
			}else{
				$data['data'][$i]['legal'] = "ILEGAL";
			}
			//end
			//nilai total
			if($data['data'][$i]['tingkat'] == "Kumuh Berat" && $data['data'][$i]['pertimbangan'] == "Tinggi"){
				$data['data'][$i]['prioritas'] = 1;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Sedang" && $data['data'][$i]['pertimbangan'] == "Tinggi"){
				$data['data'][$i]['prioritas'] = 2;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Ringan" && $data['data'][$i]['pertimbangan'] == "Tinggi"){
				$data['data'][$i]['prioritas'] = 3;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Berat" && $data['data'][$i]['pertimbangan'] == "Sedang"){
				$data['data'][$i]['prioritas'] = 4;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Sedang" && $data['data'][$i]['pertimbangan'] == "Sedang"){
				$data['data'][$i]['prioritas'] = 5;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Ringan" && $data['data'][$i]['pertimbangan'] == "Sedang"){
				$data['data'][$i]['prioritas'] = 6;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Berat" && $data['data'][$i]['pertimbangan'] == "Rendah"){
				$data['data'][$i]['prioritas'] = 7;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Sedang" && $data['data'][$i]['pertimbangan'] == "Rendah"){
				$data['data'][$i]['prioritas'] = 8;
			}else if($data['data'][$i]['tingkat'] == "Kumuh Ringan" && $data['data'][$i]['pertimbangan'] == "Rendah"){
				$data['data'][$i]['prioritas'] = 9;
			}


			//penanganan
			if($data['data'][$i]['prioritas'] == 1 or  $data['data'][$i]['prioritas'] == 4 or $data['data'][$i]['prioritas'] == 7){
				if($data['data'][$i]['legal'] == "LEGAL"){
					$data['data'][$i]['penanganan'] = "Pemukiman Kembali atau Peremajaan";
				}else if($data['data'][$i]['legal'] == "ILEGAL"){
					$data['data'][$i]['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Peremajaan";
				}
			}else if($data['data'][$i]['prioritas'] == 2 or  $data['data'][$i]['prioritas'] == 5 or $data['data'][$i]['prioritas'] == 8){
				if($data['data'][$i]['legal'] == "LEGAL"){
					$data['data'][$i]['penanganan'] = "Peremajaan";
				}else if($data['data'][$i]['legal'] == "ILEGAL"){
					$data['data'][$i]['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Peremajaan";
				}
			} else if($data['data'][$i]['prioritas'] == 3 or  $data['data'][$i]['prioritas'] == 6 or $data['data'][$i]['prioritas'] == 9){
				if($data['data'][$i]['legal'] == "LEGAL"){
					$data['data'][$i]['penanganan'] = "Pemugaran";
				}else if($data['data'][$i]['legal'] == "ILEGAL"){
					$data['data'][$i]['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Pemugaran";
				}
			} 
		 $i++;
		}	
	}else{
		//$data['nama_kawasan'] = '-';
		//$data['sk_penetapan'] = '-';
		$data['nilai'] = 0;
	
		$data['penanganan'] = '-';
		$data['legal'] = '-';
		$data['prioritas'] = '-';
		$data['pertimbangan'] = '-';
		$data['tingkat'] = '-';
	}
			
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		return $data;
	}

	public function index($id=false)
	{
		$data['rt'] = $this->model_rt->get($id);

		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/rt/edit_rt', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			for ($i=0; $i < count($data['rt']); $i++) { 
				$data['rt'][$i]['nilai_rt'] = $this->get_nilai_rt($data['rt'][$i]['id']);
				$data['rt'][$i]['kecamatan'] = $this->model_kecamatan->get_nama_kecamatan($data['rt'][$i]['id_kec']);
				$data['rt'][$i]['kelurahan'] = $this->model_kelurahan->get_kelurahan($data['rt'][$i]['id_kel']);
					//echo $data['kawasan'][$i]['id'];
			}
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/rt/list_rt', $data);
			$this->load->view('template_backoffice/footer');
			//	$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
		}
	}

	public function add()
	{
		$data['kecamatan'] = $this->model_kecamatan->get_kecamatan();
		$data['kawasan'] = $this->model_kawasan->get();

		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/rt/add_rt', $data);
		$this->load->view('template_backoffice/footer');
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
			$this->load->view('content_backoffice/rt/add_rt');
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$object  	= $_POST;

			$nama['foto_bangunan']= pathinfo($_FILES['foto_bangunan']['name'], PATHINFO_FILENAME);
			if($nama['foto_bangunan']!=""){
				$foto_bangunan 	=	$this->model_master->upload_foto('foto_bangunan', $nama['foto_bangunan']);
				 $object['foto_bangunan']  = substr($foto_bangunan, 0, -4);
			}
			$nama['foto_jalan']= pathinfo($_FILES['foto_jalan']['name'], PATHINFO_FILENAME);
			if($nama['foto_jalan']!=""){
				$foto_jalan 	=	$this->model_master->upload_foto('foto_jalan', $nama['foto_jalan']);
				 $object['foto_jalan']  = substr($foto_jalan, 0, -4);
			}
				$nama['foto_air_minum']= pathinfo($_FILES['foto_air_minum']['name'], PATHINFO_FILENAME);
			if($nama['foto_air_minum']!=""){
				$foto_air_minum 	=	$this->model_master->upload_foto('foto_air_minum', $nama['foto_air_minum']);
				 $object['foto_air_minum']  = substr($foto_air_minum, 0, -4);
			}
			$nama['foto_drainase']= pathinfo($_FILES['foto_drainase']['name'], PATHINFO_FILENAME);
			if($nama['foto_drainase']!=""){
				$foto_drainase 			  =	$this->model_master->upload_foto('foto_drainase', $nama['foto_drainase']);
				$object['foto_drainase']  = substr($foto_drainase, 0, -4);
			}
			$nama['foto_sampah']= pathinfo($_FILES['foto_sampah']['name'], PATHINFO_FILENAME);
			if($nama['foto_sampah']!=""){
				$foto_sampah 	=	$this->model_master->upload_foto('foto_sampah', $nama['foto_sampah']);
				 $object['foto_sampah']  = substr($foto_sampah, 0, -4);
			}
			$insert = $this->model_rt->add($object);
			if ($insert==true) {
				redirect('rt');
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
			$data['rt'] = $this->model_rt->get($this->input->post('id'));

			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/rt/edit_rt', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_rt->edit();
			if ($update==true) {
				redirect('rt');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($id)
	{
		$this->model_rt->delete($id);
		redirect('rt');
	}

	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */