<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume_model extends CI_Model {

	public function hitung_operasi($val1, $val2, $val3, $operasi)
	{
		if ($operasi == 'tabung') {
			return 3.14 * $val1 * $val1 * $val3;
		}elseif ($operasi == 'bola') {
			return 4/3 * (3.14 * $val1 * $val1 * $val1);
		}elseif ($operasi == 'kubus') {
			return $val1 * $val1 * $val1;
		}elseif ($operasi == 'balok') {
			return $val1 * $val2 * $val3;
		}elseif ($operasi == 'prisma') {
			return 1/2 * $val1 * $val2 * $val3;
		}else{
			return 1/3 * $val1 * $val2 * $val3;
		}
	}

}