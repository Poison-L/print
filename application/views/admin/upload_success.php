<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
/* $this->load->view('admin/menu'); */
/*
2015年5月20日PHP
*/
?>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

<?php echo $this->load->view('admin/footer');

/*
End of file
Location:upload_succcess.php
*/