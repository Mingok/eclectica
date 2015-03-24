<?php

// Include the main TCPDF library (search for installation path).
$ds = DIRECTORY_SEPARATOR;

require_once "base{$ds}manejoMySQL.php";
require_once 'classes/empresa/empresa.php';
$tipo = $_REQUEST['type'];
$empresaList = new empresa();
$empresas = $empresaList->datosEmpresa();
$empresa = null;
if (is_array($empresas)) {
    $empresa = array_shift($empresas);
}
require_once "base{$ds}manejoMySQL.php";
$objManejoMySQL = new manejoMySQL ();
$sql = "SELECT proveedor.nombreProveedor, formaPago.detalleFormaPago, sum(gasto.importeGasto) as importeGasto FROM gasto AS gasto
            JOIN proveedor AS proveedor ON gasto.idProveedorGasto = proveedor.idProveedor
            JOIN formaPago AS formaPago ON gasto.idFormaPagoGasto = formaPago.idFormaPago ";
$sql1 = "SELECT vr.`idTipoVenta`, `detalleTipoVenta`, sum(vr.`precioVendido`) as precioVendido 
            FROM `venta_renglon` vr JOIN venta v ON v.idVenta = vr.idVenta 
            join tipoventa tv on tv.idTipoVenta = vr.idTipoVenta WHERE vr.`estado` = 'V'";
$arrayFiltro = array();
$arrayFiltro1 = array();
$filtros = array();

$hoy = date('d-m-Y');
$fecha30 = strtotime('-30 day', strtotime($hoy));
$fecha30 = date('Ymd', $fecha30);

if (isset($_REQUEST['fecDesde'])) {
    if ($_REQUEST['fecDesde'] != '') {
        $date = str_replace('/', '-', $_REQUEST['fecDesde']);
        $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
        $arrayFiltro[] = "gasto.fechaGasto >= '" . $fecha . "'";
        $arrayFiltro1[] = "v.fechaVenta >= '" . $fecha . "'";
        $filtros[] = "Fecha Desde: {$_REQUEST['fecDesde']}";
    } else {
        $date = str_replace('/', '-', $fecha30);
        $fecha = date('Y-m-d', strtotime($fecha30)) . ' 00:00:00';
        $arrayFiltro[] = "gasto.fechaGasto >= '" . $fecha . "'";
        $arrayFiltro1[] = "v.fechaVenta >= '" . $fecha . "'";
        $filtros[] = "Fecha Desde: {$_REQUEST['fecDesde']}";
    }
}

if (isset($_REQUEST['fecHasta'])) {
    if ($_REQUEST['fecHasta'] != '') {
        $fecha='';
        $date = str_replace('/', '-', $_REQUEST['fecHasta']);
        $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
        $arrayFiltro[] = "gasto.fechaGasto <= '" . $fecha . "'";
         $arrayFiltro1[] = "v.fechaVenta <= '" . $fecha . "'";  
        $filtros[] = "Fecha Hasta: {$_REQUEST['fecHasta']}";
    }
}
// Vericamos si hay algun filtro
$auxArray = implode(' AND ', $arrayFiltro);
if (count($arrayFiltro) != 0) {
    $sql .= " and ";
    $sql.=$auxArray;
}
$auxArray1 = implode(' AND ', $arrayFiltro1);
if (count($arrayFiltro1) != 0) {
    $sql1.= " and ";
    $sql1.=$auxArray1;
}


// Ordenar por
$vorder = isset($_POST['orderby']) ? $_POST['orderby'] : '';
$sql.= " group by proveedor.idProveedor,formaPago.idFormaPago";
$sql1.= " group by `idTipoVenta`";
if ($vorder != '') {
    $sql .= " ORDER BY " . $vorder;
    $sql1 .= " ORDER BY " . $vorder;
}


