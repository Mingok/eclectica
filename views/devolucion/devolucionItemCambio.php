<?php
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles();
?>

<div id="prendasDevolucion">
    <div class="panel panel-default">
        <div class="panel-heading">  
            <div class="row" style="text-align: right; padding-right: 20px;">
                <table  style="width: 100%">
                    <tr>
                        <td style="text-align: left; width: 15%; padding-left: 20px;">
                            <h3 class="panel-title">
                                Prendas
                            </h3>
                        </td>

                        <td style="text-align: right;width: 30%;">
                            <label for="txtCodPrendaVenta">
                                Codigo:
                            </label>
                            <input type="search" id="txtCodPrendaVenta" class="txtCodPrendaVenta" placeholder="Ingresar" autofocus style="width: 130px" maxlength="12">
                        </td>
                        <td style="text-align: right;width: 55%;">
                            <label for="txtNomPrendaVenta">
                                Nombre:
                            </label>
                            <input type="search" id="txtNomPrendaVenta" class="txtNomPrendaVenta" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 330px">
                        </td>
                    <tr>
                </table>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12 scrolPrenda" >
                    <table class="tabla">
                        <tr>
                            <td style="text-align: right;">
                                <div class="scrol1">
                                    <table class="table table-condensed" id="tblPrendaVenta">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                            <tr>
                                                <td>
                                                    Mod
                                                </td>
                                                <td>
                                                    Cod
                                                </td>
                                                <td style="width: 30%">
                                                    Nombre
                                                </td>
                                                <td>
                                                    Talle
                                                </td>
                                                <td>
                                                    Color
                                                </td>
                                                <td>
                                                    Estampado
                                                </td>
                                                <td>
                                                    Tela
                                                </td>
                                                <td>
                                                    Temporada
                                                </td>
                                                <td>
                                                    Cantidad
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($prendas)) {
                                                foreach ($prendas as $prenda) {
                                                    ?>
                                                    <tr >
                                                        <td style="text-align: center;">
                                                            <a title="Devolver" class="itemDev" id="itemDev" data-cantidadprenda="<?php echo $prenda ['cantidadPrenda'] ?>" data-idprenda="<?php echo $prenda ['idPrenda'] ?>" data-idestampadoprenda="<?php echo $prenda ['idEstampadoPrenda'] ?>" data-idtelaprenda="<?php echo $prenda ['idTelaPrenda'] ?>" data-idtalleprenda="<?php echo $prenda ['idTallePrenda'] ?>" data-codigoprenda="<?php echo $prenda ['codigoPrenda'] ?>" data-detalleprenda="<?php echo $prenda ['detallePrenda'] ?>" data-idmarcaprenda="<?php echo $prenda ['idMarcaPrenda'] ?>" data-idproveedorprenda="<?php echo $prenda ['idProveedorPrenda'] ?>" data-idestacionprenda="<?php echo $prenda ['idEstacionPrenda'] ?>" data-idcolorprenda="<?php echo $prenda ['idColorPrenda'] ?>" data-valor1="<?php echo $prenda ['valor1'] ?>" data-valor2="<?php echo $prenda ['valor2'] ?>" data-valor3="<?php echo $prenda ['valor3'] ?>" data-valor4="<?php echo $prenda ['valor4'] ?>" data-valor5="<?php echo $prenda ['valor5'] ?>" data-valor6="<?php echo $prenda ['valor6'] ?>" data-valor7="<?php echo $prenda ['valor7'] ?>" data-valor8="<?php echo $prenda ['valor8'] ?>" data-valor9="<?php echo $prenda ['valor9'] ?>" data-valor10="<?php echo $prenda ['valor10'] ?>" data-valor11="<?php echo $prenda ['valor11'] ?>" />
                                                            <img src="./imagenes/iconos/accept.png" width="18px" height="18px" />
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo $prenda ['codigoPrenda'] ?>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <?php echo ucfirst(strtolower($prenda ['detallePrenda'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($prenda ['detalleTalle'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($prenda ['detalleColor'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($prenda ['detalleEstampado'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($prenda ['detalleTela'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($prenda ['detalleEstacion'])); ?>
                                                        </td>
                                                        <?php
                                                        if ($prenda ['cantidadPrenda'] == '0') {
                                                            echo "<td style='background-color: red; font-weight: bolder;text-align: center;'>";
                                                        } else {
                                                            echo "<td style='text-align: center;' >";
                                                        }
                                                        ?>
                                                        <?php echo $prenda ['cantidadPrenda'] ?>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
