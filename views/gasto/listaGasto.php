<?php
require_once 'classes/gasto/gasto.php';
$gastoList = new gasto ();
$gastos = $gastoList->gastoDisponibles();
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles();
require_once 'classes/formaPago/formaPago.php';
$formaPagoList = new formaPago ();
$formasPago = $formaPagoList->formaPagoDisponibles();
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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body  ">
                <div class="col-md-12" style="text-align: right;">
                    <label for="txtNomPrenda">
                        Detalle:
                    </label>
                    <input type="search" id="txtGasto" class="textPrendas form-control" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 690px">
                    <div style="height: 10px"></div>
                </div>
                <div class="row">
                    <table class="table">
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <div class="scrolPrenda">
                                    <table class="table table-condensed" id="tblGasto">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                            <tr>
                                                <td>
                                                    Mod
                                                </td>
                                                <td>
                                                    Fecha
                                                </td>
                                                <td>
                                                    Detalle
                                                </td>
                                                <td>
                                                    Importe
                                                </td>
                                                <td>
                                                    Proveedor
                                                </td>
                                                <td>
                                                    F. de Pago
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cont = 0;
                                            if (isset($gastos)) {
                                                foreach ($gastos as $gasto) {
                                                    
                                                    $cont ++;
                                                    ?>
                                                    <tr id=" <?php echo $cont; ?> " class=" <?php echo $cont; ?> ">
                                                        <td style="text-align: center;" onclick=" pintafila(<?php echo $cont; ?>, '#FF0000')">
                                                            <a title="Modificar datos" href="#gasto" class="editButtonGasto" name="editButtonGasto" data-fechaGasto="<?php echo $gasto ['fechaGasto'] ?>" data-detalleGasto="<?php echo $gasto ['detalleGasto'] ?>" data-importeGasto="<?php echo $gasto ['importeGasto'] ?>" data-idGasto="<?php echo $gasto ['idGasto'] ?>" data-idProveedorGasto="<?php echo $gasto ['idProveedorGasto'] ?>" data-idFormaPagoGasto="<?php echo $gasto ['idFormaPagoGasto'] ?>" 
                                                               onclick=" pintafila(<?php echo $cont; ?>, '#FF0000')" />
                                                            <img src='./imagenes/iconos/layout_edit.png' width='18px' height='18px' />
                                                            </a>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <?php echo date("d/m/Y",strtotime($gasto ['fechaGasto'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($gasto ['detalleGasto'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($gasto ['importeGasto'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($gasto ['nombreProveedor'])); ?>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo ucfirst(strtolower($gasto ['detalleFormaPago'])); ?>
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