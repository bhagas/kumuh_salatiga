<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_hunian extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_nilai($nama_tabel, $id=false)
	{
		if ($id!=false) {
			$this->db->where('id', $id);
		}
		$this->db->select('*');
		$this->db->from($nama_tabel);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get($id=false)
	{
		$this->db->select('hunian.*,  data_kawasan.nama_kawasan');
		$this->db->where('hunian.deleted', 0);
		if ($id!=false) {
			$this->db->where('hunian.id', $id);
		}
		$this->db->from('hunian');
		//$this->db->join('kawasan_kumuh', 'hunian.id_kec = kawasan_kumuh.id_kecamatan and hunian.id_kel = kawasan_kumuh.id_kelurahan and hunian.rt = kawasan_kumuh.rt and hunian.rw = kawasan_kumuh.rw', 'left');
		$this->db->join('kawasan', 'hunian.id_kec = kawasan.id_kec and hunian.id_kel = kawasan.id_kel and hunian.rt = kawasan.rt and hunian.rw = kawasan.rw', 'left');
		$this->db->join('data_kawasan', 'kawasan.id_kawasan = data_kawasan.id', 'left');
		
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_hunian($rt=false, $rw=false, $id_kecamatan=false, $id_kelurahan=false)
	{
		$this->db->select('hunian.*');
		$this->db->where('hunian.deleted', 0);
		if ($rt!=false) {
			$this->db->where('hunian.rt', $rt);
		}
		if ($rw!=false) {
			$this->db->where('hunian.rw', $rw);
		}
		if ($id_kecamatan!=false) {
			$this->db->where('hunian.id_kec', $id_kecamatan);
		}
		if ($id_kelurahan!=false) {
			$this->db->where('hunian.id_kel', $id_kelurahan);
		}
		$this->db->from('hunian');
		
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	// public function get_rt_by_kawasan($id=false)
	// {
	// 	$this->db->select('*');
	// 	$this->db->where('deleted', 0);
	// 	if ($id!=false) {
	// 		$this->db->where('id_kawasan', $id);
	// 	}
	// 	$this->db->from('kawasan');
	// 	$query 	= $this->db->get();
	// 	$result = $query->result_array();
	// 	return $result;
	// }

	public function add($object)
	{
		

		$query = $this->db->insert('hunian', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}
	public function add_geo($options, $geometry)

	{
		unset($options['wkt']);
		$this->db->set("the_geom",'geomfromtext("'.$geometry.'")',false);
		
		$result = $this->db->insert('kawasan_kumuh', $options);
		if ($result) {
			return 1;
		}
		else{
			return 0;
		}
	}
	public function edit_geo($options, $geometry)
	
	{

		unset($options['wkt']);
		$this->db->delete('kawasan_kumuh', $options); 
		$this->db->set("the_geom",'geomfromtext("'.$geometry.'")',false);
		
		$result = $this->db->insert('kawasan_kumuh', $options);
		if ($result) {
			return 1;
		}
		else{
			return 0;
		}
	}
	public function edit($object)
	{
		//$object  	= $_POST;
	
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update('hunian', $object);

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
		$this->db->update('hunian', $object);
	}

	public function create($object)
	{
		

		$query = $this->db->insert('hunian', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}
	


}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */