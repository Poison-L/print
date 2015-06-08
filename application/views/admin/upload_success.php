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
			<h3>订单文件上传成功</h3>
			<ul>
				<?php foreach ($upload_data as $item => $value):?>
				<li><?php echo $item;?>: <?php echo $value;?></li>
				<?php endforeach; ?>
			</ul>
			<p><?php echo anchor('upload', '确定上传'); ?></p>
		</div>
	</div>
</div>

<?php echo $this->load->view('admin/footer');

/*
End of file
Location:upload_succcess.php
*/