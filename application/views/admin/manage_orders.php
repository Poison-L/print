<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
$this->load->view('admin/menu');
?>

<div class="container">
<div class="col-md-offset-2">
<form role="form" method="post" name="manage_posts" action="<?php echo site_url('admin/posts/getprint'); ?>">
<table class="table table-striped table-bordered table-hover">
<p class="operate">操作: 

<input type='checkbox' id='chkAll' onclick="CheckAll(this.checked)">全选  | 反选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;筛选:
                      
 <?php echo anchor(site_url('admin/posts/orders/1'),'未打印',array('title'=>'未打印'));?>&nbsp;|&nbsp;     
 <?php echo anchor(site_url('admin/posts/orders/2'),'已打印',array('title'=>'已打印'));?>&nbsp;|&nbsp;  
  <?php echo anchor(site_url('admin/posts/orders/3'),'所有订单',array('title'=>'所有订单'));?>
                      
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单清除:      
 <?php echo anchor(site_url('admin/posts/delete_orders/1'),'清除未打印',array('title'=>'清除未打印'));?>&nbsp;|&nbsp;     
 <?php echo anchor(site_url('admin/posts/delete_orders/2'),'清除已打印',array('title'=>'清除已打印'));?>&nbsp;|&nbsp;  
  <?php echo anchor(site_url('admin/posts/delete_orders/3'),'清除所有订单',array('title'=>'清除所有订单'));?>                 
                    </p>
	<thend>
		<th>选中</th>
		<th>序号</th>
		<th>订单号</th>
		<th>快递单号</th>
		<th>收件人姓名</th>
		<th>收件人电话</th>
		<th>收件人省份</th>
		<th>收件人城市</th>
		<th>收件人街道</th>
		<th>打印次数</th>
		
		
	
	</thend>
	
	<tbody>
		<?php if($orders->num_rows()>0): ?>
			<?php foreach($orders->result() as $order): ?>
				<tr <?php echo ($order->Id % 2==0)?'':'class="even"' ?> id="<?php echo 'order-'.$order->Id; ?>">
					<td><input type="checkbox" value="<?php echo $order->Id; ?>" name="pid[]" ></td>
					<td><?php echo $order->Id ?></td>
					<td><?php echo $order->order_no ?></td>
					<th><?php echo $order->tracking ?></th>
					<th><?php echo $order->reciver ?></th>
					<th><?php echo $order->reciver_tel ?></th>
					<th><?php echo $order->reciver_province ?></th>
					<th><?php echo $order->reciver_city ?></th>
					<th><?php echo $order->reciver_street ?></th>
					<th><?php echo $order->print_count ?></th>
					
					
					
					
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	
	</tbody>
	
	
</table>
<div class="form-group">
		    <div class="col-md-4">
		     <input type="hidden" name="do" value="delete" />
		      <button type="submit" class="btn btn-default">打印勾选项</button>
		    </div>
	  	</div>	
</form>
</div>
</div>

<div class="container">
<div class="col-md-offset-6">
<?php echo isset($pagination)?$pagination:''; ?>
</div>
</div>

<script type="text/javascript">
function CheckAll(val) {
    $("input[name='pid[]']").each(function() {
        this.checked = val;
    });
}

function reprint() {
    var print_type = $('#print_type').val();
    if(print_type=='peihuo'){
        $('#orderContent').show();
        /*if( $('[name=order_code]').val()==''){
            if($('#print_code').val()!=''){
                $('[name=order_code]').focus();
            }
            return;
        }*/
    }else{
        $('#orderContent').hide();
        $('[name=order_code]').val('');
    }
	$('#validateTips').text('').hide();
	var uri = '/warehouse/reprint-receipts-log/reprint';
	$.post(uri, $('#printForm').serialize(), function(data){
		if(data.state===0) $('#validateTips').text(data.message).show();
		else {
            $("#print_code").val('');
            $("[name='order_code']").val();
            if(data.printType=='ship_order'){
                getOrdersReprint(data.printCode);
                $("#print_code").focus().select();
                return false;
            }
            else if (data.printType=='peihuo') {
              //printPeihuoXiajia(data.link);
              window.open(data.link, '_blank', 'fullscreen=yes,scrollbars=yes,toolbar=yes');
              return false;
            }
			window.open(data.link, '_blank', 'fullscreen=yes,scrollbars=yes');
			//$('#openForm').attr('action', data.link)[0].submit();			
		}
	},'json');
}
 $(function(){
     $("#print_code").focus();
     $("#print_code").keyup(function (e) {
         var key = e.which;
         if (key == 13 && $("#print_code").val()!='') {
             reprint();
         }
     });
     $('#print_type').bind('change',function(){
         if($('#print_type').val()=='peihuo'){
             $('#orderContent').show();
             if( $('[name=order_code]').val()==''){
                 //$('[name=order_code]').focus();
                 return;
             }
         }else{
             $('#orderContent').hide();
             $('[name=order_code]').val('');
         }
     });
 });
</script>

<?php 

echo $this->load->view('admin/footer');?>