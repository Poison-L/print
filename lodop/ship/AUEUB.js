function ecPrint(data){
    if(!LODOP){
        LODOP=getLodop(document.getElementById('LODOP_OB'),document.getElementById('LODOP_EM'));
    }
    var printerNo = getPrinterNo('AUEUB');
    data.order.reference_no=data.order.reference_no==''?'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;':data.order.reference_no;
    LODOP.PRINT_INITA("0cm","0cm","14.55cm","19.84cm","打印物流单"+data.order.order_code);
    LODOP.ADD_PRINT_TEXT("0.56cm","0.64cm","3.76cm","0.5cm","Return Mail Address:");
    LODOP.ADD_PRINT_TEXT("1.14cm","0.64cm","3.76cm","0.53cm",data.order.order_code);
    LODOP.ADD_PRINT_TEXT("1.75cm","0.64cm","12.44cm","1.24cm",data.sm.sm_return_address);
    LODOP.ADD_PRINT_TEXT("4.26cm","1.01cm","8.73cm","1.19cm","TO: "+data.address.oab_lastname+' '+data.address.oab_firstname);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",20);
    LODOP.ADD_PRINT_TEXT("5.56cm","1.01cm","11.96cm","1.19cm","Tel: "+data.address.oab_phone);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",20);
    LODOP.ADD_PRINT_TEXT("7.01cm","1.03cm","11.91cm","0.95cm",data.address.oab_street_address1);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",20);
    LODOP.ADD_PRINT_TEXT("8.2cm","1.03cm","11.91cm","0.95cm",data.address.oab_street_address2);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",20);
    LODOP.ADD_PRINT_TEXT("9.3cm","1.03cm","11.91cm","0.95cm",data.address.country_code);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",18);
    LODOP.ADD_PRINT_TEXT("17.59cm","0.48cm","4.92cm","0.95cm",data.order.sm_code);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",18);
    LODOP.ADD_PRINT_TEXT("17.57cm","5.72cm","7.65cm","0.95cm","RefNo:"+data.order.reference_no);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"Alignment",3);
    LODOP.ADD_PRINT_SHAPE(4,"12.46cm","0.58cm","12.96cm","0.08cm",0,1,"#000000");
    LODOP.ADD_PRINT_SHAPE(4,"17.36cm","0.56cm","12.96cm","0.08cm",0,1,"#000000");
    LODOP.ADD_PRINT_BARCODE("14.13cm","1.46cm","11.11cm","2.12cm","128A",data.order.order_code);
    LODOP.ADD_PRINT_TEXT("12.7cm","2.7cm","8.04cm","0.95cm",data.order.order_code);
    LODOP.SET_PRINT_STYLEA(0,"FontName","Verdana");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",16);

    LODOP.SET_PRINTER_INDEX(printerNo);
    LODOP.PREVIEW();
    LODOP.PRINT();
}