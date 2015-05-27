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
			<h2>上传订单</h2>
			

			<?php echo form_open_multipart('admin/metas/upload');?>
			
				<div class="form-group">
					<label>选择要上传的文件xls|xlsx</label>
					<input type="file" name="myfile">
					<p class="help-block">请选择你的文件</p>
				</div>
				<div>
					<?php echo anchor('admin/metas/download',"点击下载订单模板"); ?>
				</div>
			
				<div class="row password-form">
					<div class="col-md-3"><input type="submit" value="点击上传" /></div>
				</div>
			</form>
		</div>
	</div>
</div>



<?php echo $this->load->view('admin/footer');

/*
End of file
Location:upload.php
*/
