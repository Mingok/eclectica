<!-- comienzo Div/Fancy Consulta Codigo-->

<div id="informacion" style="display:none">
    <h1>
        Prendas
    </h1>
    <div class="panel panel-success">
        <div class="panel-body">
            <div class="row" style="text-align: right; padding-right: 20px;">
                <div class="col-md-6" style="text-align: right; padding-bottom: 10px;">
                    <label for="txtCodPrendaVenta">
                        Codigo:
                    </label>
                    <input type="search" id="txtCodPrendaVenta" class="txtCodPrendaVenta" placeholder="Ingresar" autofocus style="width: 130px" maxlength="12">
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <label for="txtNomPrendaVenta">
                        Nombre:
                    </label>
                    <input type="search" id="txtNomPrendaVenta" class="txtNomPrendaVenta" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 390px">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" >
                    <table class="tabla">
                        <tr>
                            <td style="text-align: right;">

                                <div class="scrol1">
                                    <table class="table table-striped" id="tblPrendaVenta">
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
                                                    if (!($prenda ['cantidadPrenda'] == '0')) {
                                                        ?>
                                                        <tr >
                                                            <td style="text-align: center;">
                                                                <a title="Modificar datos" class="itemAVender" id="itemAVender" data-cantidadprenda="<?php echo $prenda ['cantidadPrenda'] ?>" data-idprenda="<?php echo $prenda ['idPrenda'] ?>" data-idestampadoprenda="<?php echo $prenda ['idEstampadoPrenda'] ?>" data-idtelaprenda="<?php echo $prenda ['idTelaPrenda'] ?>" data-idtalleprenda="<?php echo $prenda ['idTallePrenda'] ?>" data-codigoprenda="<?php echo $prenda ['codigoPrenda'] ?>" data-detalleprenda="<?php echo $prenda ['detallePrenda'] ?>" data-idmarcaprenda="<?php echo $prenda ['idMarcaPrenda'] ?>" data-idproveedorprenda="<?php echo $prenda ['idProveedorPrenda'] ?>" data-idestacionprenda="<?php echo $prenda ['idEstacionPrenda'] ?>" data-idcolorprenda="<?php echo $prenda ['idColorPrenda'] ?>" data-valor1="<?php echo $prenda ['valor1'] ?>" data-valor2="<?php echo $prenda ['valor2'] ?>" data-valor3="<?php echo $prenda ['valor3'] ?>" data-valor4="<?php echo $prenda ['valor4'] ?>" data-valor5="<?php echo $prenda ['valor5'] ?>" data-valor6="<?php echo $prenda ['valor6'] ?>" />
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
<script type="text/javascript">


    $("#fancyboxPrenda").fancybox({
        minWidth: 300,
        minHeight: 400,
        closeEffect: 'elastic'
    });
    $('.itemAVender').click(function() {
        $('#idItemVenta').val($(this).data('idprenda'));
        $('#codItemVenta').val($(this).data('codigoprenda'));
        $('#detalleItemVenta').val($(this).data('detalleprenda'));
        $('#precio1').val($(this).data('valor1'));
        $('#precio2').val($(this).data('valor2'));
        $('#precio3').val($(this).data('valor3'));
        $('#precio4').val($(this).data('valor4'));
        $('#precio5').val($(this).data('valor5'));
        $('#precio6').val($(this).data('valor6'));
        $('#cuentaCorriente').val($(this).data('cuentaCorrientePersona'));
        $('#agregarItem').show();
        $('#areaItemAVender').show();
        $.fancybox.close();

    });
</script>