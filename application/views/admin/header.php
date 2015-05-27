<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
?>
<!DOCTYPE html>
<html  lang="zh-CN">

 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="renderer" content="webkit">
  <metaname="viewport"content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('css/admin.css'); ?>">
  <!-- 
    
   -->

  

<script language="javascript" src="<?php echo base_url('js/LodopFuncs.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('js/lodop_print.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('js/jquery-2.1.3.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('js/mootools-1.2.2-core-yc.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('js/mootools-1.2.2.2-more.js'); ?>"></script>
<script language="javascript" src="<?php echo base_url('js/typecho-ui.source.js'); ?>"></script>

<object id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0> 
	<embed id="LODOP_EM" type="application/x-print-lodop" width=0 height=0 pluginspage="../Lodop6.198/install_lodop32.exe"></embed>
</object> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  
    <title></title>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <p class="navbar-text">快递单打印管理</p>
    <?php if(isset($this->user->name)): ?>
	<ul class="nav nav-tabs navbar-right">
	  <p class="navbar-text">欢迎:</p>
	  <li role="presentation"><?php echo anchor(site_url('admin/profile/'),$this->user->name,array('class'=>'author important'));?></li>
	  <li role="presentation"><?php echo anchor(site_url('admin/login/logout'),'登出',array('class'=>'exit','title'=>'安全登出后台'));?></li>
	</ul>
	
	<?php endif; ?>
  </div>
</nav>
