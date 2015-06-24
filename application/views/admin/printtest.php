<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
//$this->load->view('admin/menu');




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  
<script language="javascript" src="<?php echo base_url('js/LodopFuncs.js'); ?>"></script>
<object id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0> 
	<embed id="LODOP_EM" type="application/x-print-lodop" width=0 height=0 pluginspage="../Lodop6.198/install_lodop32.exe"></embed>
</object> 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>


<p>打印总数量:<input type="text" size="5" value="<?php echo count($print); ?>" id="HH" > </p>

<?php static $yy = 1; ?>
<?php for($i=0;$i<count($print);$i++){ 	?>

<tr>
<?php //print_r($print);
?>


<p>
订单号:<input type="text" size="15" value="<?php echo @$print[$i][order_no]; ?>" id="<?php echo $i; ?>" > 
快递单号:<input type="text" size="15" value="<?php echo @$print[$i][tracking]; ?>" id="<?php echo "t".$i; ?>" > 
excel编号:<input type="text" size="15" value="<?php echo @$print[$i][pid]; ?>" > 
<input type="hidden" size="15" value="<?php echo @$print[$i][reciver_city]; ?>" id="<?php echo "city".$i; ?>"> 

<input type="hidden" size="15" value="<?php echo @$print[$i][reciver_street]; ?>" id="<?php echo "reciver_street".$i; ?>">
<input type="hidden" size="15" value="<?php echo @$print[$i][reciver]; ?>" id="<?php echo "reciver".$i; ?>">
<input type="hidden" size="15" value="<?php echo @$print[$i][reciver_tel]; ?>" id="<?php echo "reciver_tel".$i; ?>">

<input type="hidden" size="15" value="<?php echo @$print[$i][sender_tel]; ?>" id="<?php echo "sender_tel".$i; ?>">
<input type="hidden" size="15" value="<?php echo @$print[$i][sender_address]; ?>" id="<?php echo "sender_address".$i; ?>">

<input type="hidden" size="15" value="<?php echo @$print[$i][order_w]; ?>" id="<?php echo "order_w".$i; ?>">
<input type="hidden" size="15" value="<?php echo @$print[$i][order_detail]; ?>" id="<?php echo "order_detail".$i; ?>">
<input type="hidden" size="15" value="<?php echo @$print[$i][tracking_internal]; ?>" id="<?php echo "tracking_internal".$i; ?>">


</p>
			<td ><?php @$print[$i][Id]; ?></td>
			
				
		</tr>
		
<?php } ?>


				
				
				
				<p>
				<a href="javascript:Printc()">点击国际快递单</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="javascript:Printc2()">打印邮政快递单</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<?php echo anchor(site_url('admin/posts/orders'),'返回订单列表',array('title'=>'返回订单列表'));?></p> 
				
			










<script language="javascript" type="text/javascript">    
var LODOP; //声明为全局变量  

var lodopDomain = 'http://'+window.location.host+'/';
var cookieDomain = 'wms.com';


function Printc(){

	LODOP=getLodop();  

	var count = document.getElementById('HH').value;
	//var myy = document.getElementById('myy').value;
	//alert(myy);
		for(var n=0;n<count;n++){
			var order = document.getElementById(n).value;
			var track = document.getElementById("t"+n).value;
			//alert(order);
			LODOP.SET_LICENSES("深圳保宏电子商务综合服务有限公司","AF6A8226CE1786FBF9FF8546C3E7184E","",""); // 再调用一次注册
			LODOP.PRINT_INIT("");	
			LODOP.SET_PRINT_PAGESIZE (1, 1000, 1800, '');
			LODOP.ADD_PRINT_URL("0","0",'10cm',"18cm", lodopDomain+"/index.php/myself/hkexp/"+order);
			//LODOP.ADD_PRINT_URL("0","0",'10cm',"18cm","http://print.ehaiwaigou.cn/index.php/myself/hkexp/"+order);
			LODOP.ADD_PRINT_BARCODE("3.2cm","4.6cm",'180','40','128A',track);
			LODOP.ADD_PRINT_BARCODE("9.4cm","4.6cm",'180','40','128A',track);
			//AddPrintContent("10101010101010","郭德强");
			LODOP.PRINT();	
		}
};


