
var jsonData = {};
var orderFinish = true;
function a4print(ordersCode){	
	if(!LODOP){
		LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
	}
	//alert(LODOP.SELECT_PRINTER());
	//return;
	var printerNo = getPrinterNo('A4');
	if(printerNo===null){
		$('.printerSetUp').click();
		return;
	}
	var o = jsonData[ordersCode];
	var product_contents = '';
	var product_count = 0;
	var order_cost = 0;
	$.each(o.order_product_unique,function(k,v){
		product_contents+=v.product_title+' x '+v.op_quantity+',';
		order_cost+=parseFloat(v.op_unit_price)*parseInt(v.op_quantity);
		product_count+=parseInt(v.op_quantity);
	});
	var attn = '';
	var style = '';
	//alert(LODOP.GET_PRINTER_NAME(printerNo));	
	LODOP.PRINT_INITA("0mm","0mm","210mm","291mm","订单"+ordersCode+"发票打印");
	LODOP.SET_PRINT_PAGESIZE(1,'210mm','291mm','A4');

	LODOP.ADD_PRINT_TEXT("48.9mm","32mm","143.9mm","7.9mm","     Commercial Invoice");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",15);
	LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
	LODOP.SET_PRINT_STYLEA(0,"Bold",1);
	LODOP.SET_PRINT_STYLEA(0,"Horient",2);
	LODOP.ADD_PRINT_TEXT("64mm","32mm","143.9mm","6.6mm","Shipper per TOLL");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("73.3mm","32mm","143.9mm","6.6mm","AWB: HKG"+$("#trackingNumber").val());
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("82.3mm","32mm","143.9mm","6.6mm","Consignee Name :"+o.country_name);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("90.5mm","32mm","143.9mm","6.6mm","Address:  "+o.oa_consignee_address1+' '+o.oa_consignee_address2+' '+o.oa_consignee_address3);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("99.2mm","52.9mm","123mm","6.6mm",""+o.oa_consignee_city);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("107.2mm","52.9mm","123mm","6.6mm",""+o.oa_country_name);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("119.3mm","32mm","143.9mm","6.6mm","Attn.:"+attn);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("127.8mm","32mm","143.9mm","6.6mm","Telephone:"+o.oa_consignee_phone);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("136.5mm","32mm","18.3mm","15.1mm","Detail:");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("153.7mm","32mm","143.9mm","6.6mm","Style:"+style);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("163mm","32mm","143.9mm","6.6mm","HS CODE:");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("192.4mm","32mm","143.9mm","6.6mm","Signed");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("202.4mm","32mm","143.9mm","6.6mm","_ _ _ _ _ _ _ _ _ _ _ _ _ _");
	LODOP.ADD_PRINT_TEXT("210.6mm","32mm","143.9mm","6.6mm","Date:");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("136.5mm","52.9mm","123mm","14.8mm",product_contents);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);	
	LODOP.ADD_PRINT_TEXT("173.6mm","31.5mm","143.9mm","6.6mm","Value:                                                              No Commercial Value");
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
	LODOP.ADD_PRINT_TEXT("183.4mm","31.5mm","143.9mm","6.6mm","Value for Custom Purposes                               Total:"+o.currency_code+' $'+order_cost);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
		
	LODOP.SET_PRINTER_INDEX(printerNo);
	if(lodopRegister){
		LODOP.PRINT(); 	
	}else{
		LODOP.PREVIEW(); 
	}
	
}

