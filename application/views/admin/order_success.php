<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html  lang="zh-CN">

 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">



</head>
<body>

<div>
			
			<?php if($insert_id){
    	?>
    	
    <p><font style="color:red;">订单上传成功</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo anchor(site_url('admin/posts/orders'),'返回订单列表',array('title'=>'返回订单列表'));?></p>
    <?php 	
    }else{?>
    	
    	<p><font style="color:red;">订单上传失败,请清空数据重新上传</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo anchor(site_url('admin/posts/orders'),'返回订单列表',array('title'=>'返回订单列表'));?></p>
   <?php  }
    
    
    ?>
   
			
			
  

		</div>



</body>



