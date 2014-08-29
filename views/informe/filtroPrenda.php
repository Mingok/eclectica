<?php
require_once 'classes/tela/tela.php';
$telaList = new tela ();
$telas = $telaList->telasDisponibles();
//require_once 'classes/estacion/estacion.php';
//$estacionList = new estacion ();
//$estaciones = $estacionList->estacionesDisponibles();
//require_once 'classes/color/color.php';
//$colorList = new color ();
//$colores = $colorList->coloresDisponibles();
//require_once 'classes/talle/talle.php';
//$talleList = new talle ();
//$talles = $talleList->tallesDisponibles();
//require_once 'classes/proveedor/proveedor.php';
//$proveedorList = new proveedor ();
//$proveedores = $proveedorList->proveedoresDisponibles();
//require_once 'classes/marca/marca.php';
//$marcaList = new marca ();
//$marcas = $marcaList->marcasDisponibles();
//require_once 'classes/estampado/estampado.php';
//$estampadoList = new estampado ();
//$estampados = $estampadoList->estampadosDisponibles();
//require_once 'classes/tipoVenta/tipoVenta.php';
//$tipoVentaList = new tipoVenta ();
//$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<form id="frm_filtro" method="post" action="">
   <ul>
        <li><label>Tela:</label>
            <select name="idTela">
                <option value="">--</option>
                <!-- Listar Paises -->
                <?php
                foreach ($telas as $tela) {
                    ?>
                    <option value="<?php echo $tela['idTela'] ?>">
                        <?php echo $tela['detalleTela'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>                	
        </li>
        <li>
            <button type="button" id="btnfiltrar">Filtrar</button>
        </li>                
        <li>
            <a href="javascript:;" id="btncancel">Todos</a>
        </li>
    </ul>
</form>