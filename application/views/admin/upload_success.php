<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
 $this->load->view('admin/menu'); 
/*
2015年5月20日PHP
*/
?>
<div class="col-md-12 col-md-offset-2 main">
	<div class="row">
		<div class="col-md-4">
			<h3>订单Excel文件已经上传</h3>
			<p><?php echo anchor('admin/metas/getExcel', '确定上传数据'); ?></p>
		</div>
	</div>
</div>







<?php 

echo $this->load->view('admin/footer');?>
