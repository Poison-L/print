<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015年3月1日PHP
*/
class Myself extends ST_Controller {
	//var $data = array();
	
	public $hkprint = array();
	
	private $_data  = array();

	function __construct()
	{
		
		parent::__construct();
	}

	
	public function index($order_no)
	{
		//print_r($this->pics);
		$hkprint = $this->posts_mdl->get_order_by_id('order_no',$order_no);
		$this->_data['hkprint'] = $hkprint;
		
		$this->load->view("myself",$this->pics);
	}
	
	/**
	 * 获取中港快递需要的信息
	 * @param unknown $order_no
	 */
	public function hkexp($order_no){
		$hkprint = $this->posts_mdl->get_order_by_id('order_no',$order_no);
		
		
		$hkprint = $this->objectToArray($hkprint);
		$data = array('print_count' => $hkprint['print_count']+1);
		$this->posts_mdl->update_order_print($hkprint['Id'],$data);
		
		
		$this->_data['hkprint'] = $hkprint;
		
		$this->load->view("myself",$this->_data);
	}
	
	/**
	 * 获取邮政快递需要的信息
	 * @param unknown $order_no
	 */
	public function cnexp($order_no){
		$cnprint = $this->posts_mdl->get_order_by_id('order_no',$order_no);
	
	
		$cnprint = $this->objectToArray($cnprint);
		$data = array('print_count' => $cnprint['print_count']+1);
		$this->posts_mdl->update_order_print($cnprint['Id'],$data);
	
	
		$this->_data['cnprint'] = $cnprint;
	
		$this->load->view("myself2",$this->_data);
	}
	
	/**
	 * 对象转数组
	 * @param $obj
	 * @return mixed
	 */
	public function objectToArray($obj)
	{
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj;
		if (is_array($_arr)) {
			foreach ($_arr as $key => $val) {
				$val = (is_array($val) || is_object($val)) ? self::objectToArray($val) : $val;
				$arr[$key] = $val;
			}
		}
		return $arr;
	}
	
	
}


/*
End of file
Location:pic.php
*/