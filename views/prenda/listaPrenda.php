<?php 
				require_once 'classes/prenda/prenda.php';
				$prendaList = new prenda();
				$prendas = $prendaList->prendasDisponibles();
                require_once 'classes/tipoVenta/tipoVenta.php';
				$tipoVentaList = new tipoVenta();
				$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
				?>
                <script language="JavaScript">
function A(c,i)
{
document.getElementById(i).style.backgroundColor=c;
}
</script>
<h1 style="text-align: left;">
	Prendas
</h1>
<div class="prendas">

	<table class="tablaPrendas">
		<tr>
			<td style="text-align: left; height: 40px;" colspan="2">
			<label for="txtPrenda">Codigo: </label>
				<input type="search"  id="txtPrenda" class="textPrendas"
				placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE."
                autofocus style="width:300px">
			</td>
			<td style="text-align: left; height: 40px;">
			<a href="#prenda">	<input type="button" value="Nuevo"  class="buttonPrendasNueva" onclick="javascript:document.getElementById('ver').style.display = 'block'"/></a>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: right;">
				<center>
                <div class="scrolPrenda">
					<table class="formuPrendas" id="tblPrenda" style="width: 98%; ">
						<thead>
                        <tr style='text-align: center'>
							<td>
								Mod
							</td>
                            <td>
								Cop
							</td>
                            <td >
								Cod
							</td>
							<td style="width:35%">
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
                        
                       $cont=0;
				if (isset($prendas)){	foreach ($prendas as $prenda) {
				$cont++;
					?>	
						<tr id="<?php echo $cont;?>" style="text-align: center">
							<td onclick="A('#FF0000',<?php echo $cont;?>);">
								<a title="Modificar datos" href="#prenda" class="editButtonPrenda" name="editButtonPrenda" data-cantidadprenda="<?php echo $prenda['cantidadPrenda']?>" data-idprenda="<?php echo $prenda['idPrenda']?>" data-idestampadoprenda="<?php echo $prenda['idEstampadoPrenda']?>" data-idtelaprenda="<?php echo $prenda['idTelaPrenda']?>" data-idtalleprenda="<?php echo $prenda['idTallePrenda']?>" data-codigoprenda="<?php echo $prenda['codigoPrenda']?>"  data-detalleprenda="<?php echo $prenda['detallePrenda']?>" data-idmarcaprenda="<?php echo $prenda['idMarcaPrenda']?>" data-idproveedorprenda="<?php echo $prenda['idProveedorPrenda']?>" data-idestacionprenda="<?php echo $prenda['idEstacionPrenda']?>" data-idcolorprenda="<?php echo $prenda['idColorPrenda']?>" onclick="javascript:document.getElementById('ver').style.display = 'block'" />
                                
								<img src='./imagenes/iconos/layout_edit.png' width='14' height='14' />
							</a>
							</td>
                            <td onclick="A('#FFff00',<?php echo $cont;?>);">
								<a title='copiar' href="#prenda" class="buttonCopiar" name="buttonCopiar" data-cantidadprenda="<?php echo $prenda['cantidadPrenda']?>" data-idestampadoprenda="<?php echo $prenda['idEstampadoPrenda']?>" data-idtelaprenda="<?php echo $prenda['idTelaPrenda']?>" data-idtalleprenda="<?php echo $prenda['idTallePrenda']?>" data-codigoprenda="<?php echo  $prenda['codigoPrenda']?>"  data-detalleprenda="<?php echo $prenda['detallePrenda']?>" data-idmarcaprenda="<?php echo $prenda['idMarcaPrenda']?>" data-idproveedorprenda="<?php echo $prenda['idProveedorPrenda']?>" data-idestacionprenda="<?php echo $prenda['idEstacionPrenda']?>" data-idcolorprenda="<?php echo $prenda['idColorPrenda']?>" onclick="javascript:document.getElementById('ver').style.display = 'block'" />
                                <img src='./imagenes/iconos/copiar.png' width='14' height='14' /></a>
							</td>
                            <td>
								<?php echo $prenda['codigoPrenda']?>
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detallePrenda']));?>
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detalleTalle']));?>							
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detalleColor']));?>							
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detalleEstampado']));?>							
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detalleTela']));?>								
							</td>
							<td style=" text-align: left; padding-left: 5px;">
								<?php echo ucfirst(strtolower($prenda['detalleEstacion']));?>	
                                							
							</td>
                            	<?php if ($prenda['cantidadPrenda']== '0'){ echo "<td style='background-color: red; font-weight: bolder;'>";}
                                else  {echo "<td >";
                                }
                                ?>			
							
								<?php echo $prenda['cantidadPrenda']?>								
							</td>
														
						</tr>
											<?php }}?>
                                            </tbody>
					</table>
                    
                    </div>
				
			</td>
		</tr>
	</table>
</div>
