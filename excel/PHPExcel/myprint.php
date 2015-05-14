<?php  
/** 
 * 读取excel数据,插入数据库 
 */  
header('Content-Type:text/html;charset=utf-8');//设置php页面字符集  
  


require_once 'lib/PHPExcel.php';  //phpexcel主程序文件
require_once 'lib/PHPExcel/Reader/Excel2007.php';  //07版excel配置文件
require_once 'lib/PHPExcel/Reader/Excel5.php';  
include_once 'lib/PHPExcel/IOFactory.php';  


  //创建新的PHPExcel对象  
$objexcel=new PHPExcel();  
$php_reader = new PHPExcel_Reader_Excel2007();  
  
//$objexcel->setActiveSheetIndex(0)->setCellValue('A1', '中文');  
  
$excelFileUrl = 'print/11.xlsx';//xlsx文件路径  
//$xlsFileUrl = '01simple.xls';//97-03版excel文件路径  
  
echo '<pre>';  
if(file_exists($excelFileUrl))  
{  
    $php_reader->canRead($excelFileUrl);  
  
    $objexcel = $php_reader->load($excelFileUrl);  
      
    $current_sheet =$objexcel->getSheet(0);  
      
    $all_column =$current_sheet->getHighestColumn();//获取excel文件里的最大列标  
    $all_row =$current_sheet->getHighestRow();//获取excel文件里的最大行标  
  
    $excelFileArray=array();  
    
    
    
    //循环列标和行标  
    //将取得内容组成一个二维数组 格式： Array['列标']['行标']['value']=值  
    for($c = 'A'; $c <= $all_column; $c++)  
    {  
        for($r = 0; $r <= $all_row; $r++)  
        {  
            $SerialNum = $c.$r;//excel文件里的坐标。即列标与行数结合  
            $content = $current_sheet->getCell($SerialNum)->getValue();//获取excel文件里当前坐标下（文本框）的内容  
              
            //如果当前坐标内的值为object对象类型  
            if(is_object($content))  
            {  
                $content = $content->__toString();  
            }  
              
            $excelFileArray[$r][$c]['content'] = $content;  
        }  
    }  
    //var_dump($excelFileArray);exit;
    
    @$conn= mysql_connect('localhost','root','root') or die("连接错");
    mysql_query("set names utf8");//设置编码输出
    mysql_select_db('print'); //选择数据库
    
    //print_r(count($excelFileArray));exit;
      /*   $order_no = '';
        $order_num = '';
        $order_w = '';
        $order_detail = '';
        $express_no = '';
        $tracking = '';
        $reciver = '';
        $reciver_tel = '';
        $reciver_post = '';
        $reciver_province = '';
        $reciver_city = '';
        $reciver_street = '';
        $sender = '';
        $sender_tel = '';
        $sender_post = '';
        $sender_adress = ''; */
    for($n = 2;$n<count($excelFileArray);$n++){
        
        $order_no = $excelFileArray[$n]['A']['content'];
        $order_num = $excelFileArray[$n]['B']['content'];
        $order_w = $excelFileArray[$n]['C']['content'];
        $order_detail = $excelFileArray[$n]['D']['content'];
        $express_no = $excelFileArray[$n]['E']['content'];
        $tracking = $excelFileArray[$n]['F']['content'];
        $reciver = $excelFileArray[$n]['G']['content'];
        $reciver_tel = $excelFileArray[$n]['H']['content'];
        $reciver_post = $excelFileArray[$n]['I']['content'];
        $reciver_province = $excelFileArray[$n]['J']['content'];
        $reciver_city = $excelFileArray[$n]['K']['content'];
        $reciver_street = $excelFileArray[$n]['L']['content'];
        $sender = $excelFileArray[$n]['M']['content'];
        $sender_tel = $excelFileArray[$n]['N']['content'];
        $sender_post = $excelFileArray[$n]['O']['content'];
        $sender_adress = $excelFileArray[$n]['P']['content'];
        
        $sql = "INSERT INTO `print_orders` (`order_no`,`order_num`,`order_w`,`order_detail`,`express_no`,`tracking`,`reciver`,`reciver_tel`,`reciver_post`,`reciver_province`,`reciver_city`,`reciver_street`,`sender`,`sender_tel`,`sender_post`,`sender_adress`) 
            VALUES ('$order_no','$order_num','$order_w','$order_detail','$express_no','$tracking',
                    '$reciver','$reciver_tel','$reciver_post','$reciver_province','$reciver_city',
                    '$reciver_street','$sender','$sender_tel','$sender_post','$sender_adress');";
        
        
        mysql_query($sql);
        
    }
    exit;

    
    $sql = "INSERT INTO `print_orders` (`order_no`,`order_num`,`order_w`,`order_detail`,`express_no`,`tracking`,`reciver`,`reciver_tel`,`reciver_post`,`reciver_province`,`reciver_city`,`reciver_street`,`sender`,`sender_tel`,`sender_post`,`sender_adress`) VALUES ('123456','1','1','一个打印机','中港快递','123654','刘德华','15900000000','521000','广东省','潮州市','湘桥区11号','周润发','15800011111','566666','广东省深圳市福田区11号');";
    //print($sql);exit;
    mysql_query($sql);exit;
    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
        $sql = "INSERT INTO excel VALUES(null,'".$data->sheets[0]['cells'][$i][6]."')";
        echo $sql.'<br />';
        mysql_query($sql);
    }
      
}  
echo '</pre>'; 

//Add a hyperlink to the sheet 添加链接
/* $objPHPExcel->getActiveSheet()->setCellValue(‘E26′, ‘www.phpexcel.net’);
 $objPHPExcel->getActiveSheet()->getCell(‘E26′)->getHyperlink()->setUrl(‘http://www.phpexcel.net’);
 $objPHPExcel->getActiveSheet()->getCell(‘E26′)->getHyperlink()->setTooltip(‘Navigate to website’);
 $objPHPExcel->getActiveSheet()->getStyle(‘E26′)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);*/


if(@$_POST['Submit'])
{
    $data->read($_POST['file']);
     
    for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
        /* $sql = "INSERT INTO excel VALUES(null,'".$data->sheets[0]['cells'][$i][6]."')";
         $query=mysql_query($sql);
         if($query)
         {
         echo "chenggong";
         }else{
         echo "eee";
         }   */
        print_r($data->sheets[0]['cells']);
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-cn">
<head></head>
<body>
<form id="form1" name="form1" method="post" action="">  
  <label>  
  <input name="file" type="file" id="file13"/>  
  <input type="submit" name="Submit" value="提交" />  
  </label>  
</form> 
</body>
</html>
