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
$sql = "SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado,
                        tela.detalleTela, talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca
			FROM prenda AS prenda
			LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
			LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
			LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
			LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
			LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
			LEFT JOIN estacion AS estacion ON prenda.idEstacionPrenda = estacion.idEstacion
			LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca
			";
$arrayFiltro = array();

// valores recibidos por POST
$filtros = array();
if ($_REQUEST['detallePrenda'] != '') {
    $arrayFiltro[] = " CONCAT(detallePrenda,' ', codigoPrenda) LIKE '%" . $_REQUEST['detallePrenda'] . "%'";
    $filtros[] = "Nombre o codigo: {$_REQUEST['detallePrenda']}";
}
if ($_REQUEST['idMarca'] != '') {
    $arrayFiltro[] = " prenda.idMarcaPrenda = " . $_REQUEST['idMarca'];
    require_once 'classes/marca/marca.php';
    $marcaList = new marca ();
    $marca = $marcaList->eligeMarca($_REQUEST['idMarca']);
    $filtros[] = "Marca: {$marca['detalleMarca']}";
}
if ($_REQUEST['idProveedor'] != '') {
    $arrayFiltro[] = " proveedor.idProveedor = " . $_REQUEST['idProveedor'];
    require_once 'classes/proveedor/proveedor.php';
    $proveedorList = new proveedor ();
    $proveedor = $proveedorList->eligeProveedor($_REQUEST['idProveedor']);
    $filtros[] = "Proveedor: {$proveedor['nombreProveedor']}";
}
if ($_REQUEST['idEstacion'] != '') {
    $arrayFiltro[] = " prenda.idEstacionPrenda = " . $_REQUEST['idEstacion'];
    require_once 'classes/estacion/estacion.php';
    $estacionList = new estacion ();
    $estacion = $estacionList->eligeEstacion($_REQUEST['idEstacion']);
    $filtros[] = "Temporada: {$estacion['detalleEstacion']}";
}
if ($_REQUEST['idEstampado'] != '') {
    $arrayFiltro[] = " prenda.idEstampadoPrenda = " . $_REQUEST['idEstampado'];
    require_once 'classes/estampado/estampado.php';
    $estampadoList = new estampado ();
    $estampado = $estampadoList->eligeEstampado($_REQUEST['idEstampado']);
    $filtros[] = "Estampado: {$estampado['detalleEstampado']}";
}
if ($_REQUEST['idTela'] != '') {
    $arrayFiltro[] = " prenda.idTelaPrenda = " . $_REQUEST['idTela'];
    require_once 'classes/tela/tela.php';
    $telaList = new tela ();
    $tela = $telaList->eligeTela($_REQUEST['idTela']);
    $filtros[] = "Tela: {$tela['detalleTela']}";
}
if ($_REQUEST['idColor'] != '') {
    $arrayFiltro[] = " prenda.idColorPrenda = " . $_REQUEST['idColor'];
    require_once 'classes/color/color.php';
    $colorList = new color ();
    $color = $colorList->eligeColor($_REQUEST['idColor']);
    $filtros[] = "Color: {$color['detalleColor']}";
}
if ($_REQUEST['idTalle'] != '') {
    $arrayFiltro[] = " prenda.idTallePrenda = " . $_REQUEST['idTalle'];
    require_once 'classes/talle/talle.php';
    $talleList = new talle ();
    $talle = $talleList->eligeTalle($_REQUEST['idTalle']);
    $filtros[] = "Talle: {$talle['detalleTalle']}";
}
//
// Vericamos si hay algun filtro

$auxArray = implode(' AND ', $arrayFiltro);
if (count($arrayFiltro) != 0) {
    $sql .= "WHERE";
    $sql.=$auxArray;
}


// Ordenar por
$vorder = isset($_REQUEST['orderby']) ? $_REQUEST['orderby'] : '';

if ($vorder != '') {
    $sql .= " ORDER BY " . $vorder;
}
//$sql .= " LIMIT 20 ";
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
            $w = array(22,15, 45, 8, 36, 25, 35, 18, 23, 30, 8);
            $truncate = array(0,0, 15, 0, 15, 12, 10, 10, 10, 10, 8);
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
                        $text = acortar($row[$column_name], $truncate[$key]);
                    }

                    $this->Cell($w[$key], 6, $text, 'LR', 0, $align, $fill);
                }
                /* $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
                  $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
                  $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
                  $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill); */
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
    $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Eclectica');
    $pdf->SetTitle('Existencias');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
    $image = $empresa['logoEmpresa'];
    if (!empty($filtros)) {
        $subtitle = 'Filtros: ' . implode(' - ', $filtros);
    } else {
        $subtitle = 'Filtros:';
    }
    $pdf->SetHeaderData($image, 40, 'Existencias', $subtitle);

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
    $header = array('Cod','Fecha',
        'Nombre',
        'Talle',
        'Color',
        'Estampado',
        'Tela',
        'Temporada',
        'Marca',
        'Proveedor',
        'Cant');

    $columns = array('codigoPrenda','fechaPrenda',
        'detallePrenda',
        'detalleTalle',
        'detalleColor',
        'detalleEstampado',
        'detalleTela',
        'detalleEstacion',
        'detalleMarca',
        'nombreProveedor',
        'cantidadPrenda');
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
        <tr><td colspan="10" style="text-align: center; font-weight:bold; font-size: 14px;">Existencias(' . $date . ')</td></tr>
        <tr><td colspan="10" style="text-align: center;"><label>Filtros: ' . $filtros . '</td></tr>
        <thead style="font-weight: bolder; text-align: center;">
            <tr>
                <th width="9%"><span title="prenda.codigoPrenda">Cod</span></th>
                <th width="9%"><span title="prenda.fechaPrenda">Fecha</span></th>
                <th width="23%"><span title="prenda.detallePrenda">Nombre</span></th>
                <th width="4%"><span title="talle.detalleTalle">Talle</span></th>
                <th width="9%"><span title="color.detalleColor">Color</span></th>
                <th width="9%"><span title="estampado.detalleEstampado">Estampado</span></th>
                <th width="9%"><span title="tela.detalleTela">Tela</span></th>
                <th width="7%"><span title="estacion.detalleEstacion">Temporada</span></th>
                <th width="9%"><span title="marca.detalleMarca">Marca</span></th>
                <th width="9%"><span title="proveedor.nombreProveedor">Proveedor</span></th>
                <th width="3%"><span title="prenda.cantidadPrenda">C.</span></th>
        </thead>
    ';
    foreach ($arrResultado as $registro) {
        $str_final .= '<tr>';
        $str_final .= '<td>' . $registro['codigoPrenda'] . '</td>';
        $str_final .= '<td>' . date('d-m-Y', strtotime($registro['fechaPrenda'])) . '</td>';
        $str_final .= '<td>' . $registro['detallePrenda'] . '</td>';
        $str_final .= '<td>' . $registro['detalleTalle'] . '</td>';
        $str_final .= '<td>' . $registro['detalleColor'] . '</td>';
        $str_final .= '<td>' . $registro['detalleEstampado'] . '</td>';
        $str_final .= '<td>' . $registro['detalleTela'] . '</td>';
        $str_final .= '<td>' . $registro['detalleEstacion'] . '</td>';
        $str_final .= '<td>' . $registro['detalleMarca'] . '</td>';
        $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
        $str_final .= '<td>' . $registro['cantidadPrenda'] . '</td>';
        $str_final .= '</tr>';
    }
    $str_final .= '</table>';

    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=existencias.xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    echo $str_final;
}
