<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->personasDisponibles();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Cliente
                </h3>
            </div>
            <div class="panel-body" style="text-align: right">
                <label style="text-align:left">
                    Empleado:
                </label>
                <select id="selecEmpleados" name="selecEmpleados" style="width:240px;" required>
                    <option></option>
                    <?php
                    foreach ($personas as $persona) {

                        if (isset($persona)) {
                            if (!($persona["codigoVendedor"] == null)) {
                                echo "<option value=" . $persona["idPersona"] . " data-codigoVendedor='".$persona["codigoVendedor"]  ."' >" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <div style="height: 10px"></div>
                <label style="text-align:left">
                    Cliente:
                </label>
                <select id="selecClientes" name="selecClientes" style="width:240px;" required>
                    <option></option>
                    <?php
                    foreach ($personas as $persona) {
                        if (isset($persona)) {
                            echo "<option value=" . $persona["idPersona"] . ">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div style="height: 10px"></div>
            </div>
        </div>
    </div>
</div>
