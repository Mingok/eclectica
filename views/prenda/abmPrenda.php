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
<div id="ver" style="display: none; padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Datos de la prenda
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="actions/prenda/guardarPrenda.php" class="formPrendas" id="formPrendas">
                        <table class="table">
                            <tr>
                                <td>
                                    <table style="width: 98%;">
                                        <tr>
                                            <td style="text-align: right;">
                                                <label for="codigoPrenda" id="lp">
                                                    Codigo&nbsp;
                                                </label>
                                                <input type="text" name="codigoPrenda" value="" style="width: 160px" class="form-control" readonly="readonly" />
                                                <input type="hidden" value="" name="idPrenda" />
                                                <input type="hidden" name="idEmpresaPrenda" value="1" />
                                            </td>
                                            <td style="text-align: right;" colspan="2">
                                                <b>
                                                    Nombre:&nbsp;
                                                </b>
                                                <input type="text" name="detallePrenda" id="detallePrenda" class="form-control" placeholder="ingrese" style="width: 450px" />
                                            </td>
                                            <td style="text-align: right;">
                                                <input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success" />
                                                &nbsp;
                                                <input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger"/>
                                            </td>
                                        </tr>
                                        <tr style="height: 40px;">
                                            <td style="text-align: right;">
                                                Marca:&nbsp;
                                                <select size="1" name="idMarcaPrenda" id="idMarcaPrenda" style="width: 165px" class="form-control">
                                                    <option value=''>- Elija Una -</option>
                                                    <?php
                                                    foreach ($marcas as $marca) {
                                                        if (isset($marca)) {
                                                            echo "<option value=" . $marca ["idMarca"] . ">" . $marca ["detalleMarca"] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td style="text-align: right;">
                                                Proveedor:&nbsp;
                                                <select size="1" title="Ingrese Proveedor" name="idProveedorPrenda" id="idProveedorPrenda" style="width: 165px" class="form-control">
                                                    <option value=''>- Elija Una - </option>
                                                    <?php
                                                    foreach ($proveedores as $proveedor) {
                                                        if (isset($proveedor)) {
                                                            echo "<option value=" . $proveedor ["idProveedor"] . ">" . $proveedor ["nombreProveedor"] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td style="text-align: right;">
                                                Temporada:&nbsp;
                                                <select size="1" title="Ingrese Temporada" style="width: 150px" name="idEstacionPrenda" id="idEstacionPrenda" class="form-control">
                                                    <option value=''>- Elija Una - </option>
                                                    <?php
                                                    foreach ($estaciones as $estacion) {
                                                        if (isset($estacion)) {
                                                            echo "<option value=" . $estacion ["idEstacion"] . ">" . $estacion ["detalleEstacion"] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td style="text-align: right;">
                                                Cantidad :
                                                <input type="number" title="Ingresar Cantidad" style="width: 60px;" name="cantidadPrenda" min="0" max="20" value="0" class="form-control" />
                                                <br />
                                            </td>
                                        </tr>
                                        <tr style="height: 35px;">
                                            <td style="text-align: right;">
                                                Tela:&nbsp;
                                                <select size="1" title="Ingrese Razon Social" name="idTelaPrenda" id="idTelaPrenda" style="width: 150px" class="form-control"/>
                                        <option value=''>- Elija Una - </option>    
                                        <?php
                                        foreach ($telas as $tela) {
                                            if (isset($telas)) {
                                                echo "<option value=" . $tela ["idTela"] . ">" . $tela ["detalleTela"] . "</option>";
                                            }
                                        }
                                        ?>
                                        </select>
                                </td>
                                <td style="text-align: right;">
                                    Color:&nbsp;
                                    <select size="1" title="Ingrese Razon Social" name="idColorPrenda" id="idColorPrenda" style="width: 150px" class="form-control" />
                            <option value=''>- Elija Una - </option>
                            <?php
                            foreach ($colores as $color) {
                                if (isset($color)) {
                                    echo "<option value=" . $color ["idColor"] . ">" . $color ["detalleColor"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </td>
                            <td style="text-align: right;">
                                Talle:&nbsp;
                                <select size="1" title="Ingrese Razon Social" name="idTallePrenda" id="idTallePrenda" style="width: 150px" class="form-control"/>
                            <option value=''>- Elija Una - </option>
                            <?php
                            foreach ($talles as $talle) {
                                if (isset($talles)) {
                                    echo "<option value=" . $talle ["idTalle"] . ">" . $talle ["detalleTalle"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </td>
                            <td style="text-align: right;">
                                Estampado:&nbsp;
                                <select size="1" name="idEstampadoPrenda" id="idEstampadoPrenda" style="width: 140px" class="form-control"/>
                            <option value=''>- Elija Una -   </option>
                            <?php
                            foreach ($estampados as $estampado) {
                                if (isset($estampado)) {
                                    echo "<option value=" . $estampado ["idEstampado"] . ">" . $estampado ["detalleEstampado"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </td>
                            </tr>
                        </table>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr style="height: 40px;padding-bottom: 10px;padding-top: 10px; ">
                                        <td colspan="2" style="min-width: 200px;">
                                            <h4 style="text-align: center;">
                                                Precios
                                            </h4>   
                                        </td>
                                        <td style="min-width: 200px;">
                                            &nbsp;
                                        </td>
                                        <td style="background-color: #1E90FF;min-width: 200px; text-align: right; padding-right: 10px">
                                            <?php echo $tipoVentas["0"]["detalleTipoVenta"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["0"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["0"]["idTipoVenta"]; ?>"/>
                                        </td>
                                        <td style="min-width: 200px; text-align: right;">
                                            <?php echo $tipoVentas["1"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["1"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["1"]["idTipoVenta"]; ?>"/>
                                        </td>
                                        <td style="min-width: 200px; text-align: right;" >
                                            <input type="button" value="Calcular" style="width: 100px;" class="btn btn-sm btn-primary" id="mostrarPrecios" />
                                        </td>
                                    </tr>
                                    <tr style="min-height: 100px; padding-bottom: 10px;padding-top: 10px;" id="montoto">
                                        <td colspan="2" style="text-align: right;">
                                            <?php echo $tipoVentas["2"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["2"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["2"]["idTipoVenta"]; ?>"/>
                                            <br><br>
                                            <?php echo $tipoVentas["3"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["3"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["3"]["idTipoVenta"]; ?>"/>
                                            <br><br>
                                            <?php echo $tipoVentas["4"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["4"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["4"]["idTipoVenta"]; ?>"/>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <?php echo $tipoVentas["5"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["5"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["5"]["idTipoVenta"]; ?>"/>
                                            <br>
                                            <br>
                                            <?php echo $tipoVentas["6"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["6"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["6"]["idTipoVenta"]; ?>"/>
                                            <br>
                                            <br>
                                            <?php echo $tipoVentas["7"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["7"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["7"]["idTipoVenta"]; ?>"/>
                                        </td>
                                        <td colspan="2" style="text-align: right;">
                                            <?php echo $tipoVentas["8"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["8"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["8"]["idTipoVenta"]; ?>"/>
                                            <br>
                                            <br>
                                            <?php echo $tipoVentas["9"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["9"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["9"]["idTipoVenta"]; ?>"/>
                                            <br>
                                            <br>
                                            <?php echo $tipoVentas["10"]["detalleTipoVenta"]; ?>
                                            <input type="text"  style="width: 120px" value="0" class="form-control"
                                                   id="idTipoVenta<?php echo $tipoVentas["10"]["idTipoVenta"]; ?>" 
                                                   name="tipoVenta<?php echo $tipoVentas["10"]["idTipoVenta"]; ?>"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>