<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kalkulator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$data = array(
			'hasil' => 0, 
			'var1' => 0, 
			'var2' => 0,
			'operasi' => 'kurang',
			'judul' => 'Kalkulator'
		);
		$this->load->view('template/header', $data);
		$this->load->view('form_kalkulator', $data);
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
		$operasi = $this->input->post('operasi');

		$this->load->model('kalkulator_model');
		$hasil = $this->kalkulator_model->hitung_operasi($val1, $val2, $operasi);

		$data = array(
			'hasil' => $hasil,
			'var1' => $val1,
			'var2' => $val2,
			'operasi' => $operasi
		);
		$this->load->view('form_kalkulator', $data);
	}
}