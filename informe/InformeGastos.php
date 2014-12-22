<?php
// Include the main TCPDF library (search for installation path).
$ds = DIRECTORY_SEPARATOR;
require_once "base{$ds}manejoMySQL.php";
require_once 'classes/empresa/empresa.php';
require_once 'classes/proveedor/proveedor.php';
require_once 'classes/formaPago/formaPago.php';
require_once 'classes/gasto/gasto.php';
$proveddorList= new proveedor();
$empresaList = new empresa();
$empresas = $empresaList->datosEmpresa();
$empresa = null;
$fpagoList= new formaPago();
$filtros = array();
if (is_array($empresas)) {
    $empresa = array_shift($empresas);
}
$tipo = $_REQUEST['type'];
$gastoList = new gasto();
$gastos = $gastoList->gastoDisponibles();
$gasto = null;
if (is_array($gastos)) {
    $gasto = array_shift($gastos);
}
$objManejoMySQL = new manejoMySQL ();
$sql = "SELECT gasto.*, proveedor.nombreProveedor, empresa.nombreEmpresa, formaPago.detalleFormaPago FROM gasto AS gasto
            LEFT JOIN proveedor AS proveedor ON gasto.idProveedorGasto = proveedor.idProveedor
            LEFT JOIN empresa AS empresa ON gasto.idEmpresaGasto = empresa.idEmpresa
            LEFT JOIN formaPago AS formaPago ON gasto.idFormaPagoGasto = formaPago.idFormaPago";
$arrayFiltro = array();
// valores recibidos por POST

if (isset($_REQUEST['detalleGasto'])) {
    if ($_REQUEST['detalleGasto'] != '') {
        $arrayFiltro[] = " detalleGasto LIKE '%" . $_REQUEST['detalleGasto'] . "%'";
        $filtros[] = "Concepto:". $_REQUEST['detalleGasto'];
    }
}
if (isset($_REQUEST['idFormaPagoGasto'])) {
    if ($_REQUEST['idFormaPagoGasto'] != '') {
        $arrayFiltro[] = "idFormaPagoGasto = " . $_REQUEST['idFormaPagoGasto'];
        $fpago= $fpagoList-> eligeFormaDePago($_REQUEST['idFormaPagoGasto']);
        $filtros[] = "F.Pago: {$fpago["detalleFormaPago"]}";
     
    }
}
if (isset($_REQUEST['idProveedorGasto'])) {
    if ($_REQUEST['idProveedorGasto'] != '') {
        $arrayFiltro[] = "idProveedorGasto = " . $_REQUEST['idProveedorGasto'];
        $prov= $proveddorList-> eligeProveedor($_REQUEST['idProveedorGasto']);
        $filtros[] = "Prov.: {$prov["nombreProveedor"]}";
    }
}

if (isset($_REQUEST['importeGasto'])) {
    if ($_REQUEST['importeGasto'] != '') {
        $arrayFiltro[] = "importeGasto = " . $_REQUEST['importeGasto'];
    }
}
if (isset($_REQUEST['fecDesde'])) {
    if ($_REQUEST['fecDesde'] != '') {
        $date = str_replace('/', '-', $_REQUEST['fecDesde']);
        $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
        $arrayFiltro[] = "fechaGasto >= '" . $fecha . "'";
        $filtros[] = "Fecha Desde: {$_REQUEST['fecDesde']}";
    }
}
if (isset($_REQUEST['fecHasta'])) {
    if ($_REQUEST['fecHasta'] != '') {
        $date = str_replace('/', '-', $_REQUEST['fecHasta']);
        $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
        $arrayFiltro[] = "fechaGasto <= '" . $fecha . "'";
        $filtros[] .= "Fecha Hasta: {$_REQUEST['fecHasta']}";
    }
}
// Vericamos si hay algun filtro
$auxArray = implode(' AND ', $arrayFiltro);
if (count($arrayFiltro) != 0) {
    $sql .= " WHERE ";
    $sql.=$auxArray;
}
// Ordenar por
$vorder = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : '';
if ($vorder != '') {
    $sql .= " ORDER BY " . $vorder;
}
//    echo "<pre>";
//    var_dump($sql);
//    echo "</pre>";
//    exit;

$objManejoMySQL->consultar($sql, $arrResultado);

