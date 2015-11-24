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


	

}

/* End of file model_jalan.php */
/* Location: ./application/models/model_jalan.php */