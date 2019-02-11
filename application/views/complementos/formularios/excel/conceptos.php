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
            ->setCellValue('A1', 'ClaveProdServ')
            ->setCellValue('B1', 'NoIdentificacion')
            ->setCellValue('C1', 'ClaveUnidad')
            ->setCellValue('D1', 'Descripcion')
            ->setCellValue('E1', 'ValorUnitario')
            ->setCellValue('F1', 'Moneda')
            ->setCellValue('G1', 'Impuesto_Iva')
            ->setCellValue('H1', 'Impuesto_IvaRet')
            ->setCellValue('I1', 'Impuesto_Ieps')
            ->setCellValue('J1', 'Impuesto_Isr')             ;
            for($i=0;$i<count($datos);$i++){
            	$FILA=$i;
    			$FILA= $FILA+2;
               	$objPHPExcel->setActiveSheetIndex(0)
    				->setCellValue('A'.$FILA, $datos[$i]->ClaveProdServ)
    				->setCellValue('B'.$FILA, $datos[$i]->NoIdentificacion)
    				->setCellValue('C'.$FILA, $datos[$i]->ClaveUnidad)
    				->setCellValue('D'.$FILA, $datos[$i]->Descripcion)
    				->setCellValue('E'.$FILA, $datos[$i]->ValorUnitario)
    				->setCellValue('F'.$FILA, $datos[$i]->Moneda)
    				->setCellValue('G'.$FILA, $datos[$i]->Impuesto_Iva)
    				->setCellValue('H'.$FILA, $datos[$i]->Impuesto_IvaRet)
    				->setCellValue('I'.$FILA, $datos[$i]->Impuesto_Ieps)
    				->setCellValue('J'.$FILA, $datos[$i]->Impuesto_Isr);
            }
            /*
			for ($i=0; $i <= $contadorArreglo; $i++) { 
                foreach ($datos[$i] as $key => $valor)
                {
                	$FILA=$i;
    				$FILA= $FILA+2;
    				$objPHPExcel->setActiveSheetIndex(0)
    				>setCellValue('A'.$FILA, $tra_Base)
            		->setCellValue('B'.$FILA, $tra_Impuesto)
            		->setCellValue('C'.$FILA, $tra_TipoFactor)
            		->setCellValue('D'.$FILA, $tra_TasaOCuota)
            		->setCellValue('E'.$FILA, $tra_Importe)
            		->setCellValue('F'.$FILA, $tra_Importe);
                    echo "$valor <br>";
                }
            }
            */


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