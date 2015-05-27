<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


 <div class="container">
 
      
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><?php echo anchor(site_url('admin/metas/index'),'控制面板',array('title'=>'控制面板'));?></li>
          </ul>
          <ul class="nav nav-sidebar">
          	
          	<li><?php echo anchor(site_url('admin/profile/'),'个人信息设置',array('title'=>'个人信息设置'));?></li>

           
          </ul>
          <ul class="nav nav-sidebar">
            <li><?php echo anchor(site_url('admin/metas/index'),'批量提交订单',array('title'=>'批量提交订单'));?></li>
           
            <li><?php echo anchor(site_url('admin/posts/orders'),'批量打印订单',array('title'=>'批量打印订单'));?></li> 
               	
          </ul>
        </div>
 </div>
       
        
        
