<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master extends CI_Model {



	public function get_nilai($nama_tabel)
	{
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function upload_foto($name, $file_name)
	{
		$file_ = explode('.', $file_name);
		// $config['file_name']		= '';

		$config['upload_path'] 		= './upload/foto/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		//$config['max_size']			= '0';
		$config['file_name']		= md5($file_[0]).'.JPG';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($name)) {
			$data = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
		}

		return $data['upload_data']['file_name'];
	}
	public function get_nilai_prioritas($nama_tabel)
	{
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_kawasan($id_kawasan)
	{
		$this->db->select('kawasan.*, data_kawasan.*');
		$this->db->from('kawasan');
		$this->db->where('kawasan.id_kawasan',$id_kawasan);
		$this->db->join('data_kawasan', 'data_kawasan.id = kawasan.id_kawasan', 'left');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_kawasan_by_id($id_rt)
	{
		$this->db->select('kawasan.*, data_kawasan.*');
		$this->db->from('kawasan');
		$this->db->where('kawasan.id',$id_rt);
		$this->db->join('data_kawasan', 'data_kawasan.id = kawasan.id_kawasan', 'left');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

public function get($nama_tabel=false, $id=false)
	{
		$this->db->select('*');
	//	$this->db->where('deleted', 0);
		if ($id!=false) {
			$this->db->where('id', $id);
		}
		$this->db->from($nama_tabel);
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}





	public function add($object)
	{
		$nama_tabel = $object['nama_tabel'];
		unset($object['nama_tabel']);
		$query = $this->db->insert($nama_tabel, $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function edit($object)
	{
		//$object  	= $_POST;
		$nama_tabel = $object['nama_tabel'];
		unset($object['nama_tabel']);
	
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update($nama_tabel, $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($nama_tabel, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($nama_tabel); 
	}

	public function create($object)
	{
		

		$query = $this->db->insert('tipologi_kawasan', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}
	

	

}

/* End of file model_jalan.php */
/* Location: ./application/models/model_jalan.php */