if ($tipo == 'pdf') {
    define('K_PATH_IMAGES', "http://localhost/eclectica/imagenes/logos/");
    require_once "js{$ds}tcpdf{$ds}tcpdf.php";

// extend TCPF with custom functions
    class MYPDF extends TCPDF {

// Page footer
        public function Footer() {
// Position at 15 mm from bottom
            $this->SetY(-15);
// Set font
            $this->SetFont('helvetica', 'I', 8);
// Page number
            $this->Cell(20, 5, 'Emitido: ' . date('d/m/Y') . '        ', 0, false, 'R', 0, '', 0, false, 'T', 'M');
            $this->Cell(0, 5, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
// Colored table
        public function ColoredTable($header, $data, $columns) {
// Colors, line width and bold font
            $this->SetFillColor(92, 184, 92);
            $this->SetTextColor(255);
            $this->SetDrawColor(128);
            $this->SetLineWidth(0.3);
            $this->SetFont('', 'B');
            $this->SetFontSize(8);
// Header
            $w = array(20, 50, 30, 60, 15);
            $truncate = array(0, 27, 10, 25, 0);
            $num_headers = count($header);
            for ($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
            }
            $this->Ln();
// Color and font restoration
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->SetFont('');
            $this->SetFontSize(8);
// Data
            $fill = 0;
            foreach($data as $row) {
                foreach ($columns as $key=>$column_name) {
                    $align = 'L';
                    if (is_numeric($row[$column_name])) {
                        $align = 'R';
                        $text = $row[$column_name];
                    } else {
                        $text = acortar($row[$column_name],$truncate[$key]);
                    }

                    $this->Cell($w[$key], 6, $text, 'LR', 0, $align, $fill);
                }
                $this->Ln();
                $fill = !$fill;
            }
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }
    function acortar($cadena, $limite, $corte = " ", $pad = "...") {
        if (strlen($cadena) <= $limite)
            return $cadena;
        if (false !== ($breakpoint = strpos($cadena, $corte, $limite))) {
            if ($breakpoint < strlen($cadena) - 1) {
                $cadena = substr($cadena, 0, $breakpoint) . $pad;
            }
        }
        return $cadena;
    }

// create new PDF document
    $pdf = new MYPDF('Z', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Eclectica');
    $pdf->SetTitle('Gastos y Costos');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
    $image = $empresa['logoEmpresa'];
   
    if (!empty($filtros)) {
        $subtitle = 'Filtros: ' . implode(' - ', $filtros);
    } else {
        $subtitle = '';
    }
  
    $pdf->SetHeaderData($image, 40, 'Gastos y Costos', $subtitle);

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
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// ---------------------------------------------------------
// set font
    $pdf->SetFont('helvetica', '', 12);

// add a page
    $pdf->AddPage();

// column titles
    $header = array('Fecha',
        'Proveedor',
        'F. Pago',
        'Concepto',
        'Importe');

    $columns = array('fechaGasto',
        'nombreProveedor',
        'detalleFormaPago',
        'detalleGasto',
        'importeGasto');
    $pdf->ColoredTable($header, $arrResultado, $columns);

// ---------------------------------------------------------
// close and output PDF document
    $pdf->Output('Gastos y Costos.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
} else {
    $date = date('d/m/Y');
   //$filtros = implode(' - ', $filtros);
    $str_final = '
    <table class="table table-condensed" id="data">
        <tr><td colspan="5" style="text-align: center; font-weight:bold; font-size: 14px;">Ventas Realizadas (' . $date . ')</td></tr>
        <tr><td colspan="5" style="text-align: center;"><label>Filtros: ' . $filtros . '</td></tr>
        <thead style="font-weight: bolder; text-align: center;">
            <tr>
                <th bgcolor="#5cb85c" width="9%"><span title="fechaGasto">Fecha</span></th>
                <th bgcolor="#5cb85c" width="22%"><span title="nombreProveedor">Proveedor</span></th>
                <th bgcolor="#5cb85c" width="20%"><span title="detalleFormaPago">F. Pago</span></th>
                <th bgcolor="#5cb85c" width="40%"><span title="detalleGasto">ConCepto</span></th>
                <th bgcolor="#5cb85c" width="9%"><span title="importeGasto">Importe</span></th>
        </thead>
    ';
    $precio_gasto = 0;



    foreach ($arrResultado as $registro) {
        $str_final .= '<tr>';
        $str_final .= '<td>' . date('d/m/Y', strtotime($registro['fechaGasto'])) . '</td>';
        $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
        $str_final .= '<td>' . $registro['detalleFormaPago'] . '</td>';
        $str_final .= '<td>' . $registro['detalleGasto'] . '</td>';
        $str_final .= '<td style="text-align:right">' . $registro['importeGasto'] . '</td>';
        $str_final .= '</tr>';
        $precio_gasto += intval($registro['importeGasto']);
    }
    $str_final .= '<tr>';
    $str_final .= '<td colspan="4" style="text-align:right"><b>TOTAL</b></td>';
    $str_final .= '<td style="text-align:right"><b>' . $precio_gasto . '</b></td>';
    $str_final .= '<td></td>';
    $str_final .= '<td></td>';
    $str_final .= '</tr>';

    $str_final .= '</table>';

    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Gastos y Costos.xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    echo $str_final;
}