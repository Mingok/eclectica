<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor();
$proveedores = $proveedorList->proveedoresDisponibles();
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Acreedores - Impuestos - Servicios </h3>
    </div>
    <div class="panel-body">
        <form action="actions/acreedor/guardarAcreedor.php" id="formAcreedor">
            <div class="row">
                <div class="col-md-8">
                    Nombre:<input type="text" name="nombreProveedor" style="width: 160px" class="form-control" title="Ingresar Acreedor" placeholder="ingresar" required/>
                    <input type="hidden" value="" name="idProveedor"/>
                    <input type="hidden" value="1" name="acreedorProveedor"/>
                </div>
                <div class="col-md-4">
                    <input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success acreedor "/>
                    <br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger acreedor no"/>
                </div>
            </div>
        </form>
        <div  id="exitoAcreedor" >
            <p class="alert-success" style="text-align: center">
                <b>Se Creo/Modifico Acreedor</b></p>
        </div>
        <div class="row scrol"> 
            <table class="table table-condensed">
                <thead >
                    <tr style="text-align: center;">
                        <td>
                            <strong>Mod</strong>
                        </td>
                        <td>
                            <strong>Nombre</strong>
                        </td>
                    </tr>
                </thead>
                <?php
                foreach ($proveedores as $proveedor) {
                    if ($proveedor["acreedorProveedor"] == 1) {
                        ?>					
                        <tr style='text-align: center'>
                            <td>
                                <a title='Modificar datos' class="editButtonAcreedor" name="editAcreedor" data-idproveedor="<?php echo $proveedor['idProveedor'] ?>" data-detalleproveedor="<?php echo $proveedor['nombreProveedor'] ?>">
                                    <img src="./imagenes/iconos/edit.png" style="width:18px; height:18px;" />
                                </a>
                            </td>
                            <td>
                                <?php echo $proveedor['nombreProveedor'] ?>
                            </td>
                        </tr>
                    <?php }
                } ?>		
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    $(document).ready(function () {
        $("#exitoAcreedor").hide();
        mostrar = getParameterByName('guardaAcreedor');
        if (mostrar == 'ok') {
            $("#exitoAcreedor").show("slow");
            $("#exitoAcreedor").delay(5000).hide(1000);
        }

    });
//Boton Agregar o modificar
    $('.editButtonAcreedor').click(function () {
        $('input[name=idProveedor]').val($(this).data('idproveedor'));
        $('input[name=nombreProveedor]').val($(this).data('detalleproveedor'));
        $('.btn-success.acreedor').val('Modificar');
        $('.btn-danger.acreedor').removeClass('no');
    });

//Boton limpiar campos
    $('.btn-danger.acreedor').click(function () {
        $('.btn-success.acreedor').val('Agregar');
        $('input[name=idProveedor]').val('');
        $('input[name=nombreProveedor]').val('');
        $('.btn-danger.acreedor').addClass('no');
    });

//Validacion de formulario
    $('#formAcreedor').validate();


</script>
