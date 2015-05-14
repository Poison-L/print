<meta http-equiv="content-type" content="text/htm; charset=utf-8">
<title>excel转化为sql脚本</title>
 <?php
 error_reporting(E_ALL);
date_default_timezone_set("Asia/Shanghai");
 
$startTime = time();
  
echo "<div>现在时间：".date("Y:m:d H:i:s")."</div>";
  
require_once 'lib/PHPExcel/IOFactory.php';
 
$fileName = dirname(__FILE__)."/print/ok.xlsx";
//print($fileName);exit;
  
if (!file_exists($fileName)) {
     exit("文件".$fileName."不存在");
}
 
 //$objReader = PHPExcel_IOFactory::createReader("Excel2007");
 //$objPHPExcel = $objReader->load($fileName);
 $objPHPExcel = PHPExcel_IOFactory::load($fileName);
 $sheetCount = $objPHPExcel->getSheetCount();
  
 $sheetSelected = 0;
$objPHPExcel->setActiveSheetIndex($sheetSelected);
  
 $rowArray = $objPHPExcel->getActiveSheet()->getRowDimensions();
 $cellArray = $objPHPExcel->getActiveSheet()->getColumnDimensions();
 $rowCount = count($rowArray);
$cellCount = count($cellArray);

print($rowCount);exit;
 
echo "<div>Sheet Count : ".$sheetCount."　　行数： ".$rowCount."　　列数：".$cellCount."</div>";
 
 $rowIndex = 0;
$cellIndex = 0;
$rowData = NULL;
 
$dataArr = array();

while ($rowIndex < $rowCount) {
     $cellIndex = 0;
     
     $rowData = $objPHPExcel->getActiveSheet();
     
     array_push($dataArr, "<div style='margin-top:20px;'>");
     while ($cellIndex < $cellCount) {
         array_push($dataArr, "<div>".$rowData->getCellByColumnAndRow($cellIndex, $rowIndex)->getValue()."</div>");
        $cellIndex++;
     }
     array_push($dataArr, "</div>");
     
     $rowIndex++;
 }
  
 echo "<br/>消耗的内存为：".(memory_get_peak_usage(true) / 1024 / 1024)."M";
  
 $endTime = time();
  
 echo "<div>解析完后，当前的时间为：".date("Y-m-d H:i:s")."　　　总共消耗的时间为：".(($endTime - $startTime))."秒</div>";
  
echo implode("", $dataArr);
 
 $dataArr = NULL;
 ?>