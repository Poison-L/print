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


<style type="text/css">
    body{padding:1px;}
	table{table-layout:fixed;}
    table{
		border-collapse:collapse;
		border:none;
		width:100%;
		font-size:8pt;
	}
	td
	{
		border:solid #000 1px;
		border-color:"#cccc99";
	}

	
	.box{margin:0 auto;}
	.box1{float:left;margin-top:5px;}
	.box2{float:right;margin-top:5px;}
	
	
</style>
</head>
<body>
<div style="width:10cm;height:17.9cm;overflow:hidden;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
			<td colspan="4" style="border:none;height:7mm">
				<div style="border:none;font-size:15px;margin-left:10px">海外进口</div>	
				
			</td>
			<td colspan="2" valign="bottom" style="border:none;height:7mm">
				<div style="border:none;font-size:10px;">&nbsp;</div>
				
			</td>
			
		</tr>
		
		<tr>
			<td colspan="4" style="width:62mm;height:20mm;border-style:dotted" border="0">
            	<img style="width:40mm;height:19mm;margin-left:6mm;" src="<?php echo base_url('img/HK-LOGO.png'); ?>" />
            </td> 
            <td colspan="2"  style="width:32mm;height:21mm;border-style:dotted;font-size:25px;margin-left:10px" border="0">
            		&nbsp;&nbsp;
            		
            </td>
		</tr>
		
        <tr>
			<td colspan="6" style="border-style:dotted;height:14mm">
				<div >广州市有信达国际货运代理有限公司<br><br>&nbsp;</div>	
			</td>
		</tr>
		
		<tr>
			<td colspan="6" style="height:18mm;width:94mm;border-style:dotted;font-size:12px;" border="0">
				&nbsp;&nbsp;收件人:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$hkprint[reciver]; ?><br>
				&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址:<?php echo @$hkprint[reciver_province].@$hkprint[reciver_city].@$hkprint[reciver_street]; ?><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话(Tel):<?php echo @$hkprint[reciver_tel]; ?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编(Postcode):<?php echo @$hkprint[reciver_post]; ?>
			</td>
		</tr>
		
		<tr>
			<td colspan="6" style="width:94mm;height:10mm;border-style:dotted;font-size:10px;" border="0">
				   &nbsp;&nbsp;寄件人:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$hkprint[sender]; ?><br>
	               &nbsp;&nbspFrom:&nbsp;&nbsp;&nbsp;发货地址:<?php echo @$hkprint[sender_address]; ?><br>
	               &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话(Tel):<?php echo @$hkprint[sender_tel]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			</td>
		</tr>		
		
        <tr>
			<td colspan="6" style="border-style:dotted;height:10mm">
				<div class="box">
				
					
					<div class="box1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收件人/代收人:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					签名时间:Received&nbsp;Date<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					年Y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日D&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				</div>
			</td>
		</tr>
		
        <tr>
	        <td colspan="6" style="width:94mm;height:6.5mm;border-style:dotted" border="0">
	        	签收联 Receiver's copy
	        </td>
        </tr>
        
        
        <tr>
			<td colspan="6" style="border-style:dotted;height:2mm">
				<div >&nbsp;</div>	
			</td>
		</tr>        
	
        <tr>
	        <td colspan="6" style="height:14mm;border-style:dotted" border="0">
	        	<div>广州市有信达国际货运代理有限公司&nbsp;</div>	
	        </td>
        </tr>	

		<tr>
			<td colspan="6" style="width:94mm;height:12mm;border-style:dotted;font-size:10px;" border="0">
				   &nbsp;&nbsp;寄件人:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$hkprint[sender]; ?><br>
	               &nbsp;&nbspFrom:&nbsp;&nbsp;&nbsp;发货地址:<?php echo @$hkprint[sender_address]; ?><br>
	               &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话(Tel):<?php echo @$hkprint[sender_tel]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>	
        
		<tr>
			<td colspan="6" style="height:18mm;width:94mm;border-style:dotted;font-size:12px;" border="0">
				&nbsp;&nbsp;收件人:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$hkprint[reciver]; ?><br>
				&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址:<?php echo @$hkprint[reciver_province].@$hkprint[reciver_city].@$hkprint[reciver_street]; ?><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话(Tel):<?php echo @$hkprint[reciver_tel]; ?>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编(Postcode):<?php echo @$hkprint[reciver_post]; ?>
			</td>
		</tr>

		
		<tr>
			<td colspan="6" style="width:70mm;height:22mm;border-style:dotted;font-size:10px;" border="0">
				订单详情(Description of goods):  <br><?php echo @$hkprint[order_detail]; ?>
			</td>
			
			
		</tr>
		
		<tr>
			<td colspan="6" style="width:70mm;height:4mm;border-style:dotted" border="0">
				数量(Amount): <?php echo @$hkprint[order_num]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;重量:<?php echo @$hkprint[order_w]; ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				编号:<?php echo @$hkprint[pid]; ?>
			</td>
		</tr>
		
		<tr>
			<td colspan="6" style="width:70mm;height:4mm;border-style:dotted" border="0">
				订单号(Order No): <?php echo @$hkprint[order_no]; ?><br>
			</td>
		</tr>		

 
        <tr>
        	<td colspan="6" style="width:94mm;height:4mm;border-style:dotted" border="0">
        		<div style="line-height:4mm;">收件联 Shipper's copy</div>
        	</td>
        </tr>  
        
 
	</table>
</div>

</body>
</html>