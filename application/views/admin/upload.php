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
			
  <?php echo form_open_multipart('admin/metas/do_upload');?>
    <table  cellspacing="0" cellpadding="0" class="tableborder">
    <tr>
     <th>请选择要上传的文件:</th>
     <td><input type="file" name="userfile" size="20" /><font style="color:red;">仅支持.xlsx文件上传(不支持.xls) | 文件名请不要包含中文</font> <input type="submit" value="点击上传" /></td>
    </tr>
    
     <!-- <tr><th>样例文件下载:</th>
       <td>
          
           <?php //echo anchor('admin/metas/download',"点击下载订单模板"); ?>
       </td>
     </tr>
      -->  

    <tr>
   
        <td colspan="2" style="padding-left:35%;">
           
        </td>
    </tr><!--formtable tableborder-->
    </table>
    </form>
    
    
    

		</div>
	</div>
</div>



<?php echo $this->load->view('admin/footer');

/*
End of file
Location:upload.php
*/
