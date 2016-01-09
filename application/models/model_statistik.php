<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_statistik extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($id=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id!=false) {
			$this->db->where('id', $id);
		}
		$this->db->from('data_kawasan');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function add()
	{
		

		$object  	= $_POST;

		$query = $this->db->insert('data_kawasan', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function edit()
	{
		$object  	= $_POST;
	
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update('data_kawasan', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id)
	{
		$object = array('deleted' => 1);
		$this->db->where('id', $id);
		$this->db->update('data_kawasan', $object);
	}

	public function create($object)
	{
		$object  	= $_POST;

		$query = $this->db->insert('data_kawasan', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}
	public function get_geo($id_kawasan, $id_kecamatan, $id_kelurahan)
	{
		if($id_kawasan !=false and $id_kawasan != 0){
			$this->db->where('kawasan_kumuh.id_kawasan', $id_kawasan);
		
		}
		if($id_kecamatan !=false and $id_kecamatan !=0){
			$this->db->where('kawasan_kumuh.id_kecamatan', $id_kecamatan);
		
		}
		if($id_kelurahan !=false and $id_kelurahan !=0){
			$this->db->where('kawasan_kumuh.id_kelurahan', $id_kelurahan);
		
		}
		$this->db->select('asWkb(kawasan_kumuh.the_geom) as wkb, kawasan.id_kec, kawasan.id_kel, kawasan.rt, kawasan.rw,  data_kawasan.id, data_kawasan.nama_kawasan, master_kecamatan.nama_kecamatan, master_kelurahan.nama_kelurahan');
		$this->db->from('kawasan_kumuh');
		$this->db->join('kawasan', 'kawasan.id_kec = kawasan_kumuh.id_kecamatan and kawasan.id_kel = kawasan_kumuh.id_kelurahan and kawasan.rt = kawasan_kumuh.rt and kawasan.rw = kawasan_kumuh.rw', 'left');
		$this->db->join('master_kecamatan', 'kawasan_kumuh.id_kecamatan = master_kecamatan.id_kecamatan', 'left');
		$this->db->join('master_kelurahan', 'kawasan_kumuh.id_kelurahan = master_kelurahan.id_kelurahan', 'left');
		$this->db->join('data_kawasan', 'data_kawasan.id = kawasan.id_kawasan', 'left');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */