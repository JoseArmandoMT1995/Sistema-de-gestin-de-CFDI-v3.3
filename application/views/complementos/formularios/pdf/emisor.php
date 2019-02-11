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
        $this->Cell(0, 15, 'REGISTROS DE EMISORES', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
CONTIENE TODOS LOS EMISORES 
EOD;
// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->ln(0);
$pdf->setX(2);
$pdf->SetFont('','',5);
$pdf->Cell(10, 10, 'Id_emisor'                , 1, 0, 'A', 0, '', 0);
$pdf->Cell(15, 10, 'RFC'                        , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'RegimenFiscal'              , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'TipoPerosna'                , 1, 0, 'C', 0, '', 0);
$pdf->Cell(20, 10, 'RasonSocial'                , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Nombre'                     , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Ap_paterno'                 , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Ap_materno'                 , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Calle'                      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'NoExterior'                 , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'NoInterior'                 , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Colonia'                    , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Localidad'                  , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Municipio'                  , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Estado'                     , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Pais'                       , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'CodigoPostal'               , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Email'                      , 1, 0, 'C', 0, '', 0);
$pdf->Cell(10, 10, 'Telefono'                   , 1, 1, 'C', 0, '', 0);
for($i=0;$i<count($datos);$i++){
    $pdf->setX(2);
                $pdf->Cell(10, 10, $datos[$i]->Id_emisor           , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(15, 10, $datos[$i]->RFC_emisor          , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Regimen_fiscal        , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Tipo_perosna_emisor , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(20, 10, $datos[$i]->Rason_social_emisor , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Nombre                , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Ap_paterno            , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Ap_materno            , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Calle                 , 1, 0, 'C', 0, '', 0);         
                $pdf->Cell(10, 10, $datos[$i]->NoExterior            , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->RFC_emisor          , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->NoInterior            , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Colonia               , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Localidad             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Municipio             , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Pais                  , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->CodigoPostal          , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Email_emisor        , 1, 0, 'C', 0, '', 0);
                $pdf->Cell(10, 10, $datos[$i]->Telefono_emisor     , 1, 1, 'C', 0, '', 0);
    }
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('Todos los '.$cat.'/es.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
?>