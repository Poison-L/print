<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
$this->load->view('admin/menu');
?>
<form action="<?php echo site_url('admin/metas/uploadexcel'); ?>" method="post" enctype="multipart/form-data">
上传：<input type="file" name="myfile" />
<input type="submit" name="submit" value="上传" />
</form>
<?php echo $this->load->view('admin/footer');