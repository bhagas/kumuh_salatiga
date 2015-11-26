<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kawasan extends CI_Model {

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
	public function get_geo()
	{
		$this->db->select('asWkb(the_geom) as wkb,  id');
		$this->db->from('kawasan_kumuh');
		$this->db->join('data_kawasan', 'data_kawasan.id = kawasan_kumuh.id_kawasan', 'left');
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}


}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */