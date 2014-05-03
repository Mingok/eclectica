<div class="row">
	<div class="col-md-8">
		<form action="actions/persona/guardarPersona.php" class="formcliente" id="formcliente">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Datos del cliente
					</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="height: 35px;">
						<div class="col-md-4" style="text-align: right;">
							<label for="nombrePersona" style="width: 100px;">
								Nombre:
							</label>
							<input type="text" id="nombrePersona" name="nombrePersona" title="Ingrese Nombre" style="width: 100px;" maxlength="50px" placeholder="Nombre" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="apellidoPersona" style="width: 100px;">
								Apellido:
							</label>
							<input type="text" id="apellidoPersona" name="apellidoPersona" style="width: 100px;" title="Ingrese Apellido" maxlength="50px" placeholder="Apellido" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="celuPersona" style="width: 100px;">
								Celular:
							</label>
							<input type="text" id="celuPersona" name="celuPersona" style="width: 100px;" title="Ingrese Celu" placeholder="Ingrese" required required/>
						</div>
					</div>
					<div class="row" style="height: 35px;">
						<div class="col-md-4" style="text-align: right;">
							<label for="localidadPersona" style="width: 100px;">
								Localidad:
							</label>
							<input type="text" id="localidadPersona" name="localidadPersona" style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="direccionPersona" style="width: 100px;">
								Direccion:
							</label>
							<input type="text" id="direccionPersona" name="direccionPersona" style="width: 100px;" maxlength="50px" title="Ingrese CONDICION" placeholder="Ingrese" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="telefonoPersona" style="width: 100px;">
								Telefono:
							</label>
							<input type="text" id="telefonoPersona" name="telefonoPersona" style="width: 100px;" maxlength="50px" title="Ingrese LOCALIDAD" placeholder="Ingrese" required />
						</div>
					</div>
					<div class="row" style="height: 35px;">
						<div class="col-md-6" style="text-align: right;">
							<label for="facebookPersona" style="width: 100px;">
								Email/Face:
							</label>
							<input type="email" title="Ingrese Email Correcto" id="facebookPersona" name="facebookPersona" placeholder="Ingrese" style="width: 250px;" required />
						</div>
						<div class="col-md-6" style="text-align: right; height: 55px;">
							<label for="fechaNacPersona" style="width: 100px;">
								Contacto:
							</label>
							<input type="date" id="fechaNacPersona" name="fechaNacPersona" title="Ingrese Fecha" required />
						</div>
					</div>
					<div class="row" style="height: 35px;">
						<div class="col-md-12" style="text-align: right;">
							<input type="hidden" value="" name="idPersona"/>
                            <input type="hidden" value="" name="cuentaCorrientePersona"/> 
							<input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success Persona " />
							<input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger no"/>
                            <input type="button" value=">>"  id="Actualizar" class="btn btn-info" />
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<div class="cuentaC" id="cuentaC">
	<div class="col-md-4">
        <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
                    Actualizar CC
                    </h3>
                </div>
                <div class="panel-body">
                <form action="actions/persona/actualizaCcPersona.php" class="formCcCliente" id="formCcCliente">
            		<table style="width: 100%;" >
            			<tr style="vertical-align: middle;width: 200px;">
                        	<td style="height:30px; text-align: left;">  <div id="CC" style="width: 100px;">sdasdasdasd;</div></td>
                         </tr>
                         <tr style="vertical-align: middle;">    
            				<td style="height:30px; text-align: center;">
            					<input type="hidden" value="" name="idPersona"/>
                                 <input type="hidden" value="" name="cuentaCorrientePersona"/> 
            					Entrega: &nbsp;
            					<input type="text" name="entregaCliente" placeholder="ingresar" style="width: 120px;" class="textCaracteristicas"/>
            					<input type="submit" name="pNuevo" value="Actualizar" class="btn btn-sm btn-success" />
            				</td>
                            <td><strong>
									
										</strong></td>
            			</tr>
            		</table>
                    </form>
                </div>
                </div>
                </div>
	</div>
</div>
</div>
<script type="text/javascript">
        $('.buttonVerHistorial').click(function() {
				$('#verHistorial').show("slow");
                $('html,body').animate({
                scrollTop: $("#verHistorial").offset().top}, 2000);
				
			});
            
		$('.editButtonPersona').click(function() {
  		        $('input[name=idPersona]').val($(this).data('idpersona'));
                $('input[name=facebookPersona]').val($(this).data('facebookpersona'));
                $('input[name=nombrePersona]').val($(this).data('nombrepersona'));
                $('input[name=apellidoPersona]').val($(this).data('apellidopersona'));
                $('input[name=celuPersona]').val($(this).data('celupersona'));
                $('input[name=telefonoPersona]').val($(this).data('telefonopersona'));
                $('input[name=localidadPersona]').val($(this).data('localidadpersona'));
                $('input[name=direccionPersona]').val($(this).data('direccionpersona'));
                $('#fechaNacPersona').val($(this).data('fechanacpersona'));
                $('input[name=cuentaCorrientePersona]').val($(this).data('cuentacorrientepersona'));
                $('.btn-success.Persona').val('Modificar');
                $('#divPersona').show(1000);
                $('#cuentaC').hide();
                $('#verHistorial').hide(2000);
				$('.btn-success.Prov').val('Modificar');
				$('.btn-danger').removeClass('no');
			});
            $('#Actualizar').click(function() {
				$('#cuentaC').show("3000");
                $('#CC').html('<strong>Debe:</strong>'+$('input[name=cuentaCorrientePersona]').val());
    		});
			//Boton limpiar campos
			$('.btn-danger').click(function() {
			location.reload();
			});
			$('.buttonPersonaNuevo').click(function() {
			 $('input[name=idPersona]').val($(this).data('idpersona'));
                $('input[name=facebookPersona]').val('');
                $('input[name=nombrePersona]').val('');
                $('input[name=apellidoPersona]').val('');
                $('input[name=celuPersona]').val($(this).data('celupersona'));
                $('input[name=telefonoPersona]').val('');
                $('input[name=localidadPersona]').val('');
                $('input[name=direccionPersona]').val('');
                $('#fechaNacPersona').val('');
                $('input[name=cuentaCorrientePersona]').val('');
             
       			$('.btn-success.Persona').val('Agregar');
    			$('#divPersona').show("slow");
       			$('.btn-danger').removeClass('no');
        	});

			//Validacion de formulario

			$("#formcliente").validate();
		
		
		</script>