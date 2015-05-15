<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015年3月1日PHP
*/
class Pic extends ST_Controller {
	var $data = array();
	
	public $pics = array();
	


	function __construct()
	{
		
		parent::__construct();
		$this->load->helper('directory');
	}

	
	public function index()
	{
		//把img文件夹所有图片的文件名保存到数组
		$this->pics = directory_map('./img/', 0, TRUE);
		//print_r($this->pics);
		$this->load->view("pic",$this->pics);
	}
	
}


/*
End of file
Location:pic.php
*/