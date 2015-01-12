<?php
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<script language="javascript" type="text/javascript">
    function pintafila(fila, color) {
        antes = document.getElementById('tblPrenda').rows[fila].style.backgroundColor;
        for (i = 1; i < document.getElementById('tblPrenda').rows.length; i++) {
            if (document.getElementById('tblPrenda').rows[i].id == fila) {
                document.getElementById('tblPrenda').rows[i].style.backgroundColor = color;
            } else {
                if (!(antes == fila)) {
                    document.getElementById('tblPrenda').rows[i].style.backgroundColor = "transparent";
                }
            }
        }
    }
</script>
<h1>
    Prendas
</h1>
<div  id="exitoPrenda" style="display: none; padding-top: 10px;">
    
    <div id="CPrenda" class="alert alert-success alert-success1" style=""></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body  ">
                <div class="col-md-5" style="text-align: right; padding-bottom: 10px;">
                    <label for="txtCodPrenda">
                        Codigo:
                    </label>
                    <input type="search" id="txtCodPrenda" class="textPrendas form-control" placeholder="Ingresar" autofocus style="width: 130px" maxlength="12">
                </div>
                <div class="col-md-5" style="text-align: right;">
                    <label for="txtNomPrenda">
                        Nombre:
                    </label>
                    <input type="search" id="txtNomPrenda" class="textPrendas form-control" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 390px">
                </div>
                <div class="col-md-2">
                    <a href="#prenda"> 
                        <input type="button" value="Agregar" style="width: 100px;" class="buttonPrendasNueva btn btn-sm btn-success" /></a>
                </div>
                <div class="row">
                    <table class="table">
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <div class="scrolPrenda">
                                    <table class="table table-condensed" id="tblPrenda">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                            <tr>
                                                <td style="width: 4%">
                                                    Mod
                                                </td>
                                                <td style="width: 4%">
                                                    Cop
                                                </td>
                                                <td style="width: 10%">
                                                    Cod
                                                </td>
                                                <td style="width: 30%">
                                                    Nombre
                                                </td>
                                                <td style="width: 4%">
                                                    Talle
                                                </td>
                                                <td style="width: 10%">
                                                    Color
                                                </td>
                                                <td style="width: 10%">
                                                    Estampado
                                                </td>
                                                <td style="width: 14%">
                                                    Tela
                                                </td>
                                                <td style="width: 10%">
                                                    Temporada
                                                </td>
                                                <td style="width: 4%">
                                                    Cantidad
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cont = 0;
                                            if (isset($prendas)) {
                                                
                                                foreach ($prendas as $prenda) {
                                                    $cont ++;
                                                    ?>
                                                    <tr id="<?php
                                                    echo $cont;
                                                    ?>" class="<?php
                                                        echo $cont;
                                                        ?>">
                                                        <td style="text-align: center;" onclick=" pintafila(<?php
                                                        echo $cont;
                                                        ?>, '#FF0000')">
                                                            <a title="Modificar datos" href="#prenda" class="editButtonPrenda" name="editButtonPrenda" data-cantidadprenda="<?php echo $prenda ['cantidadPrenda'] ?>" data-idprenda="<?php echo $prenda ['idPrenda'] ?>" data-idestampadoprenda="<?php echo $prenda ['idEstampadoPrenda'] ?>" data-idtelaprenda="<?php echo $prenda ['idTelaPrenda'] ?>" data-idtalleprenda="<?php echo $prenda ['idTallePrenda'] ?>" data-codigoprenda="<?php echo $prenda ['codigoPrenda'] ?>" data-detalleprenda="<?php echo $prenda ['detallePrenda'] ?>" data-idmarcaprenda="<?php echo $prenda ['idMarcaPrenda'] ?>" data-idproveedorprenda="<?php echo $prenda ['idProveedorPrenda'] ?>" data-idestacionprenda="<?php echo $prenda ['idEstacionPrenda'] ?>" data-idcolorprenda="<?php echo $prenda ['idColorPrenda'] ?>" data-valor1="<?php echo $prenda ['valor1'] ?>" data-valor2="<?php echo $prenda ['valor2'] ?>" data-valor3="<?php echo $prenda ['valor3'] ?>" data-valor4="<?php echo $prenda ['valor4'] ?>" data-valor5="<?php echo $prenda ['valor5'] ?>" data-valor6="<?php echo $prenda ['valor6'] ?>" data-valor7="<?php echo $prenda ['valor7'] ?>" data-valor8="<?php echo $prenda ['valor8'] ?>" data-valor9="<?php echo $prenda ['valor9'] ?>" data-valor10="<?php echo $prenda ['valor10'] ?>" data-valor11="<?php echo $prenda ['valor11'] ?>" />
                                                            <img src='./imagenes/iconos/layout_edit.png' width='18px' height='18px' />
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;" onclick=" pintafila(<?php
                                                        echo $cont;
                                                        ?>, '#FFff00')">
                                                            <a title='copiar' href="#prenda" class="buttonCopiar" name="buttonCopiar" data-cantidadprenda="<?php echo $prenda ['cantidadPrenda'] ?>" data-idestampadoprenda="<?php echo $prenda ['idEstampadoPrenda'] ?>" data-idtelaprenda="<?php echo $prenda ['idTelaPrenda'] ?>" data-idtalleprenda="<?php echo $prenda ['idTallePrenda'] ?>" data-codigoprenda="<?php echo $prenda ['codigoPrenda'] ?>" data-detalleprenda="<?php echo $prenda ['detallePrenda'] ?>" data-idmarcaprenda="<?php echo $prenda ['idMarcaPrenda'] ?>" data-idproveedorprenda="<?php echo $prenda ['idProveedorPrenda'] ?>" data-idestacionprenda="<?php echo $prenda ['idEstacionPrenda'] ?>" data-idcolorprenda="<?php echo $prenda ['idColorPrenda'] ?>" data-valor1="<?php echo $prenda ['valor1'] ?>" data-valor2="<?php echo $prenda ['valor2'] ?>" data-valor3="<?php echo $prenda ['valor3'] ?>" data-valor4="<?php echo $prenda ['valor4'] ?>" data-valor5="<?php echo $prenda ['valor5'] ?>" data-valor6="<?php echo $prenda ['valor6'] ?>" data-valor7="<?php echo $prenda ['valor7'] ?>" data-valor8="<?php echo $prenda ['valor8'] ?>" data-valor9="<?php echo $prenda ['valor9'] ?>" data-valor10="<?php echo $prenda ['valor10'] ?>" data-valor11="<?php echo $prenda ['valor11'] ?>"  />
                                                            <img src='./imagenes/iconos/copiar.png' width='18px' height='18px' />
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="fancyboxPrecios" id="fancyboxPrecios" href="./indexPreciosPrenda.php?idPrenda=<?php
                                                            echo $prenda ['idPrenda'];
                                                            ?>">
                                                                   <?php echo $prenda ['codigoPrenda'] ?>
                                                            </a>
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
                                                        if (isset($prenda['cantidadPrenda']) && ($prenda['cantidadPrenda'] == '0')) {
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