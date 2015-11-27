<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_rt extends CI_Model {

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
		$this->db->from('kawasan');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function get_rt_by_kawasan($id=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id!=false) {
			$this->db->where('id_kawasan', $id);
		}
		$this->db->from('kawasan');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function add($object)
	{
		

		$query = $this->db->insert('kawasan', $object);

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
	
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update('kawasan', $object);

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
		$this->db->update('kawasan', $object);
	}

	public function create($object)
	{
		

		$query = $this->db->insert('kawasan', $object);

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