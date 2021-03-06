<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kawasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_kawasan');
		$this->load->model('model_master');
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
				$output['nilai'] = 0;
				$output['ket'] = "Bukan Kawasan Kumuh";
				
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
				$output['nilai'] = 0;
				$output['ket'] = "Nilai berada dibawah / diatas ketentuan";
	
				
			}
		}	
		//$this->output->set_content_type('application/json')->set_output(json_encode($output));
		return $output['nilai'];
	}
	public function get_nilai_kawasan($id_kawasan=false)
	{

		$data['data'] = $this->model_master->get_kawasan($id_kawasan);
		if($data['data']){
		$i=0;
		$kawasan['nama_kawasan'] = $data['data'][0]['nama_kawasan'];
		$kawasan['sk_penetapan'] = $data['data'][0]['sk_penetapan'];
		$kawasan['nilai_total'] = 0;
		//$kawasan['nilai'] = 0;
		$kawasan['nilai_pertimbangan_total'] = 0;
		$kawasan['nilai_legal_total'] = 0;

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
			}else if( $data['data'][$i]['nilai'] > 34 && $data['data'][$i]['nilai'] < 55){
				$data['data'][$i]['tingkat'] = "Kumuh Sedang";
			}else if($data['data'][$i]['nilai'] >= 55){
					$data['data'][$i]['tingkat'] = "Kumuh Berat";				
			}
			//	$this->output->set_content_type('application/json')->set_output(json_encode($data['data'][0]['tingkat']));
	
			$kawasan['nilai_total'] = $kawasan['nilai_total'] + $data['data'][$i]['nilai'];
		
			//end
			//prioritas penaganan
			$item['kepadatan_penduduk'] =explode(".", $item['kepadatan_penduduk']);
			$item['kepadatan_penduduk'] = $item['kepadatan_penduduk'][0];
			$data['data'][$i]['kawasan_strategis'] = $this->get_nilai_prioritas($item['kawasan_strategis'], "kawasan_strategis");
			$data['data'][$i]['kepadatan_penduduk'] = $this->get_nilai_prioritas($item['kepadatan_penduduk'], "kepadatan_penduduk");
			$data['data'][$i]['potensi_sosek'] = $this->get_nilai_prioritas($item['potensi_sosek'], "potensi_sosek");
			$data['data'][$i]['dukungan_masyarakat'] = $this->get_nilai_prioritas($item['dukungan_masyarakat'], "dukungan_masyarakat");
			$data['data'][$i]['komitmen_pemda'] = $this->get_nilai_prioritas($item['komitmen_pemda'], "komitmen_pemda");

			$data['data'][$i]['nilai_pertimbangan'] = $data['data'][$i]['kawasan_strategis'] + $data['data'][$i]['kepadatan_penduduk'] + $data['data'][$i]['potensi_sosek'] + $data['data'][$i]['dukungan_masyarakat'];
			$data['data'][$i]['nilai_pertimbangan'] = $data['data'][$i]['nilai_pertimbangan'] + $data['data'][$i]['komitmen_pemda'];
			
			
			if($data['data'][$i]['nilai_pertimbangan'] <= 11){
				$data['data'][$i]['pertimbangan'] = "Rendah";
			}else if( $data['data'][$i]['nilai_pertimbangan'] > 11 && $data['data'][$i]['nilai_pertimbangan'] < 25){
				$data['data'][$i]['pertimbangan'] = "Sedang";
			}else if($data['data'][$i]['nilai_pertimbangan'] >= 25){
					$data['data'][$i]['pertimbangan'] = "Tinggi";				
			}
				$kawasan['nilai_pertimbangan_total'] = $kawasan['nilai_pertimbangan_total'] + $data['data'][$i]['nilai_pertimbangan'];
			
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
			$kawasan['nilai_legal_total'] = $kawasan['nilai_legal_total'] + $data['data'][$i]['nilai_legal'];
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

		//ngitung kawasan
			$a = $i;
			//tingkat kumuh
			$kawasan['nilai_total'] = $kawasan['nilai_total'] / $a;
			if($kawasan['nilai_total'] <= 34){
				$kawasan['tingkat'] = "Kumuh Ringan";
			}else if( $kawasan['nilai_total'] > 34 && $kawasan['nilai_total'] < 55){
				$kawasan['tingkat'] = "Kumuh Sedang";
			}else if($kawasan['nilai_total'] >= 55){
					$kawasan['tingkat'] = "Kumuh Berat";				
			}
					//	$this->output->set_content_type('application/json')->set_output(json_encode($kawasan['tingkat']));
	
			//pertimbangan
			$kawasan['nilai_pertimbangan_total'] = $kawasan['nilai_pertimbangan_total'] / $a;
			if($kawasan['nilai_pertimbangan_total'] <= 11){
				$kawasan['pertimbangan'] = "Rendah";
			}else if( $kawasan['nilai_pertimbangan_total'] > 11 && $kawasan['nilai_pertimbangan_total'] < 25){
				$kawasan['pertimbangan'] = "Sedang";
			}else if($data['data'][$i]['nilai_pertimbangan'] >= 25){
					$kawasan['pertimbangan'] = "Tinggi";				
			}

			//prioritas
			if($kawasan['tingkat'] == "Kumuh Berat" && $kawasan['pertimbangan'] == "Tinggi"){
				$kawasan['prioritas'] = 1;
			}else if($kawasan['tingkat'] == "Kumuh Sedang" && $kawasan['pertimbangan'] == "Tinggi"){
				$kawasan['prioritas'] = 2;
			}else if($kawasan['tingkat'] == "Kumuh Ringan" && $kawasan['pertimbangan'] == "Tinggi"){
				$kawasan['prioritas'] = 3;
			}else if($kawasan['tingkat'] == "Kumuh Berat" && $kawasan['pertimbangan'] == "Sedang"){
				$kawasan['prioritas'] = 4;
			}else if($kawasan['tingkat'] == "Kumuh Sedang" && $kawasan['pertimbangan'] == "Sedang"){
				$kawasan['prioritas'] = 5;
			}else if($kawasan['tingkat'] == "Kumuh Ringan" && $kawasan['pertimbangan'] == "Sedang"){
				$kawasan['prioritas'] = 6;
			}else if($kawasan['tingkat'] == "Kumuh Berat" && $kawasan['pertimbangan'] == "Rendah"){
				$kawasan['prioritas'] = 7;
			}else if($kawasan['tingkat'] == "Kumuh Sedang" && $kawasan['pertimbangan'] == "Rendah"){
				$kawasan['prioritas'] = 8;
			}else if($kawasan['tingkat'] == "Kumuh Ringan" && $kawasan['pertimbangan'] == "Rendah"){
				$kawasan['prioritas'] = 9;
			}
			//legalitas
			if($kawasan['nilai_legal_total'] >= 1){
				$kawasan['legal'] = "LEGAL";
			}else{
				$kawasan['legal'] = "ILEGAL";
			}
			//penanganan
			if($kawasan['prioritas'] == 1 or  $kawasan['prioritas'] == 4 or $kawasan['prioritas'] == 7){
				if($kawasan['legal'] == "LEGAL"){
					$kawasan['penanganan'] = "Pemukiman Kembali atau Peremajaan";
				}else if($kawasan['legal'] == "ILEGAL"){
					$kawasan['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Peremajaan";
				}
			}else if($kawasan['prioritas'] == 2 or  $kawasan['prioritas'] == 5 or $kawasan['prioritas'] == 8){
				if($kawasan['legal'] == "LEGAL"){
					$kawasan['penanganan'] = "Peremajaan";
				}else if($kawasan['legal'] == "ILEGAL"){
					$kawasan['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Peremajaan";
				}
			} else if($kawasan['prioritas'] == 3 or  $kawasan['prioritas'] == 6 or $kawasan['prioritas'] == 9){
				if($kawasan['legal'] == "LEGAL"){
					$kawasan['penanganan'] = "Pemugaran";
				}else if($kawasan['legal'] == "ILEGAL"){
					$kawasan['penanganan'] = "Pemukiman Kembali atau Legalisasi Lahan lalu Pemugaran";
				}
			}
		}else{
		$kawasan['nama_kawasan'] = '-';
		$kawasan['sk_penetapan'] = '-';
		$kawasan['nilai_total'] = 0;
		$kawasan['nilai_pertimbangan_total'] = 0;
		$kawasan['nilai_legal_total'] = 0;
		$kawasan['penanganan'] = '-';
		$kawasan['legal'] = '-';
		$kawasan['prioritas'] = '-';
		$kawasan['pertimbangan'] = '-';
		$kawasan['tingkat'] = '-';
		}
		//$this->output->set_content_type('application/json')->set_output(json_encode($kawasan));
			return $kawasan;
	}

	public function index($id=false)
	{
		$data['kawasan'] = $this->model_kawasan->get($id);

		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/kawasan/edit_kawasan', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			for ($i=0; $i < count($data['kawasan']); $i++) { 
				$data['kawasan'][$i]['nilai_kawasan'] = $this->get_nilai_kawasan($data['kawasan'][$i]['id']);
				//echo $data['kawasan'][$i]['id'];
			}
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/kawasan/list_kawasan', $data);
			$this->load->view('template_backoffice/footer');
				//$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
		}
	}

	public function add()
	{
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/kawasan/add_kawasan');
		$this->load->view('template_backoffice/footer');
	}

	public function submit()
	{

		$this->form_validation->set_rules('nama_kawasan', 'Nama Kawasan', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/kawasan/add_kawasan');
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$insert = $this->model_kawasan->add();
			if ($insert==true) {
				redirect('kawasan');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('nama_kawasan', 'Nama kawasan', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['kawasan'] = $this->model_kawasan->get($this->input->post('id'));

			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/kawasan/edit_kawasan', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_kawasan->edit();
			if ($update==true) {
				redirect('kawasan');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($id)
	{
		$this->model_kawasan->delete($id);
		redirect('kawasan');
	}

	public function kawasans($id_kawasan=false)
	{
		
		//$data['kabupaten'] 		= $this->model_kabupaten->get_kabupaten();
		$data['kawasan'] = $this->model_kawasan->get($id_kawasan);


		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function geo($id_kawasan=false, $id_kecamatan=false, $id_kelurahan=false)
	{
		# Build GeoJSON feature collection array
		$geojson = array(
		   'type'      => 'FeatureCollection',
		   'features'  => array()
		);

		$data['kawasan'] = $this->model_kawasan->get_geo($id_kawasan, $id_kecamatan, $id_kelurahan);

		foreach ($data['kawasan'] as $item) {
			$properties = $item;

			unset($properties['wkb']);
			unset($properties['the_geom']);
			$feature = array(
		         'type' => 'Feature',
		         'properties' => $properties,
		         'geometry' => json_decode($this->geophp->wkb_to_json($item['wkb']))
		    );
		    # Add feature arrays to feature collection array
		    array_push($geojson['features'], $feature);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($geojson));
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */