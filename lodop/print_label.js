
function label_print_50x20(codes){
	
	if(!LODOP){
		LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
	}
//	alert(LODOP.VERSION);
	//return;
	var printerNo = getPrinterNo('50x20');
	if(printerNo===null){
		$('.printerSetUp').click();
		return;
	}
//	LODOP.PRINT_INITA("0mm","0mm","241mm","153mm","订单ordersCode打印物流单");
//	LODOP.SET_PRINT_PAGESIZE(1,'241mm','153mm','CreateCustomPage');	
//	
//	LODOP.ADD_PRINT_TEXT("0mm","0mm","74.1mm","5.3mm","登陆框 东方大可");
//	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
//	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	
	//alert(LODOP.GET_PRINTER_NAME(printerNo));		
	
	var l_length = codes.length;
	var l_pageSize = 100;
	var l_pages = l_length%l_pageSize==0?(l_length/l_pageSize):(l_length/l_pageSize+1);
	l_pages = parseInt(l_pages);
	loading();
	for(var a=0;a<l_pages;){
		var start = a*l_pageSize;
		var end= (a+1)*l_pageSize<=l_length?(a+1)*l_pageSize:l_length;
	
		var sub_codes = codes.slice(start,end);
		
		LODOP.PRINT_INIT("产品条形码打印");
		LODOP.SET_PRINT_PAGESIZE(1,'50mm','20mm','CreateCustomPage');
		LODOP.SET_PRINT_STYLE("FontSize",12);
		LODOP.SET_PRINT_STYLE("Alignment",2);
		LODOP.SET_PRINT_STYLE("Horient",2);
		$.each(sub_codes,function(k,v){
			LODOP.ADD_PRINT_IMAGE("2mm","0mm","50mm","15mm",'<img src="'+lodopDomain+'/default/index/barcode?code='+v+'" style="width:50mm;"/>');
			LODOP.SET_PRINT_STYLEA(0,"Horient",2);
			LODOP.SET_PRINT_STYLEA(0,"Stretch",1);
			LODOP.ADD_PRINT_IMAGE("0mm","0mm","50mm","0.8mm",'<img src="'+lodopDomain+'/lodop/blank.png"/>');
			LODOP.ADD_PRINT_IMAGE("13mm","0mm","50mm","10mm",'<img src="'+lodopDomain+'/lodop/blank.png"/>');
			LODOP.ADD_PRINT_TEXT("13.5mm","0mm","50mm","6mm",v);
			
			LODOP.NEWPAGE();
		})
		LODOP.SET_PRINT_MODE("CUSTOM_TASK_NAME","产品条形码打印"+(++a));//为每个打印单独设置任务名	
		LODOP.SET_PRINTER_INDEX(printerNo);
		if(lodopRegister){
			LODOP.PRINT(); 	
		}else{
			LODOP.PREVIEW(); 
		}
	}
	closeLoading();
	alertTip('<div style="text-align:left;">打印完成</div>');		
}

function label_print_60x32(codes){
	
	if(!LODOP){
		LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
	}
//	alert(LODOP.VERSION);
	//return;
	var printerNo = getPrinterNo('60x32');
	if(printerNo===null){
		$('.printerSetUp').click();
		return;
	}
//	LODOP.PRINT_INITA("0mm","0mm","241mm","153mm","订单ordersCode打印物流单");
//	LODOP.SET_PRINT_PAGESIZE(1,'241mm','153mm','CreateCustomPage');	
//	
//	LODOP.ADD_PRINT_TEXT("0mm","0mm","74.1mm","5.3mm","登陆框 东方大可");
//	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
//	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	
	//alert(LODOP.GET_PRINTER_NAME(printerNo));	
	
	var l_length = codes.length;
	var l_pageSize = 100;
	var l_pages = l_length%l_pageSize==0?(l_length/l_pageSize):(l_length/l_pageSize+1);
	l_pages = parseInt(l_pages);
	loading();
	for(var a=0;a<l_pages;){
		var start = a*l_pageSize;
		var end= (a+1)*l_pageSize<=l_length?(a+1)*l_pageSize:l_length;
	
		var sub_codes = codes.slice(start,end);
		
		LODOP.PRINT_INIT("产品条形码打印");
		LODOP.SET_PRINT_PAGESIZE(1,'60mm','22mm','CreateCustomPage');
		LODOP.SET_PRINT_STYLE("FontSize",12);
		LODOP.SET_PRINT_STYLE("Alignment",2);
		LODOP.SET_PRINT_STYLE("Horient",2);
		$.each(sub_codes,function(k,v){
			LODOP.ADD_PRINT_IMAGE("2mm","0mm","60mm","15mm",'<img src="'+lodopDomain+'/default/index/barcode?code='+v+'" style="width:60mm;"/>');
			LODOP.SET_PRINT_STYLEA(0,"Horient",2);
			LODOP.SET_PRINT_STYLEA(0,"Stretch",1);
			LODOP.ADD_PRINT_IMAGE("0mm","0mm","60mm","0.8mm",'<img src="'+lodopDomain+'/lodop/blank.png"/>');
			LODOP.ADD_PRINT_IMAGE("13mm","0mm","60mm","30mm",'<img src="'+lodopDomain+'/lodop/blank.png"/>');
			LODOP.ADD_PRINT_TEXT("14mm","0mm","60mm","20mm",v);
			LODOP.NEWPAGE();
		})
		LODOP.SET_PRINT_MODE("CUSTOM_TASK_NAME","产品条形码打印"+(++a));//为每个打印单独设置任务名	
		LODOP.SET_PRINTER_INDEX(printerNo);
		if(lodopRegister){
			LODOP.PRINT(); 	
		}else{
			LODOP.PREVIEW(); 
		}
	}
	closeLoading();
	alertTip('<div style="text-align:left;">打印完成</div>');
}

$(function(){	
	if((LODOP==null)||(typeof(LODOP.VERSION)=="undefined")){
		$('#container').hide();
	}

	$("#printLabelBtn").click(function(){		
		label_print_50x20(codes);
	});
});