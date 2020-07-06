<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuma_angka
{
	protected $ci;
	private $string;

	public function __construct()
	{
        $this->ci =& get_instance();
	}
	public function getAngka($nilai)
	{
		$this->string = $nilai;
		return preg_replace("/[^0-9]/", "", $this->string);
	}
	

}