$objManejoMySQL->consultar($sql, $arrResultado);
$objManejoMySQL->consultar($sql1, $arrResultado1);

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
        public function ColoredTable1($header, $data, $columns) {
            // Colors, line width and bold font
            $this->SetFillColor(92, 184, 92);
            $this->SetTextColor(255);
            $this->SetDrawColor(128);
            $this->SetLineWidth(0.3);
            $this->SetFont('', 'B');
            $this->SetFontSize(8);
            // Header
            $w = array(160, 20);
            $truncate = array(10, 0);
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
            foreach ($data as $row) {
                foreach ($columns as $key => $column_name) {
                    $align = 'L';
                    if (is_numeric($row[$column_name])) {
                        $align = 'R';
                        $text = $row[$column_name];
                    } else {
                        $text = $row[$column_name];
                    }

                    $this->Cell($w[$key], 6, $text, 'LR', 0, $align, $fill);
                
                    
                
                    }
                
                $this->Ln();
                $fill = !$fill;
            }
           
            $this->Cell(array_sum($w), 0, '', 'T');
        }

        public function ColoredTable($header, $data, $columns) {
            // Colors, line width and bold font
            $this->SetFillColor(92, 184, 92);
            $this->SetTextColor(255);
            $this->SetDrawColor(128);
            $this->SetLineWidth(0.3);
            $this->SetFont('', 'B');
            $this->SetFontSize(8);
            // Header
            $w = array(60, 60, 60);
            $truncate = array(0, 0, 0);
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
            foreach ($data as $row) {
                foreach ($columns as $key => $column_name) {
                    $align = 'L';
                    if (is_numeric($row[$column_name])) {
                        $align = 'R';
                        $text = $row[$column_name];
                    } else {
                        $text = $row[$column_name];
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
    $pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Eclectica');
    $pdf->SetTitle('Resumen Ventas - Gastos - Costos ');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
    $image = $empresa['logoEmpresa'];
    if (!empty($filtros)) {
        $subtitle = 'Filtros: ' . implode(' - ', $filtros);
    } else {
        $subtitle = 'Filtros:';
    }
    $pdf->SetHeaderData($image, 40, 'Resumen Ventas - Gastos - Costos ', $subtitle);

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
    $header = array('nombre Proveedor',
        'Forma de Pago',
        'Total');

    $columns = array('nombreProveedor',
        'detalleFormaPago',
        'importeGasto');

    $header1 = array('Forma de pago', 'Total');
    $columns1 = array('detalleTipoVenta', 'precioVendido');
    $pdf1 = '';
    $pdf2 = '';
        $pdfseparador = '<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        
        text-align:center;
    }
   div{height: 10px;}
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style><div><H1 class="title" >Proveedores - Costos - Gastos - Insumos</H1></div>';
    $pdf->writeHTML($pdfseparador, true, false, false, false, '');
    $pdf1.=$pdf->ColoredTable($header, $arrResultado, $columns);
    $pdf->writeHTML($pdf1, true, false, false, false, '');
    $pdfseparador = '<style>
    h1 {
        color: navy;
        font-family: times;
        font-size: 24pt;
        
        text-align:center;
    }
    
    div{height: 20px;}
    .lowercase {
        text-transform: lowercase;
    }
    .uppercase {
        text-transform: uppercase;
    }
    .capitalize {
        text-transform: capitalize;
    }
</style> <div><H1 class="title" >Ventas por Formas de pago</H1></div>';
    $pdf->writeHTML($pdfseparador, true, false, false, false, '');
    
    $pdf2.=$pdf->ColoredTable1($header1, $arrResultado1, $columns1);
    $pdf->writeHTML($pdf2, true, false, false, false, '');


// ---------------------------------------------------------
// close and output PDF document
    $pdf->Output('informe_Resumen.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
} else {
    $date = date('d/m/Y');
    $filtros = implode(' - ', $filtros);
    $str_final = '
    <table class="table table-condensed" id="data">
        <tr><td colspan="3" style="text-align: center; font-weight:bold; font-size: 14px;">Resumen Ventas - Gastos - Costos (' . $date . ')</td></tr>
        <tr><td colspan="3" style="text-align: center;"><label>Filtros: ' . $filtros . '</td></tr>
        <thead style="font-weight: bolder; text-align: center;">
            
                <th ><span title="nombreProveedor">Proveedor</span></th>
                <th ><span title="detalleFormaPago">Forma De pago</span></th>
                <th ><span title="importeGasto">Total</span></th>
        </thead>
    ';
    foreach ($arrResultado as $registro) {
        $str_final .= '<tr>';
        $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
        $str_final .= '<td>' . $registro['detalleFormaPago'] . '</td>';
        $str_final .= '<td>' . $registro['importeGasto'] . '</td>';
        $str_final .= '</tr>';
    }
    $str_final .= '</table>';

    $str_final1 = '
    <table class="table table-condensed" id="data">
        <tr><td colspan="3" style="text-align: center; font-weight:bold; font-size: 14px;">Resumen Ventas - Gastos - Costos (' . $date . ')</td></tr>
        <tr><td colspan="3" style="text-align: center;"><label>Filtros: ' . $filtros . '</td></tr>
        <thead style="font-weight: bolder; text-align: center;">
                            
                <th ><span title="detalleFormaPago">Forma De pago</span></th>
                <th ><span title="precioVendido">Total</span></th>
        </thead>
    ';
    foreach ($arrResultado1 as $registro) {
        $str_final1 .= '<tr>';
        $str_final1 .= '<td>' . $registro['detalleTipoVenta'] . '</td>';
        $str_final1 .= '<td>' . $registro['precioVendido'] . '</td>';

        $str_final1 .= '</tr>';
    }
    $str_final1 .= '</table>';
    header("Content-Type:application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Resumen.xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    echo $str_final;
    echo $str_final1;
}