function Printc2(){

	LODOP=getLodop();  

	var count = document.getElementById('HH').value;
	//var myy = document.getElementById('myy').value;
	//alert(myy);
		for(var n=0;n<count;n++){
			var order = document.getElementById(n).value;
			var track = document.getElementById("t"+n).value;
			var city = document.getElementById("city"+n).value;
			var reciver_street = document.getElementById("reciver_street"+n).value;
			var reciver = document.getElementById("reciver"+n).value;
			var reciver_tel = document.getElementById("reciver_tel"+n).value;
			var sender_tel = document.getElementById("sender_tel"+n).value;
			var sender_address = document.getElementById("sender_address"+n).value;
			var order_w = document.getElementById("order_w"+n).value;
			var order_detail = document.getElementById("order_detail"+n).value;
			var tracking_internal = document.getElementById("tracking_internal"+n).value;
			
			
			
			//alert(order);
			LODOP.SET_LICENSES("深圳保宏电子商务综合服务有限公司","AF6A8226CE1786FBF9FF8546C3E7184E","",""); // 再调用一次注册
			LODOP.PRINT_INIT("");	
			LODOP.SET_PRINT_PAGESIZE (1, 1000, 1800, '');
			LODOP.ADD_PRINT_URL("0","0",'10cm',"18cm", lodopDomain+"/index.php/myself/cnexp/"+order);
			//LODOP.ADD_PRINT_URL("0","0",'10cm',"18cm","http://print.ehaiwaigou.cn/index.php/myself/cnexp/"+order);
			//LODOP.ADD_PRINT_BARCODE("3.2cm","4.6cm",'180','40','128A',track);
			//LODOP.ADD_PRINT_BARCODE("9.4cm","4.6cm",'180','40','128A',track);
			

			LODOP.SET_PRINT_PAGESIZE (1, 1000, 1500, '');
			LODOP.SET_PRINT_STYLEA(0, "Italic", 1);
			LODOP.ADD_PRINT_BARCODE("0.7cm","4.5cm",'180','50','128A',tracking_internal);
			LODOP.ADD_PRINT_BARCODE(345,10,'180','50','128A',tracking_internal);
			
			LODOP.SET_PRINT_STYLE("FontSize",26);		//设置打印项的输出风格，成功执行该函数，此后再增加的打印项按此风格输出。
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.ADD_PRINT_TEXT(20,17,500,100,"快递包裹");		//ADD_PRINT_TEXT(Top,Left,Width,Height,strContent)	要求在打印初始化后调用，建议在画线类函数之后调用。
			
			
			LODOP.SET_PRINT_STYLE("FontSize",12);		//设置打印项的输出风格，成功执行该函数，此后再增加的打印项按此风格输出。
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.ADD_PRINT_TEXT(92,5,1400,40,"广州  转");	
			LODOP.ADD_PRINT_TEXT(92,270,1400,40,"投递局");	
			LODOP.ADD_PRINT_TEXT(92,105,80,40,city);	
			
			
			LODOP.SET_PRINT_STYLE("FontSize",10);		//设置打印项的输出风格，成功执行该函数，此后再增加的打印项按此风格输出。
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.ADD_PRINT_TEXT(150,5,20,100,"收件");	
			
			
			//收件人详情
			LODOP.SET_PRINT_STYLE("FontSize",10);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			LODOP.SET_PRINT_STYLE("Bold",1);
			
			LODOP.ADD_PRINT_TEXT(125,35,1500,100,reciver);	
			LODOP.ADD_PRINT_TEXT(125,90,1500,100,reciver_tel);	
			//LODOP.ADD_PRINT_TEXT(125,210,1500,100,orderData.address.oab_postcode);	
			
			LODOP.ADD_PRINT_TEXT(150,35,300,70,reciver_street);	
			
			//收件人下面竖线
			LODOP.ADD_PRINT_LINE(220,185,330,185,1,5);
			
			//订单号
			LODOP.SET_PRINT_STYLE("FontSize",8);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			LODOP.ADD_PRINT_TEXT(230,10,400,200,"订单号:"+order);	
			LODOP.ADD_PRINT_TEXT(250,10,180,200,"品名:"+order_detail);	
			LODOP.ADD_PRINT_TEXT(310,10,180,200,"重量:(克)"+order_w*1000);	
			
			//收件人
			LODOP.SET_PRINT_STYLE("FontSize",9);
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			LODOP.ADD_PRINT_TEXT(230,230,180,220,"收件人/代收人:");	
			LODOP.ADD_PRINT_TEXT(280,195,180,200,"代收款:");	
			LODOP.ADD_PRINT_TEXT(295,195,180,200,"签收时间:");	
			LODOP.ADD_PRINT_TEXT(310,260,180,200,"年  月  日  时");			
			
			//邮政logo
			//LODOP.ADD_PRINT_IMAGE(347,195,140,60,"<img width='140px' height='60px' src='img/HK-LOGO.png' />")
			
			//收件人
			LODOP.ADD_PRINT_LINE(405,0,405,1400,1,5);
			LODOP.SET_PRINT_STYLE("FontSize",10);		//设置打印项的输出风格，成功执行该函数，此后再增加的打印项按此风格输出。
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.ADD_PRINT_TEXT(410,5,20,100,"收件");	
			//收件人详情
			LODOP.SET_PRINT_STYLE("FontSize",10);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			LODOP.SET_PRINT_STYLE("Bold",1);
			
			
			LODOP.ADD_PRINT_TEXT(410,35,1500,100,reciver);	
			LODOP.ADD_PRINT_TEXT(410,90,1500,100,reciver_tel);	
			//LODOP.ADD_PRINT_TEXT(410,210,1500,100,orderData.address.oab_postcode);	
			LODOP.ADD_PRINT_TEXT(425,35,300,70,reciver_street);	
			
			
			
			
			//寄件人
			LODOP.ADD_PRINT_LINE(470,0,470,1400,1,5);
			

			LODOP.SET_PRINT_STYLE("FontSize",10);		//设置打印项的输出风格，成功执行该函数，此后再增加的打印项按此风格输出。
			LODOP.SET_PRINT_STYLE("Bold",1);
			LODOP.ADD_PRINT_TEXT(473,5,20,100,"寄件");	
			
			LODOP.ADD_PRINT_LINE(405,30,524,30,1,5);//竖线
			LODOP.ADD_PRINT_LINE(470,310,550,310,1,5);//竖线
			LODOP.SET_PRINT_STYLE("FontSize",8);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			
			LODOP.ADD_PRINT_TEXT(475,35,1500,100,sender_address);	
			LODOP.ADD_PRINT_TEXT(485,35,1500,100,sender_tel);	
			
			LODOP.ADD_PRINT_TEXT(495,35,1500,100,"客户编码:4401012011000	(收寄局)");	
			
			
			LODOP.ADD_PRINT_LINE(524,0,524,310,1,5);	//横线
			//订单号
			LODOP.SET_PRINT_STYLE("FontSize",8);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			
			LODOP.ADD_PRINT_TEXT(526,10,400,200,"订单号:"+order);	
			
			LODOP.ADD_PRINT_LINE(540,0,540,310,1,5);	//横线
			//订单号
			LODOP.SET_PRINT_STYLE("FontSize",8);
			LODOP.SET_PRINT_STYLE("FontName","宋体");
			LODOP.ADD_PRINT_TEXT(542,10,310,200,"网址:www.chinapost.com.cn");	
			
			
			//添加线条
			LODOP.ADD_PRINT_LINE(90,0,90,1400,1,5);
			LODOP.ADD_PRINT_LINE(120,0,120,1400,1,5);
			
			//竖线
			LODOP.ADD_PRINT_LINE(120,30,220,30,1,5);
			
			//横线
			LODOP.ADD_PRINT_LINE(220,0,220,1400,1,5);




			
			LODOP.PRINT();	
		}

		


};
	//alert(count);
/* 	for(var c=0;c<count;c++){
		
		
		var det = document.getElementById("detail"+c).value;
		foreach(det){

			alert(det);
		}

	} */
	
	


function Print5() {		
	LODOP=getLodop();  
	LODOP.PRINT_INIT("");	
	LODOP.SET_PRINT_PAGESIZE(1,document.getElementById('W1').value,document.getElementById('H1').value,"A3");
	AddPrintContent("10101010101010","郭德强");
  	LODOP.PRINT();	
	LODOP.PRINT_INIT("");	  	
	LODOP.SET_PRINT_PAGESIZE(1,document.getElementById('W1').value,document.getElementById('H1').value,"A3");
	AddPrintContent("10101010101012","于谦");
  	LODOP.PRINT();		
};		

function SetPrint7() {		
	LODOP=getLodop();  
	LODOP.PRINT_INIT("");
	var strResult=LODOP.SET_PRINT_MODE("WINDOW_DEFPRINTER",getSelectedPrintIndex());
	alert(strResult);
};
function SetPrint8() {		
	LODOP=getLodop();  
	LODOP.PRINT_INIT("");
	var strResult=LODOP.SET_PRINT_MODE("WINDOW_DEFPAGESIZE:"+getSelectedPrintIndex(),getSelectedPageSize());
	//var strResult=LODOP.SET_PRINT_MODE("WINDOW_DEFPAGESIZE:"+getSelectedPrintIndex(),"LodopCustomPage");
	alert(strResult);
};				
function AddPrintContent(strCode,strName) {		

	
	
	LODOP.SET_PRINT_STYLE("FontColor",16711680);
	LODOP.ADD_PRINT_RECT(62,16,459,217,0,1);
	LODOP.ADD_PRINT_TEXT(15,137,157,25,"交通银行（      ）");
	LODOP.SET_PRINT_STYLEA(2,"FontName","隶书");
	LODOP.SET_PRINT_STYLEA(2,"FontSize",11);
	LODOP.SET_PRINT_STYLEA(2,"FontColor",0);
	LODOP.ADD_PRINT_TEXT(41,213,100,20,"2008年11月9日");
	LODOP.ADD_PRINT_TEXT(17,281,100,20,"个人业务受理书");
	LODOP.SET_PRINT_STYLEA(4,"FontColor",0);
	LODOP.ADD_PRINT_TEXT(75,37,431,20,"机构:109110 交易代码:010110");
	LODOP.ADD_PRINT_TEXT(102,37,431,20,"个人网银用户签约成功！");
	LODOP.ADD_PRINT_TEXT(129,37,431,20,"网点名称：东城分行营业部");
	LODOP.ADD_PRINT_TEXT(156,37,431,20,"主卡卡号："+strCode);
	LODOP.ADD_PRINT_TEXT(183,37,431,20,"客户姓名："+strName);
	LODOP.ADD_PRINT_TEXT(212,37,431,20,"登陆方式：用户名登陆");
	LODOP.ADD_PRINT_TEXT(17,218,60,20,"东城分行");
	LODOP.ADD_PRINT_TEXT(249,169,221,20,"以上内容已核实确认无误，客户签名：");
	LODOP.ADD_PRINT_TEXT(106,484,23,127,"第二联客户留联");
	LODOP.SET_PRINT_STYLEA(13,"FontColor",0);
	LODOP.ADD_PRINT_TEXT(284,21,74,20,"授权员");
	LODOP.SET_PRINT_STYLEA(14,"FontColor",0);
	LODOP.ADD_PRINT_TEXT(284,200,74,20,"复核员");
	LODOP.SET_PRINT_STYLEA(15,"FontColor",0);
	LODOP.ADD_PRINT_TEXT(284,346,74,20,"经办员");
	LODOP.SET_PRINT_STYLEA(16,"FontColor",0);
};
function getSelectedPrintIndex(){
	if (document.getElementById("Radio2").checked) 
	return document.getElementById("PrinterList").value;
	else return -1; 		
};
function getSelectedPageSize(){
	if (document.getElementById("Radio4").checked) 
	return document.getElementById("PagSizeList").value;
	else return ""; 		
};	
function CreatePrinterList(){
    if (document.getElementById('PrinterList').innerHTML!="") return;
	LODOP=getLodop(); 
	var iPrinterCount=LODOP.GET_PRINTER_COUNT();
	for(var i=0;i<iPrinterCount;i++){

			var option=document.createElement('option');
			option.innerHTML=LODOP.GET_PRINTER_NAME(i);
			option.value=i;
		document.getElementById('PrinterList').appendChild(option);
	};	
};
function clearPageListChild(){
   var PagSizeList =document.getElementById('PagSizeList'); 
   while(PagSizeList.childNodes.length>0){
		   var children = PagSizeList.childNodes;	
  		 for(i=0;i<children.length;i++){		
		PagSizeList.removeChild(children[i]);	
  	  };	   
   };	   
}
function CreatePagSizeList(){
   LODOP=getLodop(); 
   clearPageListChild();
   var strPageSizeList=LODOP.GET_PAGESIZES_LIST(getSelectedPrintIndex(),"\n");
   var Options=new Array(); 
	   Options=strPageSizeList.split("\n");       
   for (i in Options)    
   {    
     var option=document.createElement('option');   
	 option.innerHTML=Options[i];
	 option.value=Options[i];
		 document.getElementById('PagSizeList').appendChild(option);
   }  
}	
</script> 
</body>
</html>