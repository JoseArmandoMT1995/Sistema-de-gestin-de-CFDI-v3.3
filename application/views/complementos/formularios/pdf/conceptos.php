<?php  
    require(APPPATH . 'third_party/tcpdf/tcpdf.php');
// create new PDF document
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'REGISTROS DE CONCEPTOS', 0, false, 'C', 0, '', 0, false, 'M', 'M');

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Moreno Tolentino Jose Armando');
$pdf->SetTitle($cat.'/s');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
CONTIENE TODOS LOS CONCEPTOS 

EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->ln(5);
$pdf->setX(10);
$pdf->SetFont('','',8);
$pdf->Cell(20, 10, 'ClaveProdServ'      , 1, 0, 'A', 0, '', 0);
$pdf->Cell(10, 10, 'NoID'   , 1, 0, 'C', 0, '', 0);
$pdf->Cell(16, 10, 'ClaveUnidad'        , 1, 0, 'C', 0, '', 0);
$pdf->Cell(35, 10, 'Descripcion'        , 1, 0, 'C', 0, '', 0);
$pdf->Cell(18, 10, 'ValorUnitario'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Moneda'             , 1, 0, 'C', 0, '', 0);
$pdf->Cell(20, 10, 'Impuesto Iva'       , 1, 0, 'C', 0, '', 0);
$pdf->Cell(20, 10, 'Impuesto Ieps'    , 1, 0, 'C', 0, '', 0);
$pdf->Cell(20, 10, 'Impuesto Isr'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(20, 10, 'Impuesto Iva ret'       , 1, 1, 'C', 0, '', 0);
for($i=0;$i<count($datos);$i++){
    $pdf->setX(10);
                $pdf->Cell(20, 10, $datos[$i]->ClaveProdServ             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->NoIdentificacion          , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(16, 10, $datos[$i]->ClaveUnidad               , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(35, 10, $datos[$i]->Descripcion               , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(18, 10, $datos[$i]->ValorUnitario             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Moneda                    , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(20, 10, $datos[$i]->Impuesto_trans_Iva              , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(20, 10, $datos[$i]->Impuesto_trans_Ieps           , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(20, 10, $datos[$i]->Impuesto_ret_Isr             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(20, 10, $datos[$i]->Impuesto_ret_iva              , 1, 1, 'C', 0, '', 0);
    }

// ---------------------------------------------------------


//Close and output PDF document
$pdf->Output('Todos los '.$cat.'/s.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+




    

?>