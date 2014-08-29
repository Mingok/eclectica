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
<form action="#" >
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
                                <input type="text" name="detallePrenda" id="detallePrenda" class="form-control" placeholder="ingrese" style="width: 450px;" />
                            </td>
                            <td style="text-align: right; width: 25%">
                                Marca:&nbsp;
                                <select  name="idMarcaPrenda" id="idMarcaPrenda" style="width: 190px;" class="form-control">
                                    <option>
                                    </option>
                                    <?php
                                    foreach ($marcas as $marca) {
                                        if (isset($marca)) {
                                            echo "<option value=" . $marca ["idMarca"] . ">" . $marca ["detalleMarca"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: center;width: 25%" rowspan="3">
                                <input type="submit" value="Agregar" style="width: 190px;" class="btn btn-sm btn-success" />
                                <br />
                                <br />
                                <input type="button" value="Limpiar" style="width: 190px;" class="btn btn-sm btn-danger"/>
                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                Proveedor:&nbsp;
                                <select  title="Ingrese Proveedor" name="idProveedorPrenda" id="idProveedorPrenda" style="width: 190px;" class="form-control">
                                    <option>
                                    </option>
                                    <?php
                                    foreach ($proveedores as $proveedor) {
                                        if (isset($proveedor)) {
                                            echo "<option value=" . $proveedor ["idProveedor"] . ">" . $proveedor ["nombreProveedor"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: right;width: 25%">
                                Temporada:&nbsp;
                                <select  title="Ingrese Temporada" style="width: 190px;" name="idEstacionPrenda" id="idEstacionPrenda" class="form-control">
                                    <option>
                                    </option>
                                    <?php
                                    foreach ($estaciones as $estacion) {
                                        if (isset($estacion)) {
                                            echo "<option value=" . $estacion ["idEstacion"] . ">" . $estacion ["detalleEstacion"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: right;width: 25%">
                                Estampado:&nbsp;
                                <select  name="idEstampadoPrenda" id="idEstampadoPrenda" style="width: 190px;" class="form-control"/>
                        <option>
                        </option>
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
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                Tela:&nbsp;
                                <select  title="Ingrese Razon Social" name="idTelaPrenda" id="idTelaPrenda" style="width: 190px;" class="form-control"/>
                        <option>
                        </option>
                        <?php
                        foreach ($telas as $tela) {
                            if (isset($telas)) {
                                echo "<option value=" . $tela ["idTela"] . ">" . $tela ["detalleTela"] . "</option>";
                            }
                        }
                        ?>
                        </select>
                        </td>
                        <td style="text-align: right;width: 25%">
                            Color:&nbsp;
                            <select  title="Ingrese Razon Social" name="idColorPrenda" id="idColorPrenda" style="width: 190px;" class="form-control" />
                        <option>
                        </option>
                        <?php
                        foreach ($colores as $color) {
                            if (isset($color)) {
                                echo "<option value=" . $color ["idColor"] . ">" . $color ["detalleColor"] . "</option>";
                            }
                        }
                        ?>
                        </select>
                        </td>
                        <td style="text-align: right;width: 25%">
                            Talle:&nbsp;
                            <select  title="Ingrese Razon Social" name="idTallePrenda" id="idTallePrenda" style="width: 190px;" class="form-control"/>
                        <option>
                        </option>
                        <?php
                        foreach ($talles as $talle) {
                            if (isset($talles)) {
                                echo "<option value=" . $talle ["idTalle"] . ">" . $talle ["detalleTalle"] . "</option>";
                            }
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
