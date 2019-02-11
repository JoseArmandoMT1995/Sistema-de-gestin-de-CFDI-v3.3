<?php  
	require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
	$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            
            ->setCellValue('A1', 'Usufolio')
            ->setCellValue('B1', 'Usulogin')
            ->setCellValue('C1', 'Usunombre')
            ->setCellValue('D1', 'Usuacceso');
    for($i=0;$i<count($datos);$i++){
        $FILA=$i;
    	$FILA= $FILA+2;
        $objPHPExcel->setActiveSheetIndex(0)		
    		->setCellValue('A'.$FILA, $datos[$i]->Usufolio)
    		->setCellValue('B'.$FILA, $datos[$i]->Usulogin)
    		->setCellValue('C'.$FILA, $datos[$i]->Usunombre)
    		->setCellValue('D'.$FILA, $datos[$i]->Usuacceso);
            }
// Miscellaneous glyphs, UTF-8

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$cat.'_todos.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>