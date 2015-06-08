<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015年6月8日PHP
*/

class Excel_mdl extends CI_Model{
	
	
	const TBL_ORDERS = 'orders';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function add_orders($order_data){
		
		$this->db->insert(self::TBL_ORDERS,$order_data);
		return ($this->db->affected_rows() ==1)? $this->db->insert_id():FALSE;
	}
	
}

/*
End of file
Location:excel_mdl.php
*/