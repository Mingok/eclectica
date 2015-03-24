<?php
define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');
define('EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/');
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->personasDisponibles();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" />
        <meta name="author" content="Emmanuel" />
        <title>
            Eclectica
        </title>
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>jqueryui/jquery-ui.min.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>jqueryui/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>tablaItemVenta/controlItemVenta.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#fechaEntrega").datepicker({
                    monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    dateFormat: "dd/mm/yy"
                });
                $("#fechaEntrega").datepicker("setDate", new Date());

                $("#fechaEntrega").change(function () {
                    $('#fecEntrega').val($(this).val());
                    
                });
                $('#divCliente').hide();
                $('#selecEmpleado').select2().on("change", function (e) {
                    auxiliar = this.value;
                    $('#selecCliente option[value="' + auxiliar + '"]').addClass("hide_me");
                    $('input[name=idEmple]').val(e.val);
                    $('#divCliente').show();
                    $('#pwdDeVendedor').val($($(this).select2('data').element).data('codigovendedor'));
                    $("#selecEmpleado").empty().attr("disabled", "disabled");
                });
                $('#selecCliente').select2().on("change", function (e) {
                    var deuda = $($(this).select2('data').element).data('deuda');
                    $("#selecCliente").empty().attr("disabled", "disabled");
//                    $('.deudaCliente').html("<label >Deuda:</label>$ " + deuda);
                    $('#idClienteVenta').val(this.value);
                    $('#idPersona').val(e.val);
                    $('#selecCliente').empty().attr("disabled", "disabled");
                    var url = 'indexComprasCliente.php';
                    var idCliente = $('#idPersona').val();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {'idCliente': idCliente}, // serializes the form's elements.
                        success: function (data) {
                            if (data) {
                                $('.movimientosClienteCont').html(data);
                            }
                        }
                    });
                });
                $('.miVenta').click(function () {
                    $('input[name=estaVenta]').val($(this).data('idestaventa'));
                    var url = './views/venta/ventaHistoricoDetalleCliente.php';
                    var idMiVenta = $('#estaVenta').val();
                    var esteCliente = $('#cliente1').val();
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {'idMiVenta': idMiVenta},
                        success: function (data) {
                            if (data) {
                                $('.movimientosVentaRenglon').html(data);
                                $.fancybox({
                                    maxWidth: 700,
                                    maxHeight: 400,
                                    closeEffect: 'elastic',
                                    href: '#historicoDetalleCliente'
                                });
                            }
                        }
                    });
                });
                $("#formCcCliente").validate({
                    rules: {
                        selecEmpleado: {
                            required: true

                        },
                        control: {
                            required: true,
                            equalTo: '#pwdDeVendedor'
                        },
                        selecCliente: {
                            required: true
                        },
                        entregaCliente: {
                            required: true,
                            number: true
                        }
                    },
                    messages: {
                        selecEmpleado: {
                            required: "Seleccione un Empleado",
                        },
                        control: {
                            required: "Ingrese un codigo de Vendedor",
                            equalTo: "Codigo Erroneo"
                        },
                        selecCliente: {
                            required: "Seleccione un Cliente",
                        },
                        entregaCliente: {
                            required: "Ingrese un valor de entrega",
                            number: "Tiene que ser un numero"
                        }
                    }, submitHandler: function (form) {
                        var url = $(form).attr('action');
                        $('input[name=ccSubmit]').attr('disabled', 'disabled');
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $(form).serialize(), // serializes the form's elements.
                            success: function (data) {
                                if (data == 'error:no_vendedor') {
                                    $('input[name=ccSubmit]').removeAttr('disabled');
                                    alert('El codigo de vendedor es incorrecto.');
                                } else {
                                    parent.$.fancybox.close();

                                }
                            }
                        });
                    }
                });
            });
        </script>
    </head>
    <body >
        <div style="height: 15px"></div>
        <div class="cuentaC" id="cuentaC">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Actualizar CC
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="actions/cliente/actualizaCcCliente.php" class="formCcCliente" id="formCcCliente">
                            <input type="hidden" value="" name="idPersona" id="idPersona"/>
                            <input type="hidden" id="estaVenta" name="estaVenta" >  
                            <input type="hidden" value="" name="idEmple" id="idEmple"/>
                            <input type="hidden" id="fecEntrega" name="fecEntrega"/>
                            <input type="hidden" value="" name="cuentaCorrientePersona"/>
                            <input type="hidden" id="pwdDeVendedor" name="pwdDeVendedor" />
                            <table style="width: 100%;">
                                <tr>
                                    <td style="height:65px; text-align: middle; width: 50%">
                                        <label style="text-align:left">Fecha Venta : </label>
                                        <input type="text" name="fechaEntrega" id="fechaEntrega" class="datepicker form-control" style="width: 120px" />
                                    </td>
                                    <td rowspan="7">
                                        <div class="movimientosClienteCont">

                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="height:65px; text-align: middle; width: 50%">
                                        <label style="text-align:left">
                                            Empleado:
                                        </label>
                                        <select id="selecEmpleado" name="selecEmpleado"  style="width: 210px" >
                                            <option value="">Seleccione un Empleado</option>
                                            <?php
                                            foreach ($personas as $persona) {

                                                if (isset($persona)) {
                                                    if (!($persona["codigoVendedor"] == null)) {
                                                        echo "<option value=" . $persona["idPersona"] . " data-codigoVendedor='" . $persona["codigoVendedor"] . "' >" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr style="vertical-align: middle;width: 500px;">   
                                    <td style="height:65px; width:330px; text-align: left;">
                                        <div id="divCliente">
                                            <label >Cliente:</label>
                                            <select id="selecCliente" name="selecCliente" style="width:210px">
                                                <option value="">Seleccione un Cliente</option>
                                                <?php
                                                foreach ($personas as $persona) {
                                                    if (isset($persona)) {
                                                        echo "<option value=" . $persona["idPersona"] . " data-deuda=" . $persona['cuentaCorrientePersona'] . ">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td style="height:65px; text-align: center;" rowspan="2">
                                        <span class="deudaCliente"></span>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td style="height:65px; text-align: left; padding: 10px">
                                        <label class="ccLabel">Entrega:</label>
                                        <input type="text" class=" input input-sm" name="entregaCliente" id="entregaCliente" placeholder="ingresar" style="width: 100px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:65px; text-align: left; padding: 10px">
                                        <label class="ccLabel">Control:</label>
                                        <input type="password" class=" input input-sm" name="control" id="control" placeholder="ingresar" style="width: 100px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style=" text-align: left">
                                        <input type="submit" name="ccSubmit" onclick="" value="Actualizar" class="btn btn-sm btn-success" style="width: 40%;"/>
                                    </td>

                                </tr>
                            </table>
                            <div id="historicoDetalleCliente" style="display:none; ">
                                <div class="movimientosVentaRenglon">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>