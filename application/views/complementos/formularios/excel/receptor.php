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
            ->setCellValue('A1', 'Id_receptor')
            ->setCellValue('B1', 'RFC_receptor')
            ->setCellValue('C1', 'Regimen_fiscal')
            ->setCellValue('D1', 'Tipo_perosna_receptor')
            ->setCellValue('E1', 'Rason_social_receptor')
            ->setCellValue('F1', 'Nombre')
            ->setCellValue('G1', 'Ap_paterno')
            ->setCellValue('H1', 'Ap_materno')
            ->setCellValue('I1', 'Calle')
            ->setCellValue('J1', 'NoExterior')
            ->setCellValue('K1', 'NoInterior')
            ->setCellValue('L1', 'Colonia')
            ->setCellValue('M1', 'Localidad')
            ->setCellValue('N1', 'Municipio')
            ->setCellValue('O1', 'Estado')
            ->setCellValue('P1', 'Pais')
            ->setCellValue('Q1', 'CodigoPostal')
            ->setCellValue('R1', 'Email_receptor')
            ->setCellValue('S1', 'Telefono_receptor');
            for($i=0;$i<count($datos);$i++){
            	$FILA=$i;
    			$FILA= $FILA+2;
               	$objPHPExcel->setActiveSheetIndex(0)
    				->setCellValue('A'.$FILA, $datos[$i]->Id_receptor)
    				->setCellValue('B'.$FILA, $datos[$i]->RFC_receptor)
    				->setCellValue('C'.$FILA, $datos[$i]->Regimen_fiscal)
    				->setCellValue('D'.$FILA, $datos[$i]->Tipo_perosna_receptor)
    				->setCellValue('E'.$FILA, $datos[$i]->Rason_social_receptor)
    				->setCellValue('F'.$FILA, $datos[$i]->Nombre)
    				->setCellValue('G'.$FILA, $datos[$i]->Ap_paterno)
    				->setCellValue('H'.$FILA, $datos[$i]->Ap_materno)
    				->setCellValue('I'.$FILA, $datos[$i]->Calle)
    				->setCellValue('J'.$FILA, $datos[$i]->NoExterior)
    				->setCellValue('K'.$FILA, $datos[$i]->NoInterior)
    				->setCellValue('L'.$FILA, $datos[$i]->Colonia)
    				->setCellValue('M'.$FILA, $datos[$i]->Localidad)
    				->setCellValue('N'.$FILA, $datos[$i]->Municipio)
    				->setCellValue('O'.$FILA, $datos[$i]->Estado)
    				->setCellValue('P'.$FILA, $datos[$i]->Pais)
    				->setCellValue('Q'.$FILA, $datos[$i]->CodigoPostal)
    				->setCellValue('R'.$FILA, $datos[$i]->Email_receptor)
    				->setCellValue('S'.$FILA, $datos[$i]->Telefono_receptor);
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