function shipPrint(ordersCode){	
	if(!LODOP){
		LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
	}
	var l=-1.5,t=0;
	var printerNo = getPrinterNo('Toll');	
	//alert(printerNo);
	if(printerNo===null){
		$('.printerSetUp').click();
		return;
	}
	//alert(LODOP.GET_PRINTER_NAME(printerNo));	
	var o = jsonData[ordersCode];
	LODOP.PRINT_INITA("0mm","0mm","241mm","153mm","订单"+ordersCode+"打印物流单");
	//LODOP.ADD_PRINT_SETUP_BKIMG("C:\\Documents and Settings\\peachtao\\桌面\\940.jpg");
	LODOP.SET_PRINT_PAGESIZE(1,'241mm','153mm','CreateCustomPage');	
	LODOP.ADD_PRINT_IMAGE("0","0","241mm","153mm","<img src='"+lodopDomain+"/lodop/toll.jpg'/>");
	LODOP.SET_PRINT_STYLEA(0,"PreviewOnly",1);
	LODOP.ADD_PRINT_TEXT((32+l)+"mm",(94.7+t)+"mm","74.1mm","5.3mm",o.oa_consignee_company);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((43.6+l)+"mm",(94.7+t)+"mm","72.8mm","10.6mm",o.oa_consignee_address1+' '+o.oa_consignee_address2+' '+o.oa_consignee_address3);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((56.5+l)+"mm",(94.7+t)+"mm","34.4mm","5.3mm",o.oa_consignee_city);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((63.7+l)+"mm",(94.7+t)+"mm","33.9mm","5.3mm",o.oa_country_code);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((70.0+l)+"mm",(94.7+t)+"mm","34.7mm","5.3mm",o.oa_consignee_phone);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((56.5+l)+"mm",(132.3+t)+"mm","35.2mm","5.3mm",o.oa_consignee_region);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((63.7+l)+"mm",(132.3+t)+"mm","35.5mm","5.3mm",o.oa_consignee_zip);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((70.0+l)+"mm",(132.3+t)+"mm","35.5mm","5.3mm",o.oa_consignee_email);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
		LODOP.ADD_PRINT_TEXT((36.8+l)+"mm",(123.6+t)+"mm","53.9mm","5.3mm",o.oa_consignee_first_name+' '+o.oa_consignee_last_name);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	var product_contents = '';
	var product_count = 0;
	var order_weight = 0;
	$.each(o.order_product_unique,function(k,v){
		product_contents+=v.product_title+' x '+v.op_quantity+',';
		order_weight+=parseFloat(v.op_weight)*parseInt(v.op_quantity);
		product_count+=parseInt(v.op_quantity);
	});
	LODOP.ADD_PRINT_TEXT((54.7+l)+"mm",(169.9+t)+"mm","50.5mm","14.4mm",product_contents);
	LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	LODOP.ADD_PRINT_TEXT((75.1+l)+"mm",(173.4+t)+"mm","14.6mm","5.3mm",product_count);
	LODOP.SET_PRINT_STYLEA(0,"FontName","verdana");
	LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
	
	LODOP.SET_PRINTER_INDEX(printerNo);
	if(lodopRegister){
		LODOP.PRINT(); 	
	}else{
		LODOP.PREVIEW(); 
	}
	
}
$(function(){	

    $("#bindTrackingNumber").click(function(){
    	bindTrackingNumber();
    });
    
    $("#printShipLabel").click(function(){
        if($('#bindTrackingNumber').attr('finish')!=1){
        	trackingNumberTip('请绑定物流单号');
        	return false;
        }
        if($(this).attr('finish')==1){
        	if(!window.confirm('重新打印物流单吗？请确保订单与物流单是否对应一致')){
        		return false;
        	}
        }
        var orders_code = $(this).attr('orders_code');
        var this_ = $(this);
        loading();
        $.ajax({
            type: "POST",
            async: false,
            dataType: "json",
            url: "/admin/hk-order/ship-complete/",
            data: {'ordersCode':orders_code,'type':'ship-label'},
            success: function(json) {
            	closeLoading();
                if(json.ask){
                	shipPrint(orders_code);
                	this_.attr('finish','1');
                	$('#messageWrap').append('<div>物流单已经送入打印机</div>');
                	$("."+orders_code+" .is_print_tracking_number").text("YES");
                }else{
                    alertTip(json.message);
                }
            }
        });  
    	
    });

    $("#printInvoice").click(function(){
    	if($('#bindTrackingNumber').attr('finish')!=1){
        	trackingNumberTip('请绑定物流单号');
        	return false;
        }
    	if($('#printShipLabel').attr('finish')!=1){        		
    		//trackingNumberTip('请打印物流单');
    		//return false;
    	}
    	if($(this).attr('finish')==1){
    		if(!window.confirm('重新打印发票吗？请确保订单，物流单，发票是否对应一致')){
    			return false;
    		}
    	}
     	var orders_code = $(this).attr('orders_code');
     	var this_ = $(this);
     	loading();
       	$.ajax({
            type: "POST",
            async: false,
            dataType: "json",
            url: "/admin/hk-order/ship-complete/",
            data: {'ordersCode':orders_code,'type':'invoice'},
            success: function(json) {
            	closeLoading();
                if(json.ask){
                	a4print(orders_code);
                	this_.attr('finish','1');
                	$('#messageWrap').append('<div>发票已经送入打印机</div>');
                	$("."+orders_code+" .is_print_invoice").text("YES");
                }else{
                    alertTip(json.message);
                }
            }
        });  
        
    });

    $("#finish").click(function(){
        var orders_code = $(this).attr('orders_code');
        if($('#bindTrackingNumber').attr('finish')==1&&$('#printShipLabel').attr('finish')==1&&$('#printInvoice').attr('finish')==1){
      	  	loading();
            $.ajax({
                type: "POST",
                async: false,
                dataType: "json",
                url: "/admin/hk-order/ship-complete/",
                data: {'ordersCode':orders_code,'type':'finish'},
                success: function(json) {
                	closeLoading();
                    if(json.ask){
                    	orderFinish = true;
                    	//$("#loadData ."+orders_code).remove();
                    	initData(paginationCurrentPage-1);
                    	$("#orderRowData").slideUp();
                    }else{
                        alertTip('当前订单操作未完成');
                    }
                }
            });        	
        	
        }else{
            alertTip('当前订单操作未完成');
        }        
    });

    $("#cancel").click(function(){
    	orderRowDataInit();
    });
});

