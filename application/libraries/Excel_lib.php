<?php if(!defined('BASEPATH')) die('No Access');
require_once APPPATH."/third_party/PHPExcel.php";
require_once APPPATH."/third_party/PHPExcel/IOFactory.php";

/**
 * 
 */
class Excel_lib extends PHPExcel
{
	
	function __construct()
	{
		parent::__construct();
	}
}
