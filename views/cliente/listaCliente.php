<?php require_once 'classes/persona/persona.php'; $personaList=new persona(); $personas=$personaList->
	personasDisponibles(); ?>
	<h1>
		Clientes
	</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-body ">
					<div style="padding-bottom: 10px; text-align: right;">
						<label for="txtPersona">
							Buscar:
						</label>
						<input type="search" style="width:375px" id="txtPersona" class="txtPersona" placeholder="Escriba el Nombre que desea encontrar y presione la ENTER" autofocus />
						&nbsp;&nbsp;&nbsp;
						<input type="button" value="Nuevo" style="width: 100px;" class="buttonPersonaNuevo btn btn-sm btn-success" onclick="javascript:document.getElementById('ver').style.display = 'block'"/>
					</div>
					<div class="scrol">
						<table class="table table-condensed" id="tblPersona">
							<thead class="btn-success">
								<tr style="text-align: center;">
									<td style="height:30px; width: 8%;">
										<strong>
											Mod
										</strong>
									</td>
                                    <td style="width:10%">
										<strong>
											DNI
										</strong>
									</td>
									<td style="width:28%">
										<strong>
											Nombre
										</strong>
									</td>
									<td style="width:20%">
										<strong>
											Direccion
										</strong>
									</td>
									<td style="width:17%">
										<strong>
											Telefono
										</strong>
									</td>
									<td style="width:17%">
										<strong>
											Celular
										</strong>
									</td>
                                    
                                    <td style="width:17%">
										<strong>
											C.C.
										</strong>
									</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($personas as $persona) { 
								   
								    if ( $persona["codigoVendedor"] ==null){?>
									<tr style='text-align: center'>
                                        <td>
											<a  class="editButtonPersona" name="editPersona"  data-trabajopersona="<?php echo $persona['trabajoPersona']?>" data-dnipersona="<?php echo $persona['dniPersona']?>" data-nombrepersona="<?php echo $persona['nombrePersona']?>" data-teltrabajopersona="<?php echo $persona['telTrabajoPersona']?>" data-cuentacorrientepersona="<?php echo $persona['cuentaCorrientePersona']?>" data-localidadpersona="<?php echo $persona['localidadPersona']?>" data-fechanacpersona="<?php echo $persona['fechaNacPersona']?>" data-direccionpersona="<?php echo $persona['direccionPersona']?>" data-facebookpersona="<?php echo $persona['facebookPersona']?>" data-apellidopersona="<?php echo $persona['apellidoPersona']?>" data-celupersona="<?php echo $persona['celuPersona']?>" data-telefonopersona="<?php echo $persona['telefonoPersona']?>" data-idpersona="<?php echo $persona['idPersona']?>">
											<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
											</a>
										</td>
                                        <td>
											<?php echo $persona['dniPersona']?>
										</td>
                                       	<td>
											<?php echo $persona['nombrePersona']. " ".$persona[ 'apellidoPersona']?>
										</td>
										<td>
											<?php echo $persona['direccionPersona']?>
										</td>
										<td>
											<?php echo $persona['telefonoPersona']?>
										</td>
										<td>
											<?php echo $persona['celuPersona']?>
										</td>
                                        <td>
											<?php echo $persona['cuentaCorrientePersona']?>
										</td>
									</tr>
									<?php }}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>