paginationPageSize  = 5;//记录总数
function search(){
	paginationCurrentPage=1;
	initData(0);
}


function loadData(page, pageSize) {
	$("#ckAll").attr("checked",false);
	$(".foldToggle").attr("status","0");
    var vForm = $("#sForm").serialize();

    //loading();
    $.ajax({
        type: "POST",
        async: false,
        dataType: "json",
        url: "/admin/hk-order/list/page/" + page + "/pageSize/" + pageSize,
        data: vForm,
        success: function(json) {
            closeLoading();
            debug(json);
            $(".checkAll").attr("checked",false);
            var list = "";
            paginationTotal = json.count;
           
            jsonData = {};
            if (json.ask == 0) {
                list = "<tr><td colspan='9' class=\"center\">&nbsp;"+json.message+"</td></tr>";
            } else {
                jsonData = json.data;
                //var i = page==1 ? 1 : pageSize * (page-1)+1;
                $.each(json.data, function(key, val) {   
                	jsonData[val.orders_code] = val;  
                	var orderRowSelected = val.orders_code==$("#bindTrackingNumber").attr('orders_code')?" orderRowSelected":" ";
                	list+='<tr class="orderRow '+val.orders_code+orderRowSelected+'" orders_code="'+val.orders_code+'">';
                	list+='<th><input type="checkbox" name="ordersCodes[]" class="ordersCodes" value="'+val.orders_code+'"/></th>';
                	list+='<td  orders_code="'+val.orders_code+'">'+val.orders_code+'</td>';
                	list+='<td>'+val.customer_order_code+'</td>';
                	list+='<td>'+val.shipping_method+'</td>';
                	list+='<td>'+val.oa_country_name+'</td>';
                	list+='<td class="is_bind_tracking_number">'+val.is_bind_tracking_number+'</td>';
                	list+='<td class="is_print_tracking_number">'+val.is_print_tracking_number+'</td>';
                	list+='<td class="is_print_invoice">'+val.is_print_invoice+'</td>';
                	list+='<td>';
                	list+='<a target="_blank" href="/admin/order/detail/ordersCode/'+val.orders_code+'" title="View"><img src="/images/icon_view.gif" alt="View"/></a>';

                	if(val.orders_status==1){
                	    //list+='<a target="_blank" href="/admin/hk-order/create/ordersCode/'+val.orders_code+'" title="Edit"><img src="/images/icon_edit.gif" alt="Edit"/></a>';
                	}
                	list+='</td>';
                	list+='</tr>';
                	
                	list+='<tr class="order_product" id="'+val.orders_code+'">';
                	list+='<td colspan="9">';
                	list+='<table class="formtable " cellspacing="0" cellpadding="0">';
                    list+='<tr>';

                    list+='<th>SKU</th>';
                	list+='<th>SKUName</th>';
                	list+='<th>Category</th>';
                	list+='<th>Weight</th>';
                	list+='<th>Quantity</th>';

                	list+='</tr>';

                	$.each(val.order_product,function(k,product){
                		list+='<tr>';                    	
                    	list+='<td><a target="_blank" href="/admin/product/detail/productId/'+product.product_id+'">'+product.product_sku+'</a></td>';
                    	list+='<td>'+product.product_title+'</td>';
                    	list+='<td>'+product.category_name+'</td>';
                    	list+='<td>'+product.product_weight+'</td>';
                    	list+='<td>'+product.op_quantity+'</td>';
                    	list+='</tr>';
                	});
                	
                	list+='</table>';
                	list+='</td>';
                	
                	list+='</tr>';
                });
            }
            $("#loadData").html(list);
        }
    });
}

