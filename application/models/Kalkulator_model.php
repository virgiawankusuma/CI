<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalkulator_model extends CI_Model {

	public function hitung_operasi($val1, $val2, $operasi)
	{
		if ($operasi == 'kurang') {
			return $val1 - $val2;
		}elseif ($operasi == 'tambah') {
			return $val1 + $val2;
		}elseif ($operasi == 'bagi') {
			return $val1 / $val2;
		}elseif ($operasi == 'kali') {
			return $val1 * $val2;
		}else{
			return $val1 % $val2;
		}
	}

}