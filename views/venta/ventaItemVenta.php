<?php
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles ();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles ();
?>
<h1>
	Pendas
</h1>
<input type="hidden" id="precio1" name="precio1"  />
<input type="hidden" id="precio2" name="precio2"  />
<input type="hidden" id="precio3" name="precio3"  />
<input type="hidden" id="precio4" name="precio4"  />
<input type="hidden" id="precio5" name="precio5"  />
<input type="hidden" id="precio6" name="precio6"  />
<div class="row">
<form action="JavaScript:agregarCampo();" method="post">

<input type="hidden" id="idItemVenta" name="idItemVenta" />
<input type="hidden" id="condItemVenta" name="condItemVenta" />
<input type="hidden" id="ItemVenta" name="ItemVenta" />
<input type="hidden" id="detalleItemVenta" name="detalleItemVenta" />
<input type="hidden" id="precioItemVenta" name="precioItemVenta"  />
    <div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-body">
				<div class="row" style="height: 40px;">
					<div class="col-md-8" style="text-align: right;">
						<label for="codItemVenta">
							Codigo:
						</label>
						<input type="text" id="codItemVenta" class="codItemVenta form-control" placeholder="Ingresar" style="width: 140px" maxlength="12" autofocus>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Agregar Item" id="agregarItem" style="width: 100px;" class="buttonPrendasNueva btn btn-sm btn-success" />
					</div>
				</div>
				<div class="row"style="height: 40px;">
					<div class="col-md-8" style="text-align: right;">
						<label for="cantidadPrenda">
							Cantidad :
						</label>
						<input type="number" title="Indresar Cantidad" name="cantidadItemVenta" id="cantidadItemVenta" style="width: 60px;" class="form-control" min="0" max="20" value="0" />
					</div>
					<div class="col-md-4">
						<a id="fancyboxPrenda"class="fancyboxPrenda" href="#informacion">
						<input type="button"
						value="Buscar" style="width: 100px;"
						class="buttonPrendasNueva btn btn-sm btn-primary" /></a>
					</div>
				</div>
				<div class="row"style="height: 40px;">
					<div class="col-md-12" style="text-align: right;">
						<label for="selecCondicionItem">
							Condicion :
						</label>
						<select id="selecCondicionItem" name="selecCondicionItem" style="width: 250px" required >
                        <option></option>
						</select>
                        <img id="imgCondicionItem" style="display: none;" src="./imagenes/iconos/loading.gif" alt="Cargando" />
					</div>
				</div>
			</div>
		</div>
	</div>
</form>    
</div>
<script type="text/javascript">
$('#selecCondicionItem').select2().on("change", function(e) {
    var aux=e.val;
    $('#condItemVenta').val(this.options[aux].text);
    alert (aux);
    switch (aux){
        case '1':$('input[name=precioItemVenta]').val($('#precio1').val()); break;
        case '2':$('input[name=precioItemVenta]').val($('#precio2').val()); break;
        case '3':$('input[name=precioItemVenta]').val($('#precio3').val()); break;
        case '4':$('input[name=precioItemVenta]').val($('#precio4').val()); break;
        case '5':$('input[name=precioItemVenta]').val($('#precio5').val()); break;
        case '6':$('input[name=precioItemVenta]').val($('#precio6').val()); break;
    }
})
</script>

<!-- comienzo Div/Fancy Consulta Codigo-->
<div id="elemento" style="display:none">
    <div id="informacion"style="display:none">
        <h1>
        Prendas
        </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="col-md-10" style="text-align: right;">
                            <label for="txtCodPrenda">
                            Nombre:
                            </label>
                            <input type="search" id="txtCodPrenda" class="txtCodPrenda" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 390px">
                        </div>
                        <div class="col-md-2">
                            <input type="button"
                            value="Nuevo" style="width: 100px;"
                            class="buttonPrendasNueva btn btn-sm btn-success" />
                        </div>
                        <div class="row">
                            <table class="tabla">
                                <tr>
                                    <td style="text-align: right;">
                                        <center>
                                            <div class="scrol1">
                                                <table class="table table-striped" id="tblPrenda">
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
														<?php  if (isset ( $prendas )) { 
														      foreach ( $prendas as $prenda ) 
                                                              if (!($prenda [ 'cantidadPrenda']=='0')) {{ ?>
														<tr >
															<td style="text-align: center;">
																<a title="Modificar datos" class="itemAVender" id="itemAVender" data-cantidadprenda="<?php
															echo $prenda ['cantidadPrenda']?>" data-idprenda="<?php
															echo $prenda ['idPrenda']?>" data-idestampadoprenda="<?php
															echo $prenda ['idEstampadoPrenda']?>" data-idtelaprenda="<?php
															echo $prenda ['idTelaPrenda']?>" data-idtalleprenda="<?php
															echo $prenda ['idTallePrenda']?>" data-codigoprenda="<?php
															echo $prenda ['codigoPrenda']?>" data-detalleprenda="<?php
															echo $prenda ['detallePrenda']?>" data-idmarcaprenda="<?php
															echo $prenda ['idMarcaPrenda']?>" data-idproveedorprenda="<?php
															echo $prenda ['idProveedorPrenda']?>" data-idestacionprenda="<?php
															echo $prenda ['idEstacionPrenda']?>" data-idcolorprenda="<?php
															echo $prenda ['idColorPrenda']?>" data-valor1="<?php
															echo $prenda ['valor1']?>" data-valor2="<?php
															echo $prenda ['valor2']?>" data-valor3="<?php
															echo $prenda ['valor3']?>" data-valor4="<?php
															echo $prenda ['valor4']?>" data-valor5="<?php
															echo $prenda ['valor5']?>" data-valor6="<?php
															echo $prenda ['valor6']?>" />
															<img src='./imagenes/iconos/layout_edit.png' width='18px' height='18px' />
															</a>
															
															</td>
															<td>
															    <?php echo $prenda ['codigoPrenda']?>
															</td>
															<td style="text-align: left;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detallePrenda'] ) ); ?>
															</td>
															<td style="text-align: center;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detalleTalle'] ) ); ?>
															</td>
															<td style="text-align: center;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detalleColor'] ) ); ?>
															</td>
															<td style="text-align: center;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detalleEstampado'] ) ); ?>
															</td>
															<td style="text-align: center;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detalleTela'] ) ); ?>
															</td>
															<td style="text-align: center;">
																<?php echo ucfirst ( strtolower ( $prenda [ 'detalleEstacion'] ) ); ?>
															</td>
															<?php if ($prenda [ 'cantidadPrenda']=='0') { echo "<td style='background-color: red; font-weight: bolder;text-align: center;'>"; } else { echo "<td style='text-align: center;' >"; } ?>
																<?php echo $prenda [ 'cantidadPrenda']?>
								
                                                            </td>
								                       </tr>
                                                        <?php } }} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <center>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<script type="text/javascript">
    $("#fancyboxPrenda").fancybox({
        minWidth: 300,
        minHeight: 400,
        closeEffect : 'elastic'
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
        $('#agregarItem').show();
        $.fancybox.close();
    });
</script>