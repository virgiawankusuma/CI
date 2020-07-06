<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_excel');
	}

	public function index()
	{
		redirect('excel/import');
	}

	public function import()
	{
		$data = array(
			'data_corona' => $this->M_excel->getData(),
			'judul' => 'Import Excel'
		);
		$this->load->view('template/header', $data);
		$this->load->view('import', $data);
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
			die();
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
			$this->db->insert('praktik_excel', $data);
		}
		redirect('excel/import','refresh');

	}

}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */