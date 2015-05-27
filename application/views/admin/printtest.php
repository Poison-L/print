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


<p>订单号:<input type="text" size="15" value="<?php echo @$print[$i][order_no]; ?>" id="<?php echo $i; ?>" > 快递单号:<input type="text" size="15" value="<?php echo @$print[$i][tracking]; ?>" id="<?php echo "t".$i; ?>" > </p>
			<td ><?php @$print[$i][Id]; ?></td>
			
				
		</tr>
		
<?php } ?>


				
				
				
				<p><a href="javascript:Printc()">点击打印快递单</a></p> 
			










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
			LODOP.ADD_PRINT_BARCODE("3.2cm","4.6cm",'180','40','128A',track);
			LODOP.ADD_PRINT_BARCODE("9.4cm","4.6cm",'180','40','128A',track);
			//AddPrintContent("10101010101010","郭德强");
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