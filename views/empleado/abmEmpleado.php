<?php require_once 'classes/proveedor/proveedor.php'; $proveedorList=new proveedor(); $proveedores=$proveedorList->
	proveedoresDisponibles(); ?>
	<?php require_once 'classes/proveedor/proveedor.php'; $proveedorList=new proveedor(); $proveedores=$proveedorList->
		proveedoresDisponibles(); ?>
		<h1>
							Proveedores
						</h1>
                        <div class="row">
        
			<div class="col-md-12">
            		<div class="panel panel-success">
								<div class="panel-body ">
						<div style="height: 33px; text-align: right;">
							<label for="txtProveedor">
								Buscar:
							</label>
							<input type="search" style="width:375px" id="txtProveedor" class="textPrendas" placeholder="Escriba el Nombre que desea encontrar y presione la ENTER" autofocus />
						</div>
						<table class="table table-condensed" id="tblProveedor">
							<thead  class="btn-success">
								<tr style="text-align: center;">
									<td style="height:30px; width: 8%;">
										Mod
									</td>
									<td width="40">
										Nombre
									</td>
									<td width="25%">
										Contacto
									</td>
									<td width="27%">
										Telefono
									</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($proveedores as $proveedor) { ?>
									<tr style='text-align: center'>
										<td>
											<a tite='Modificar datos del empleado' class="editButtonProveedor" name="editProveedor" data-idProveedor="<?php echo $proveedor['idProveedor']?>" data-nombreProveedor="<?php echo $proveedor['nombreProveedor']?>"
											data-cuitProveedor="<?php echo $proveedor['cuitProveedor']?>" data-condIvaProveedor="<?php echo $proveedor['condIvaProveedor']?>"data-direccionProveedor="<?php echo $proveedor['direccionProveedor']?>"
											data-localidadproveedor="<?php echo $proveedor['localidadProveedor']?>" data-telefonoProveedor="<?php echo $proveedor['telefonoProveedor']?>" data-contactoProveedor="<?php echo $proveedor['contactoProveedor']?>"
											data-bancoProveedor="<?php echo $proveedor['bancoProveedor']?>" data-cbuProveedor="<?php echo $proveedor['cbuProveedor']?>">
											<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
											</a>
										</td>
										<td>
											<?php echo $proveedor[ 'nombreProveedor']?>
										</td>
										<td>
											<?php echo $proveedor[ 'contactoProveedor']?>
										</td>
										<td>
											<?php echo $proveedor[ 'telefonoProveedor']?>
										</td>
									</tr>
									<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
            </div>
            <div class="row">
			<div class="col-md-12">
				<form action="actions/proveedor/guardarProveedor.php" class="formProveedor" id="formProveedor">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Datos del Proveedor</h3>
						</div>
						<div class="panel-body">
							<div class="row" style="height: 35px;">
								<div class="col-md-4" style="text-align: right;">
									Raz&oacute;n Soc.:&nbsp;
									<input type="text " title="Ingrese Razon Social" style="width: 100px; " maxlength="50px " name="nombreProveedor" placeholder="ingrese " id="nombreProveedor" required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									CUIT:&nbsp;
									<input type="text " style="width: 100px; " title="Ingrese CUIT" maxlength="50px " name="cuitProveedor" placeholder="xx-xxxxxxxxx-xx " required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									Cond. IVA:
									<input type="text " style="width: 100px; " maxlength="50px " title="Ingrese CONDICION" name="condIvaProveedor" placeholder="ingrese " required />
								</div>
							</div>
							<div class="row" style="height: 35px;">
								<div class="col-md-4" style="text-align: right;">
									Domicilio:&nbsp;
									<input type="text " style="width: 120px; " name="direccionProveedor" title="Ingrese DOMICILIO" placeholder="ingrese " required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									Localidad:&nbsp;&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " title="Ingrese LOCALIDAD" name="localidadProveedor" placeholder="ingrese " required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									Banco:&nbsp;
									<input type="text " style="width: 100px; " name="bancoProveedor" title="Ingrese BANCO" placeholder="ingrese " required required/>
								</div>
							</div>
							<div class="row" style="height: 35px;">
								<div class="col-md-4" style="text-align: right;">
									Contacto:&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px" title="Ingrese CONTACTO" name="contactoProveedor" placeholder="ingrese " required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									Telefono:&nbsp;
									<input type="text " style="width: 120px; " maxlength="50px " name="telefonoProveedor" title="Ingrese TELEFONO " placeholder="ingrese " required />
								</div>
								<div class="col-md-4" style="text-align: right;">
									CBU&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " name="cbuProveedor" placeholder="ingrese " title="Ingrese CBU" required />
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" style="text-align: right;">
									<input type="hidden" value="" name="idProveedor"/>
									<input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success " />
									<input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger Color no"/>
								</div>
							</div>
						</div>
				    </div>
                </form>
			</div>
		</div>

		<script type="text/javascript">
			
			
			$('.editButtonProveedor').click(function() {
				
				$('input[name=idProveedor]').val($(this).data('idproveedor'));
				$('input[name=nombreProveedor]').val($(this).data('nombreproveedor'));
				$('input[name=cuitProveedor]').val($(this).data('cuitproveedor'));
				$('input[name=condIvaProveedor]').val($(this).data('condivaproveedor'));
				$('input[name=direccionProveedor]').val($(this).data('direccionproveedor'));
				$('input[name=localidadProveedor]').val($(this).data('localidadproveedor'));
				$('input[name=telefonoProveedor]').val($(this).data('telefonoproveedor'));
				$('input[name=contactoProveedor]').val($(this).data('contactoproveedor'));
				$('input[name=bancoProveedor]').val($(this).data('bancoproveedor'));
				$('input[name=cbuProveedor]').val($(this).data('cbuproveedor'));

				$('.btn-success').val('Modificar');
				$('.btn-danger').removeClass('no');
			});

			//Boton limpiar campos
			$('.btn-danger').click(function() {
				$('.btn-success').val('Agregar');
				$('input[name=idProveedor]').val('');
				$('input[name=nombreProveedor]').val('');
				$('input[name=cuitProveedor]').val('');
				$('input[name=condIvaProveedor]').val('');
				$('input[name=direccionProveedor]').val('');
				$('input[name=localidadProveedor]').val('');
				$('input[name=telefonoProveedor]').val('');
				$('input[name=contactoProveedor]').val('');
				$('input[name=bancoProveedor]').val('');
				$('input[name=cbuProveedor]').val('');
				$('.btn-danger').addClass('no');
			});

			//Validacion de formulario

			$("#formProveedor").validate();
		
		
		</script>