<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_statistik');
	}

	public function index()
	{
		redirect('statistik/corona');
	}

	public function corona()
	{	
		$data = array(
			'coronas' => $this->M_statistik->getCorona(),
			'judul' => 'Jepara Tanggap COVID19'
		 );
		$this->load->view('template/header', $data);
		$this->load->view('corona_jepara', $data);
		$this->load->view('template/footer');
	}

	public function unggah()
	{	
		$fileName  = $_FILES['file']['name'];
		$config = array(
			'upload_path' => './assets/',
			'allowed_types' => 'xls|xlsx|csv',
			'max_size' => 10000 
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file')) {
			$this->upload->display_errors();
			redirect('statistik/corona','refresh'); die();
		}

		$inputFileName = './assets/'.$fileName;

		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('error');
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row = 2; $row <= $highestRow; $row++){
			$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL, TRUE, FALSE);
			$data = array(
				'id' => $rowData[0][0],
				'kecamatan' => $rowData[0][1],
				'pp' => $rowData[0][2],
				'odp' => $rowData[0][3],
				'pdp' => $rowData[0][4],
				'positif' => $rowData[0][5]
			);
			$this->db->insert('corona', $data);
		}
		redirect('statistik/corona','refresh');

	}

	public function chartjs()
	{	
		$data = array(
			'stat' => $this->M_statistik->getPenduduk(),
			'count' => $this->M_statistik->count(),
			'judul' => 'ChartJS' 
		);
		$this->load->view('template/header', $data);
		$this->load->view('statistik_chartjs', $data);
		$this->load->view('template/footer');
	}

	public function morrisjs()
	{
		$data = array(
			'morrisjs' => $this->M_statistik->getPenduduk(),
			'judul' => 'MorisJS'
		);
		$this->load->view('template/header', $data);
		$this->load->view('statistik_morrisjs', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Statistik.php */
/* Location: ./application/controllers/Statistik.php */