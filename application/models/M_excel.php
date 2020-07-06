<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_excel extends CI_Model {

	public function getData()
	{
		$q = $this->db->get('praktik_excel');
		$data = $q->result_array();
		$q->free_result();

		return $data;
	}

}

/* End of file M_excel.php */
/* Location: ./application/models/M_excel.php */