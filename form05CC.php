<?php
define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');
define('EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/');
require_once 'classes/persona/persona.php';
$personaList = new
        persona();
$personas = $personaList->
        personasDisponibles();
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
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script>
            $(function() {
                $('#selecCliente').select2().on("change", function(e) {
                    $('input[name=idPersona]').val(e.val);

                })
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
                            <table style="width: 100%;">
                                <tr style="vertical-align: middle;width: 500px;">
                                    Cliente: <select id="selecCliente" style="width: 250px" required >
                                    <optgroup label="Elija Uno">
                                        <?php
                                        foreach ($personas as $persona) {
                                            if (isset($persona)) {
                                                echo "<option value=" . $persona["idPersona"] . ">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                                            }
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                                <td style="height:30px; text-align: left;">
                                    <div id="CC" style="width: 300px;">
                                    </div>
                                </td>
                                </tr>
                                <tr >
                                    <td style="height:30px; text-align: middle;">
                                        <input type="hidden" value="" name="idPersona"/>
                                        <input type="hidden" value="" name="cuentaCorrientePersona"/>
                                        Entrega:
                                        <input type="text" class=" input input-sm" name="entregaCliente" placeholder="ingresar" style="width: 100px;" />
                                        <br />
                                        <br />
                                        Control:
                                        <input type="pass" class=" input input-sm" name="control" placeholder="ingresar" style="width: 100px;" required />
                                        <br />
                                        <br />
                                    </td>
                                    <td rowspan="2" style="height:30px; text-align: middle;">
                                        <input type="button" name="pNuevo" onclick="formSubmitCC()" value="Actualizar" class="btn btn-sm btn-success" />
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

    $("#formCcCliente").validate();

    function formSubmitCC() {
        var url = $(".formCcCliente").attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: $(".formCcCliente").serialize(), // serializes the form's elements.
                success: function(data) {
                    parent.$.fancybox.close();
                }
            });
        
    }
</script>