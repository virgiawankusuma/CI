<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_statistik extends CI_Model {

	public function getCorona()
	{
		$this->db->select('*');
		$query = $this->db->get('corona');
		$hasil = $query->result();
		$query->free_result();
		return $hasil;
	}

	public function count()
	{
		$query = $this->db->query('SELECT COUNT(provinsi) AS count FROM datapenduduk');
		$hasil = $query->result();
		$query->free_result();
		return $hasil;
	}

	public function getPenduduk()
	{
		$this->db->select('provinsi, jumlah');
		$query = $this->db->get('datapenduduk');
		$hasil = $query->result();
		$query->free_result();
		return $hasil;
	}

	public function total()
	{
		$this->db->select('*, sum(pp) as pp, sum(odp) as odp, sum(pdp) as pdp, sum(positif) as positif');
		$query = $this->db->get('corona');
		$hasil = $query->result();
		$query->free_result();
		return $hasil;
	}

}

/* End of file M_statistik.php */
/* Location: ./application/models/M_statistik.php */