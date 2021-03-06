<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_kelurahan extends CI_Model {

	public function get_kelurahan($id_master_kelurahan = false)
	{
		$this->db->select('master_kelurahan.id_kecamatan, master_kelurahan.nama_kelurahan, master_kelurahan.id_kelurahan, master_kecamatan.nama_kecamatan');
		$this->db->from('master_kelurahan');
		if ($id_master_kelurahan!=false) {
			$this->db->where('master_kelurahan.id_kelurahan', $id_master_kelurahan);
		}
		$this->db->join('master_kecamatan', 'master_kecamatan.id_kecamatan = master_kelurahan.id_kecamatan', 'left');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_kelurahan_by_kecamatan($id_kecamatan = false)
	{
		$this->db->select('master_kelurahan.id_kecamatan, master_kelurahan.id_kelurahan, master_kelurahan.nama_kelurahan, master_kecamatan.nama_kecamatan');
		$this->db->from('master_kelurahan');
		if ($id_kecamatan!=false) {
			$this->db->where('master_kecamatan.id_kecamatan', $id_kecamatan);
		}
		$this->db->join('master_kecamatan', 'master_kecamatan.id_kecamatan = master_kelurahan.id_kecamatan', 'left');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_desa_geo()
	{
		$this->db->select('asWkb(the_geom) as wkb, nama_kelurahan, id_kecamatan, id_kelurahan');
		$this->db->from('master_kelurahan');
	
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

}

/* End of file Model_kelurahan.php */
/* Location: ./application/models/Model_kelurahan.php */