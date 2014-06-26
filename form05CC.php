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
                    $('.deudaCliente').html("$ " + deuda);
                });
            });
        </script>
    </head>
    <body>

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
                            <input type="hidden" value="" name="cuentaCorrientePersona"/>
                            <table style="width: 100%;">
                                <tr style="vertical-align: middle;width: 500px;">   
                                    <td style="height:45px; text-align: left;">
                                        Cliente: 
                                        <select id="selecCliente" style="width: 250px" required >
                                            <option value="">Seleccione un cliente</option>
                                        <?php
                                        foreach ($personas as $persona) {
                                            if (isset($persona)) {
                                                echo "<option value=" . $persona["idPersona"] . " data-deuda=" . $persona['cuentaCorrientePersona'] .">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                                            }
                                        }
                                        ?>
                                            
                                        </select>
                                    </td>
                                    <td style="height:45px; text-align: left;">
                                        <strong>Deuda: </strong>
                                        <span class="deudaCliente"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:45px; text-align: middle;">
                                        Entrega:
                                        <input type="text" class=" input input-sm" name="entregaCliente" placeholder="ingresar" style="width: 100px;" />
                                    </td>
                                    <td style="height:30px; text-align: middle;">
                                        Control:
                                        <input type="pass" class=" input input-sm" name="control" placeholder="ingresar" style="width: 100px;" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height:45px; text-align: right;">
                                        <input type="submit" name="pNuevo" onclick="" value="Actualizar" class="btn btn-sm btn-success" />
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
<script>
    $(document).ready(function() {
        $("#formCcCliente").validate({
                submitHandler: function (form) {
                    var url = $(form).attr('action');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $(form).serialize(), // serializes the form's elements.
                        success: function(data) {
                            parent.$.fancybox.close();
                        }
                    });
                }
            });

            
    });
//    function formSubmitCC() {
//            var url = $(".formCcCliente").attr('action');
//            $.ajax({
//                type: "POST",
//                url: url,
//                data: $(".formCcCliente").serialize(), // serializes the form's elements.
//                success: function(data) {
//                    parent.$.fancybox.close();
//                }
//            });
//
//        }
    
</script>