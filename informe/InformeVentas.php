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

$objManejoMySQL = new manejoMySQL ();
$sql = "SELECT * FROM (
                SELECT venta.*,
                        CONCAT(persona.apellidoPersona, ', ', persona.nombrePersona) as detalleCliente,
                        CONCAT(persona1.apellidoPersona, ', ', persona1.nombrePersona) as detalleVendedor
			FROM venta AS venta
			JOIN persona AS persona ON venta.idCliente = persona.idPersona
			JOIN persona AS persona1 ON venta.idVendedor = persona1.idPersona
			) tmp ";
$arrayFiltro = array();
$filtros = array();
require_once 'classes/persona/persona.php';
$personaList = new persona();
// valores recibidos por POST
if (isset($_REQUEST['selecEmpleado'])) {
    if ($_REQUEST['selecEmpleado'] !=''){
        $arrayFiltro[] = "idVendedor = " . $_REQUEST['selecEmpleado'];
        $persona  = $personaList->eligePersona($_REQUEST['selecEmpleado']);
        $filtros[] = "Vendedor: {$persona['apellidoPersona']}, {$persona['nombrePersona']}";
    }
}
    
if (isset($_REQUEST['selecCliente'])) {
    if ($_REQUEST['selecCliente'] !=''){
        $arrayFiltro[] = "idCliente = " . $_REQUEST['selecCliente'];
        $persona  = $personaList->eligePersona($_REQUEST['selecCliente']);
        $filtros[] = "Cliente: {$persona['apellidoPersona']}, {$persona['nombrePersona']}";
    }
}

if (isset($_REQUEST['fecDesde'])) {
    if ($_REQUEST['fecDesde'] !=''){
        $date = str_replace('/', '-', $_REQUEST['fecDesde']);
        $fecha = date('Y-m-d',strtotime($date)).' 00:00:00';
        $arrayFiltro[] = "fechaVenta >= '" . $fecha . "'";
        $filtros[] = "Fecha Desde: {$_REQUEST['fecDesde']}";

    }
}

if (isset($_REQUEST['fecHasta'])) {
    if ($_REQUEST['fecHasta'] !='') {
        $date = str_replace('/', '-', $_REQUEST['fecHasta']);
        $fecha = date('Y-m-d',strtotime($date)).' 23:59:59';
        $arrayFiltro[] = "fechaVenta <= '" . $fecha . "'";
        $filtros[] = "Fecha Hasta: {$_REQUEST['fecHasta']}";
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
}//$sql .= " LIMIT 20 ";
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
            $this->Cell(0, 5, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }

        // Colored table
        public function ColoredTable($header,$data,$columns) {
            // Colors, line width and bold font
            $this->SetFillColor(92, 184, 92);
            $this->SetTextColor(255);
            $this->SetDrawColor(128);
            $this->SetLineWidth(0.3);
            $this->SetFont('', 'B');
            $this->SetFontSize(8);
            // Header
            $w = array(30,52,15,15,15,53);
            $truncate = array(0,0,0,0,0);
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
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
                        $text = $row[$column_name];
                    }

                    $this->Cell($w[$key], 6, $text, 'LR', 0, $align, $fill);
                }
                $this->Ln();
                $fill=!$fill;
            }
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }

    function acortar($cadena, $limite, $corte=" ", $pad="...") {
        if(strlen($cadena) <= $limite)
            return $cadena;
        if(false !== ($breakpoint = strpos($cadena, $corte, $limite))) {
            if($breakpoint < strlen($cadena) - 1) {
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
    $pdf->SetTitle('Ventas Realizadas');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
    $image = $empresa['logoEmpresa'];
    if (!empty($filtros)) {
        $subtitle = 'Filtros: ' . implode(' - ', $filtros);
    } else {
        $subtitle = 'Filtros:';
    }
    $pdf->SetHeaderData($image, 40, 'Ventas Realizadas', $subtitle);

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
    $pdf->SetFont('helvetica', '', 12);

// add a page
    $pdf->AddPage();

// column titles
    $header = array(    'Fecha',
        'Cliente',
        'Vendido',
        'Entregado',
        'Costo',
        'Vendedor');

    $columns = array(   'fechaVenta',
        'detalleCliente',
        'precioVenta',
        'entregaCliente',
        'costoVenta',
        'detalleVendedor');
    $pdf->ColoredTable($header, $arrResultado, $columns);

// ---------------------------------------------------------

// close and output PDF document
    $pdf->Output('informe_existencias.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
} else {
    $date = date('d/m/Y');
    $filtros = implode(' - ', $filtros);
    $str_final = '
    <table class="table table-condensed" id="data">
        <tr><td colspan="6" style="text-align: center; font-weight:bold; font-size: 14px;">Ventas Realizadas ('.$date.')</td></tr>
        <tr><td colspan="6" style="text-align: center;"><label>Filtros: '. $filtros . '</td></tr>
        <thead style="font-weight: bolder; text-align: center;">
            <tr>
                <th bgcolor="#5cb85c" width="20%"><span title="fechaVenta">Fecha</span></th>
                <th bgcolor="#5cb85c" width="30%"><span title="detallePersona">Cliente</span></th>
                <th bgcolor="#5cb85c" width="10%"><span title="precioVenta">Vendido</span></th>
                <th bgcolor="#5cb85c" width="10%"><span title="entregaCliente">Entregado</span></th>
                <th bgcolor="#5cb85c" width="10%"><span title="costoVenta">Costo</span></th>
                <th bgcolor="#5cb85c" width="30%"><span title="detallePersona">Vendedor</span></th>
        </thead>
    ';
    $precio_venta = 0;
    $entrega = 0;
    $costo = 0;
    foreach ($arrResultado as $registro) {
        $str_final .= '<tr>';
        $str_final .= '<td>' . date('d/m/Y H:i',strtotime($registro['fechaVenta'])) . ' hs</td>';
        $str_final .= '<td>' . $registro['detalleCliente'] . '</td>';
        $str_final .= '<td>' . $registro['precioVenta'] . '</td>';
        $str_final .= '<td>' . $registro['entregaCliente'] . '</td>';
        $str_final .= '<td>' . $registro['costoVenta'] . '</td>';
        $str_final .= '<td>' . $registro['detalleVendedor'] . '</td>';
        $str_final .= '</tr>';
        $precio_venta += intval($registro['precioVenta']);
        $entrega += intval($registro['entregaCliente']);
        $costo += intval($registro['costoVenta']);
    }
    $str_final .= '<tr>';
    $str_final .= '<td colspan="2"><b>TOTAL</b></td>';
    $str_final .= '<td><b>' . $precio_venta . '</b></td>';
    $str_final .= '<td><b>' . $entrega . '</b></td>';
    $str_final .= '<td><b>' . $costo . '</b></td>';
    $str_final .= '</tr>';
    $str_final .= '</table>';

    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=ventas.xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    echo $str_final;
}