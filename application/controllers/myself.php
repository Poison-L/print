<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015年3月1日PHP
*/
class Myself extends ST_Controller {
	var $data = array();
	
	public $pics = array();
	


	function __construct()
	{
		
		parent::__construct();
	}

	
	public function index()
	{
		//print_r($this->pics);
		$this->load->view("myself",$this->pics);
	}
	
}


/*
End of file
Location:pic.php
*/