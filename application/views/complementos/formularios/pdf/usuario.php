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
        $this->Cell(0, 15, 'REGISTROS DE USUARIOS', 0, false, 'C', 0, '', 0, false, 'M', 'M');

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
$pdf->SetAuthor('Nicola Asuni');
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
CONTIENE TODOS LOS USUARIOS 

EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->ln(5);
$pdf->setX(15);
$pdf->Cell(20, 10, 'Usuclave'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(35, 10, 'Usufolio'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(35, 10, 'Usulogin'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(35, 10, 'Usunombre'      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(35, 10, 'Usunombre'      , 1, 1, 'C', 0, '', 0);

for($i=0;$i<count($datos);$i++){
    $pdf->setX(15);
                $pdf->Cell(20, 10, $datos[$i]->Usuclave             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(35, 10, $datos[$i]->Usufolio             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(35, 10, $datos[$i]->Usulogin             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(35, 10, $datos[$i]->Usunombre            , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(35, 10, $datos[$i]->Usuacceso            , 1, 1, 'C', 0, '', 0);
    }

// ---------------------------------------------------------


//Close and output PDF document
$pdf->Output('Todos los '.$cat.'/s.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+




    

?>