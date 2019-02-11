<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';


// Create new PHPExcel object
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
            ->setCellValue('A1', 'Version')
            ->setCellValue('B1', 'Serie')
            ->setCellValue('C1', 'Folio')
            ->setCellValue('D1', 'Fecha')
            ->setCellValue('E1', 'Sello')
            ->setCellValue('F1', 'FormaPago')
            ->setCellValue('G1', 'NoCertificado')
            ->setCellValue('H1', 'Certificado')
            ->setCellValue('I1', 'CondicionesDePago')
            ->setCellValue('J1', 'SubTotal')
            ->setCellValue('K1', 'Moneda')
            ->setCellValue('L1', 'Total')
            ->setCellValue('M1', 'TipoDeComprobante')
            ->setCellValue('N1', 'MetodoPago')
            ->setCellValue('O1', 'LugarExpedicion');


// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO')
            ->setCellValue('C2', 'DATO')
            ->setCellValue('D2', 'DATO')
            ->setCellValue('E2', 'DATO')
            ->setCellValue('F2', 'DATO')
            ->setCellValue('G2', 'DATO')
            ->setCellValue('H2', 'DATO')
            ->setCellValue('I2', 'DATO')
            ->setCellValue('J2', 'DATO')
            ->setCellValue('K2', 'DATO')
            ->setCellValue('L2', 'DATO')
            ->setCellValue('M2', 'DATO')
            ->setCellValue('N2', 'DATO')
            ->setCellValue('O2', 'DATO');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('CONCEPTO');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
/***************************************************************/
$objPHPExcel->createSheet()->setTitle('EMISOR');
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A1', 'RFC')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'RegimenFiscal');

$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO')
            ->setCellValue('C2', 'DATO');



$objPHPExcel->createSheet()->setTitle('RECEPTOR');
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A1', 'RFC')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'UsoCFDI');
$objPHPExcel->setActiveSheetIndex(2)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO')
            ->setCellValue('C2', 'DATO');
$objPHPExcel->createSheet()->setTitle('Conceptos');
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A1', 'ClaveProdServ')
            ->setCellValue('B1', 'NoIdentificacion')
            ->setCellValue('C1', 'Cantidad')
            ->setCellValue('D1', 'ClaveUnidad')
            ->setCellValue('E1', 'Unidad')
            ->setCellValue('F1', 'Descripcion')
            ->setCellValue('G1', 'ValorUnitario')
            ->setCellValue('H1', 'Importe');
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('I1', 'Base')
            ->setCellValue('J1', 'Impuesto')
            ->setCellValue('K1', 'TipoFactor')
            ->setCellValue('L1', 'TasaOCuota')
            ->setCellValue('M1', 'Importe');
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO')
            ->setCellValue('C2', 'DATO')
            ->setCellValue('D2', 'DATO')
            ->setCellValue('E2', 'DATO')
            ->setCellValue('F2', 'DATO')
            ->setCellValue('G2', 'DATO')
            ->setCellValue('H2', 'DATO');
$objPHPExcel->setActiveSheetIndex(3)
            ->setCellValue('I2', 'DATO')
            ->setCellValue('J2', 'DATO')
            ->setCellValue('K2', 'DATO')
            ->setCellValue('L2', 'DATO')
            ->setCellValue('M2', 'DATO');
$objPHPExcel->createSheet()->setTitle('Impuestos');
$objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('A1', 'TotalImpuestosRetenidos')
            ->setCellValue('B1', 'TotalImpuestosTrasladados');
$objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO');
$objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('C1', 'Base')
            ->setCellValue('D1', 'TipoFactor')
            ->setCellValue('E1', 'TasaOCuota')
            ->setCellValue('F1', 'Importe');
$objPHPExcel->setActiveSheetIndex(4)
            ->setCellValue('C2', 'DATO')
            ->setCellValue('D2', 'DATO')
            ->setCellValue('E2', 'DATO')
            ->setCellValue('F2', 'DATO');
$objPHPExcel->createSheet()->setTitle('TimbreFiscalDigital');
$objPHPExcel->setActiveSheetIndex(5)
            ->setCellValue('A1', 'Version')
            ->setCellValue('B1', 'UUID')
            ->setCellValue('C1', 'FechaTimbrado')
            ->setCellValue('D1', 'RfcProvCertif')
            ->setCellValue('E1', 'SelloCFD')
            ->setCellValue('F1', 'NoCertificadoSAT')
            ->setCellValue('G1', 'SelloSAT');
// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(5)
            ->setCellValue('A2', 'DATO')
            ->setCellValue('B2', 'DATO')
            ->setCellValue('C2', 'DATO')
            ->setCellValue('D2', 'DATO')
            ->setCellValue('E2', 'DATO')
            ->setCellValue('F2', 'DATO')
            ->setCellValue('G2', 'DATO');
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
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
