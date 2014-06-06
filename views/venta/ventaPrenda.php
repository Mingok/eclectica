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
<div class="row">
<form action="javascript: fn_agregar();" method="post" id="frm_usu">
<input type="hidden" id="idItemVenta" name="idItemVenta" />
<input type="hidden" id="condItem" name="condItem" />detalleItemVenta
<input type="hidden" id="ItemVenta" name="ItemVenta" />
<input type="hidden" id="detalleItemVenta" name="detalleItemVenta" />
<input type="hidden" id="precioItemVenta" name="precioItemVenta" value="123" />
    <div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-body  ">
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
						<label for="selecCondicion">
							Condicion :
						</label>
						<select id="selecCondicionItem" class="form-control input-sm"style="width: 250px" required>
							<optgroup label="Elija Uno">
								<?php foreach ($tipoVentas as $tipoVenta) { if (isset($tipoVenta)) { echo "<option value=" . $tipoVenta[ "idTipoVenta"] . ">" . $tipoVenta[ "detalleTipoVenta"]. "</option>"; } } ?>
							</optgroup>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>    
</div>
<!-- comienzo Div/Fancy Consulta Codigo-->
<div id="elemento" style="display:none">
    <div id="informacion"style="display:none">
        <h1>
        Prendas
        </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-body  ">
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
																<a title="Modificar datos" href="#" class="editButtonPrenda" name="editButtonPrenda" 
                                                                data-cantidadprenda="<?php echo $prenda ['idPrenda']?>" 
                                                                data-codigoprenda="<?php echo $prenda ['codigoPrenda']?>"
                                                                data-detalleprenda="<?php echo $prenda ['detallePrenda']?>" />
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
    $('.editButtonPrenda').click(function() {
            $('#idItemVenta').val($(this).data('idprenda'));
    		$('#codItemVenta').val($(this).data('codigoprenda'));
            $('#detalleItemVenta').val($(this).data('detalleprenda'));
            $('#agregarItem').show();
			$.fancybox.close();
		});
</script>