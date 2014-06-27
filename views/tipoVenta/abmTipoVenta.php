<?php
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Precios y Grupos
        </h3>
    </div>
    <div class="panel-body">
        <form action="actions/tipoVenta/guardarTipoVenta.php" id="formTipoVenta">
            <div id="muestraForm">
                <div class="row" style="text-align: right; height: 45px;">
                    <div class="col-md-6">
                        Nombre:
                        <input type="text" name="detalleTipoVenta" class="form-control" title="Ingresar Nombre" placeholder="ingrese" style="width: 150px;" required/>
                    </div>
                    <div class="col-md-3">
                        Porcentaje:<input type="text" name="porcentajeTipoVenta" class="form-control" title="Ingresar 0 a 100" style="width: 50px;" required/>
                    </div>
                    <div class="col-md-3" >
                        <input type="hidden" value="" name="idTipoVenta"/>
                        <input type="submit" style="width: 100px;" value="Modificar" class="btn btn-sm btn-success TipoVenta no"/>
                    </div>
                </div>
                <div class="row"  style="text-align: right; height: 45px;">
                    <div class="col-md-6">
                        Operacion:
                        <select size="1" title="Ingrese Grupo" class="form-control" name="operacionTipoVenta" id="operacionTipoVenta" style="width: 130px">
                            <option value="0">---</option>
                            <option value="1">Descuento</option>
                            <option value="2">Recargo</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        Grupo:
                        <select size="1" title="Ingrese Grupo" class="form-control"  name="grupoTipoVenta" id="grupoTipoVenta" style="width: 70px">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="button" style="width: 100px;" value="Limpiar" class="btn btn-sm btn-danger TipoVenta no"/>
                    </div>
                </div>
            </div>
        </form>
        <div id="exitoTipoVenta" >
            <p class="alert-error">
                Se Modifico Tipo de Venta</p>
        </div>
        <div class="row scrol">
            <table class="table table-condensed">
                <thead>
                    <tr style="text-align: center;">
                        <td>
                            <strong>
                                Mod
                            </strong>
                        </td>
                        <td>
                            <strong>
                                Nombre
                            </strong>
                        </td>
                        <td>
                            <strong>
                                Grupo
                            </strong>
                        </td>
                        <td>
                            <strong>
                                Oprecacion
                            </strong>
                        </td>
                        <td>
                            <strong>
                                %
                            </strong>
                        </td>
                    </tr>
                </thead>
                <?php $cont = 0;
                foreach ($tipoVentas as $tipoVenta) { ?>
                    <tr style='text-align: center'>
                        <td>
    <?php if ($cont >= 1) { ?>
                                <a title='Modificar datos' class="editButtonTipoVenta" name="editTipoVenta" data-idtipoventa="<?php echo $tipoVenta['idTipoVenta'] ?>" data-grupotipoventa="<?php echo $tipoVenta['grupoTipoVenta'] ?>" data-operaciontipoventa="<?php echo $tipoVenta['operacionTipoVenta'] ?>"
                                   data-detalletipoventa="<?php echo $tipoVenta['detalleTipoVenta'] ?>" data-porcentajetipoventa="<?php echo $tipoVenta['porcentajeTipoVenta'] ?>">
                                    <img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
                                </a>
    <?php } $cont++; ?>
                        </td>
                        <td>
    <?php echo ucfirst(strtolower($tipoVenta['detalleTipoVenta'])) ?>
                        </td>
                        <td>
    <?php echo $tipoVenta['grupoTipoVenta'] ?>
                        </td>
                        <td>
                            <?php
                            switch ($tipoVenta['operacionTipoVenta']) {
                                case "0": echo "---";
                                    break;
                                case "1": echo "Descuento";
                                    break;
                                case "2": echo "Recargo";
                                    break;
                            }
                            ?>
                        </td>
                        <td>
    <?php echo $tipoVenta['porcentajeTipoVenta'] ?>
                        </td>
                    </tr>
<?php } ?>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#exitoTipoVenta").hide();
        mostrar = getParameterByName('guardaTipoVenta');
        if (mostrar == 'ok') {
            $("#exitoTipoVenta").show("slow");
            $("#exitoTipoVenta").delay(5000).hide(1000);
        }


        $("#muestraForm").hide();



    });
//Boton Agregar o modificar
    $('.editButtonTipoVenta').click(function() {
        $("#muestraForm").show("slow");
        $('input[name=idTipoVenta]').val($(this).data('idtipoventa'));
        $('input[name=detalleTipoVenta]').val($(this).data('detalletipoventa'));
        $('input[name=porcentajeTipoVenta]').val($(this).data('porcentajetipoventa'));
        $('select[name=grupoTipoVenta]').val($(this).data('grupotipoventa'));
        $('select[name=operacionTipoVenta]').val($(this).data('operaciontipoventa'));
        $('.btn-success.TipoVenta').val('Modificar');
        $('.btn-danger.TipoVenta').removeClass('no');
        $('.btn-success.TipoVenta').removeClass('no');

    });

//Boton limpiar campos
    $('.btn-danger.TipoVenta').click(function() {
        $("#muestraForm").hide("slow");
        $('.btn-success.TipoVenta').val('Agregar');
        $('input[name=idTipoVenta]').val('');
        $('input[name=porcentajeTipoVenta]').val('');
        $('select[name=operacionTipoVenta]').val('');
        $('select[name=grupoTipoVenta]').val('');
        $('input[name=detalleTipoVenta]').val('');
        $('input[name=grupoTipoVenta]').val('');
        $('.btn-danger.TipoVenta').addClass('no');
        $('.btn-success.TipoVenta').addClass('no');

    });

//Validacion de formulario
    $('#formTipoVenta').validate();
</script>