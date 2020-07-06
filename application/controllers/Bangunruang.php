<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bangunruang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		redirect('bangunruang/volume');
	}

	public function volume()
	{
		$data = array(
			'hasil' => 0, 
			'var1' => 0, 
			'var2' => 0,
			'var3' => 0,
			'operasi' => null,
			'judul' => 'Hitung Volume Bangun Ruang'
		);
		$this->load->view('template/header', $data);
		$this->load->view('form_volume', $data);
		$this->load->view('template/footer');
	}

	public function hasil_hitung()
	{	

		// debug
		// $this->load->library("cuma_angka");

		// $val1 = $this->cuma_angka->getAngka($this->input->post('var1'));
		// $val2 = $this->cuma_angka->getAngka($this->input->post('var2'));
		// orak
		$val1 = $this->input->post('var1');
		$val2 = $this->input->post('var2');
		$val3 = $this->input->post('var3');
		$operasi = $this->input->post('operasi');

		$this->load->model('volume_model');
		$hasil = $this->volume_model->hitung_operasi($val1, $val2, $val3, $operasi);

		$data = array(
			'hasil' => $hasil,
			'var1' => $val1,
			'var2' => $val2,
			'var3' => $val3,
			'operasi' => $operasi
		);
		$this->load->view('form_volume', $data);
	}
}