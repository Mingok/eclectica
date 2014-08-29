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
            Nombre del programa
        </title>
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
        <script>
            $(function() {

                $('#selecCliente').select2().on("change", function(e) {
                    var deuda = $($(this).select2('data').element).data('deuda');
                    $('input[name=idPersona]').val(e.val);

                    $("#selecCliente").empty().attr("disabled", "disabled");
                    $('.deudaCliente').html("$ " + deuda);

                });

                $('#selecEmpleado').select2().on("change", function(e) {
                    auxiliar = this.value;
                    $('#selecCliente option[value="' + auxiliar + '"]').empty().css('display', 'none');
                    $('#selecCliente option[value="' + auxiliar + '"]').empty().attr('disabled', 'disabled');

                    $('input[name=idEmple]').val(e.val);
                    $('#divCliente').show();
                    $('#pwdDeVendedor').val($($(this).select2('data').element).data('codigovendedor'));
                    $("#selecEmpleado").empty().attr("disabled", "disabled");
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
                            <input type="hidden" value="" name="idPersona"/>
                            <input type="hidden" value="" name="idEmple"/>
                            <input type="hidden" value="" name="cuentaCorrientePersona"/>
                            <input type="hidden" id="pwdDeVendedor" name="pwdDeVendedor" />
                            <table style="width: 100%;">
                                <tr>
                                    <td style="height:55px; text-align: middle;">
                                        <label style="text-align:left">
                                            Empleado:
                                        </label><br>
                                        <select id="selecEmpleado" name="selecEmpleado"  style="width: 250px" >
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
                                    <td style="height:55px; text-align: middle;">
                                        <label class="ccLabel">Control:</label><br>
                                        <input type="password" class=" input input-sm" name="control" id="control" placeholder="ingresar" style="width: 100px;"/>
                                    </td>
                                </tr>
                                <tr style="vertical-align: middle;width: 500px;">   

                                    <td style="height:55px; width:330px; text-align: left;">
                                        <div id="divCliente">
                                            <label >Cliente:</label> <br>

                                            <select id="selecCliente" name="selecCliente" style="width:250px">
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
                                    <td style="height:55px; text-align: left;">
                                        <label >Deuda:</label><br>
                                        <span class="deudaCliente"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:55px; text-align: left;">
                                        <label class="ccLabel">Entrega:</label>
                                        <input type="text" class=" input input-sm" name="entregaCliente" id="entregaCliente" placeholder="ingresar" style="width: 100px;"/>
                                    </td>
                                    <td style="height:55px; text-align: right;">
                                        <input type="submit" name="ccSubmit" onclick="" value="Actualizar" class="btn btn-sm btn-success" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#divCliente').hide();
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
            }, submitHandler: function(form) {
                var url = $(form).attr('action');
                $('input[name=ccSubmit]').attr('disabled', 'disabled');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $(form).serialize(), // serializes the form's elements.
                    success: function(data) {
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