function fillData(orderData){
	$("#trackingNumber").val(orderData.tracking_number);
	if(orderData.tracking_number!=''){
		$("#bindTrackingNumber").attr('finish','1');
		$('#messageWrap').append('<div>物流单已经绑定订单</div>');
	}
	if(orderData.is_print_invoice=='YES'){
		$("#printInvoice").attr('finish','1');
		$('#messageWrap').append('<div>发票已经打印完成</div>');
	}
	if(orderData.is_print_tracking_number=='YES'){
		$("#printShipLabel").attr('finish','1');
		$('#messageWrap').append('<div>物流单已经打印完成</div>');
	}
	
    $("#bindTrackingNumber").attr('orders_code',orderData.orders_code);
    $("#printShipLabel").attr('orders_code',orderData.orders_code);
    $("#printInvoice").attr('orders_code',orderData.orders_code);
    $("#finish").attr('orders_code',orderData.orders_code);
    
    $('#o_orders_code').text(orderData.orders_code);
    $('#o_customer_order_code').text(orderData.customer_order_code);
    $('#o_orders_code').text(orderData.orders_code);
    $('#o_shipping_method').text(orderData.shipping_method);
    $('#o_warehouse_name').text(orderData.warehouse_name);
    $('#o_order_type_title').text(orderData.order_type_title);
    $('#o_oa_consignee_company').text(orderData.oa_consignee_company);
    $('#o_oa_consignee_last_name').text(orderData.oa_consignee_last_name);
    $('#o_oa_consignee_first_name').text(orderData.oa_consignee_first_name);
    $('#o_country_name').text(orderData.country_name);
    $('#o_oa_consignee_zip').text(orderData.oa_consignee_zip);
    $('#o_oa_consignee_region').text(orderData.oa_consignee_region);
    $('#o_oa_consignee_city').text(orderData.oa_consignee_city);
    $('#o_oa_consignee_address1').text(orderData.oa_consignee_address1);
    $('#o_oa_consignee_address2').text(orderData.oa_consignee_address2);
    $('#o_oa_consignee_address3').text(orderData.oa_consignee_address3);
    $('#o_oa_consignee_phone').text(orderData.oa_consignee_phone);
    $('#o_customer_id').text(orderData.customer_id);
    $('#o_oa_consignee_email').text(orderData.oa_consignee_email);
    $('#o_add_time').text(orderData.add_time);
    $('#o_last_modified_time').text(orderData.last_modified_time);
    $('#o_remark').text(orderData.remark);
    var productHtml = '';
    productHtml+='<table cellspacing="0" cellpadding="0" class="formtable tableborder">';
	productHtml+='<thead>';
	productHtml+='<tr>';
	productHtml+='<th width="100">ProductSku</th>';
	productHtml+='<th width="">ProductName</th>';
	productHtml+='<th width="50">Weight</th>';
	productHtml+='<th width="30">Qty</th>';
	productHtml+='<th width="100">DeclaredValue</th>';
	productHtml+='</tr>';
	productHtml+='</thead>';
	productHtml+='<tbody>';		
    $.each(orderData.order_product_unique,function(k,v){    		
		productHtml+='<tr>';
		productHtml+='<td>'+v.product_sku+'</td>';
		productHtml+='<td>'+v.product_title+'</td>';
		productHtml+='<td class="op_weight">'+v.op_weight+'</td>';
		productHtml+='<td class="op_quantity">'+v.op_quantity+'</td>';
		productHtml+='<td>'+v.op_unit_price+'</td>';
		productHtml+='</tr>';
    })
	productHtml+='</tbody>';
    productHtml+='</table>';
    $("#productWrap").html(productHtml);
	$("#orderRowData").slideDown();
	setTimeout(function(){
		$("#trackingNumber").focus().select();
	},100);
}
function trackingNumberTip(tip){
	$('<div title="Note(Esc)">'+tip+'</div>').dialog({       
        autoOpen: true,
        width: 500,
        modal: true,
        show:"slide",
        buttons: {            
            'Close': function() {
                $(this).dialog('close');
            }
        },
        close: function() {
            $('#trackingNumber').focus().select();
        }
    });
}
function bindTrackingNumber(){
	var orders_code = $("#bindTrackingNumber").attr('orders_code');
	var trackingNumber = $("#trackingNumber").val();
	if($.trim(trackingNumber)==''){
		trackingNumberTip('请输入物流单号');
	    return;
	}
	var rebind = false;
	var param = {'ordersCode':orders_code,'trackingNumber':trackingNumber};
	if($("#bindTrackingNumber").attr('finish')=='1'){
		if(!window.confirm('订单已经与物流单绑定，需要更换新的物流单吗？')){
			return;
		}else{
			rebind = true;
			param.is_print_tracking_number=0;
			param.is_print_invoice=0;
			$('#messageWrap').html('');
		}
		//alertTip('订单已经与物流单绑定，不能重复绑定');
	    //return;
	}
	loading();
	$.ajax({
        type: "POST",
        async: false,
        data:param,
        dataType: "json",
        url: "/admin/hk-order/bind-tracking-number/",
        success: function(json) {
            closeLoading();
            if(json.ask){
            	//alertTip(json.message);
            	$("#bindTrackingNumber").attr('finish','1');
            	if(rebind){
                	$("#printShipLabel").attr('finish','0');
                	$("#printInvoice").attr('finish','0');
                	$("."+orders_code+" .is_print_tracking_number").text("NO");
                	$("."+orders_code+" .is_print_invoice").text("NO");
            	}
            	$('#messageWrap').append('<div>物流单已经绑定订单</div>');
            	$("."+orders_code+" .is_bind_tracking_number").text("YES");
            }else{
            	$("."+orders_code+" .is_bind_tracking_number").text("NO");
                var html = json.message+'<br/>';
                $.each(json.errors,function(k,v){
                	html+= v+'<br/>';
                })
                trackingNumberTip(html);
            }
        }
	});
}
function orderRowDataInit(){
	//初始化
    $('#trackingNumber').val('');
    $('#bindTrackingNumber').attr('orders_code','').attr('finish','0');
    $('#printShipLabel').attr('orders_code','').attr('finish','0');
    $('#printInvoice').attr('orders_code','').attr('finish','0');
    $('#finish').attr('orders_code','');
    $('#messageWrap').html('');

    $('#o_orders_code').text('');
    $('#o_customer_order_code').text('');
    $('#o_orders_code').text('');
    $('#o_shipping_method').text('');
    $('#o_warehouse_name').text('');
    $('#o_order_type_title').text('');
    $('#o_oa_consignee_company').text('');
    $('#o_oa_consignee_last_name').text('');
    $('#o_oa_consignee_first_name').text('');
    $('#o_country_name').text('');
    $('#o_oa_consignee_zip').text('');
    $('#o_oa_consignee_region').text('');
    $('#o_oa_consignee_city').text('');
    $('#o_oa_consignee_address1').text('');
    $('#o_oa_consignee_address2').text('');
    $('#o_oa_consignee_address3').text('');
    $('#o_oa_consignee_phone').text('');
    $('#o_customer_id').text('');
    $('#o_oa_consignee_email').text('');
    $('#o_add_time').text('');
    $('#o_last_modified_time').text('');
    $('#o_remark').text('');
    
	$("#orderRowData").slideUp();
	orderFinish = true;
    
}
$(function() {
    $(".searchOrderBtn").click(search);
    //loading();
    //setTimeout(function(){closeLoading();},5000);
    $(".checkAll").click(function() {
        if ($(this).is(':checked')) {
            $(".ordersCodes").attr('checked', true);
        } else {
            $(".ordersCodes").attr('checked', false);
        }
    });
    
    if((LODOP==null)||(typeof(LODOP.VERSION)=="undefined")){
    	$('#container').hide();
    }
    //initData(0);
	

	$(".orderRow").live('click',function(){
	    var ordersCode = $(this).attr("orders_code");
	    var selectOrdersCode = $("#bindTrackingNumber").attr('orders_code');
	    if(!orderFinish&&(ordersCode!=selectOrdersCode&&selectOrdersCode!='')){
	        alertTip('当前订单操作未完成');	        
	    }else if(ordersCode!=selectOrdersCode){
		    orderRowDataInit();
		    
	    	fillData(jsonData[ordersCode]);
		    $('.orderRow').removeClass('orderRowSelected');
		    $(this).addClass('orderRowSelected');
		    orderFinish = false;
	    }
	    
	    //$("#"+ordersCode).toggle();
	});


	$(".foldToggle").click(function(){
	    if($(this).attr("status")=="0"){
	        $(".order_product").show();
	        $(this).attr("status",'1')
	    }else{
	        $(".order_product").hide();
	        $(this).attr("status",'0')
	    }
	});
	//回车处理
	$("#customer_order_code").add("#orders_code").keyup(function(e){
		var key = e.which;
		if(key==13){
			//search();
		}
	});

	//回车处理
	$("#trackingNumber").keyup(function(e){
		var key = e.which;
		if(key==13){
			var orders_code = $("#bindTrackingNumber").attr('orders_code');
			bindTrackingNumber();
		}
	});
	

});