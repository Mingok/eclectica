<?php
require_once 'classes/tela/tela.php';
$telaList = new tela ();
$telas = $telaList->telasDisponibles();
require_once 'classes/estacion/estacion.php';
$estacionList = new estacion ();
$estaciones = $estacionList->estacionesDisponibles();
require_once 'classes/color/color.php';
$colorList = new color ();
$colores = $colorList->coloresDisponibles();
require_once 'classes/talle/talle.php';
$talleList = new talle ();
$talles = $talleList->tallesDisponibles();
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles();
require_once 'classes/marca/marca.php';
$marcaList = new marca ();
$marcas = $marcaList->marcasDisponibles();
require_once 'classes/estampado/estampado.php';
$estampadoList = new estampado ();
$estampados = $estampadoList->estampadosDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<h1>
    Existencias
</h1>
<form id="frm_filtro_Prendas" method="post" action="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <table style="width: 98%;">
                        <tr style="height: 40px;">
                            <td style="text-align: right;" colspan="2">
                                <b>
                                    Nombre/Codigo:&nbsp;
                                </b>
                                <input type="text" name="detallePrenda" id="detallePrenda" class="form-control" placeholder="ingrese" style="width: 400px;" />
                            </td>
                            <td style="text-align: right; width: 25%">
                                <label>Marca:</label>
                                <select name="idMarca" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($marcas as $marca) {
                                        ?>
                                        <option value="<?php echo $marca['idMarca'] ?>">
                                            <?php echo $marca['detalleMarca'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>  
                            </td>
                            <td style="text-align: center;width: 25%" rowspan="3">
                                <button id="btnFiltrar" type="button" style="width: 110px;" class="btn btn-sm btn-success" />Filtrar</button>
                                <button id="btnCancel" style="width: 110px;" class="btn btn-sm btn-danger"/> Todos</button>
                                <br />
                                <br />
                                <button type="button" id="btnPdfExistencias" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Pdf</button>
                                <button type="button" id="btnXlsExistencias" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Excel</button>
                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Proveedor:</label>
                                <select name="idProveedor" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($proveedores as $proveedor) {
                                        ?>
                                        <option value="<?php echo $proveedor['idProveedor'] ?>">
                                            <?php echo $proveedor['nombreProveedor'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Temporada:</label>
                                <select name="idEstacion" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($estaciones as $estacion) {
                                        ?>
                                        <option value="<?php echo $estacion['idEstacion'] ?>">
                                            <?php echo $estacion['detalleEstacion'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Estampado:</label>
                                <select name="idEstampado" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($estampados as $estampado) {
                                        ?>
                                        <option value="<?php echo $estampado['idEstampado'] ?>">
                                            <?php echo $estampado['detalleEstampado'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Tela:</label>
                                <select name="idTela" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

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
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Color:</label>
                                <select name="idColor" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($colores as $color) {
                                        ?>
                                        <option value="<?php echo $color['idColor'] ?>">
                                            <?php echo $color['detalleColor'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Talle:</label>
                                <select name="idTalle" style="width: 190px;" class="form-control">
                                    <option value="">--</option>

                                    <?php
                                    foreach ($talles as $talle) {
                                        ?>
                                        <option value="<?php echo $talle['idTalle'] ?>">
                                            <?php echo $talle['detalleTalle'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>

                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>  
</form>