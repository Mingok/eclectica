<style type="text/css">
#dis{
text-align:center;
height: 20px;
width: 400px;
color:#000;
}
#informacion,#elemento{
    display: none;padding-top:20px;
}
</style>
<script type="text/javascript">
	
	
	 
$(document).ready(function(){
    
    $('#submit').click(function(){
        var password=$('#pass').val();
            if(!(password=="1q2w3e")){
                $('#dis').slideDown().html('<span id="error">Incorrecto !!! intente denuevo</span>');
                return false;
            }else{
                $('#form').bind('submit', function(){
                 parent.$.fancybox.close();
                 return false;
                }); 
           
            }
       });
     
      $("#ancla").fancybox({
        'width': '75%',
        'height': '55%',
        'autoScale': false,
        'closeEffect' : 'elastic',
        closeBtn:false,
        closeClick: false,
        hideOnOverlayClick:false,
        hideOnContentClick:false,
        helpers: {
				overlay: {
					closeClick: false
				} // prevents closing when clicking OUTSIDE fancybox 
			}
      });
      
  
   $("#ancla").eq(0).trigger('click');   
  
});
</script>
<div id="elemento">
	<div id="informacion">
		<a id="ancla" href="#informacion" title=""></a>
		<fieldset style="width:450px; height: 152px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Confirme Acceso
					</h3>
				</div>
				<div class="panel-body">
					<label id="dis">
					</label>
					<form method="post" id="form" action="">
						Clave: &nbsp;&nbsp;&nbsp;&nbsp;
						<input type="password" name="pass" id="pass" />
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="submit"class="btn btn-sm btn-success" id="submit"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="home"class="btn btn-sm btn-primary" value="Cancelar" onclick="parent.location='./index.php'"/>
					</form>
				</div>
			</div>
		</fieldset>
	</div>
</div>
   <div class="row">
	<div class="col-md-12">
		<form action="actions/empleado/guardarEmpleado.php" class="formcliente" id="formcliente">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Datos del cliente
					</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="height: 35px;">
						<div class="col-md-4" style="text-align: right;">
							<label for="nombrePersona"  style="width: 120px;">
								Nombre:
							</label>
							<input type="text" id="nombrePersona" name="nombrePersona" title="Ingrese Nombre"  style="width: 120px;" maxlength="50px" placeholder="Nombre" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="apellidoPersona"  style="width: 120px;">
								Apellido:
							</label>
							<input type="text" id="apellidoPersona" name="apellidoPersona"  style="width: 120px;" title="Ingrese Apellido" maxlength="50px" placeholder="Apellido" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="celuPersona"  style="width: 120px;">
								Celular:
							</label>
							<input type="text" id="celuPersona" name="celuPersona"  style="width: 120px;" title="Ingrese Celu" placeholder="Ingrese" required required/>
						</div>
					</div>
					<div class="row" style="height: 35px;">
						<div class="col-md-4" style="text-align: right;">
							<label for="localidadPersona"  style="width: 120px;">
								Localidad:
							</label>
							<input type="text" id="localidadPersona" name="localidadPersona" style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="direccionPersona"  style="width: 120px;">
								Direccion:
							</label>
							<input type="text" id="direccionPersona" name="direccionPersona"  style="width: 120px;" maxlength="50px" title="Ingrese CONDICION" placeholder="Ingrese" required />
						</div>
						<div class="col-md-4" style="text-align: right;">
							<label for="telefonoPersona"  style="width: 120px;">
								Telefono:
							</label>
							<input type="text" id="telefonoPersona" name="telefonoPersona"  style="width: 120px;" maxlength="50px" title="Ingrese Telefono" placeholder="Ingrese" required />
						</div>
					</div>
                    <div class="row" style="height: 35px;">
						<div class="col-md-4" style="text-align: right;">
							<label for="dniPersona"  style="width: 120px;">
								DNI:
							</label>
							<input type="text" id="dniPersona" name="dniPersona" style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese" required />
						</div>
						<div class="col-md-4" style="text-align: right; height: 55px;">
							<label for="fechaNacPersona"  style="width: 120px;">
								F. Nacimiento:
							</label>
							<input type="date" id="fechaNacPersona" name="fechaNacPersona" title="Ingrese Fecha" required />
						</div>
                        <div class="col-md-4" style="text-align: right;">
							<label for="codigoVendedor"  style="width: 120px;">
								Cod. Vendedor:
							</label>
							<input type="password" title="Ingrese Codigo" id="codigoVendedor" name="codigoVendedor" placeholder="Ingrese" style="width: 50px;" maxlength="15" required />
						</div>
					</div>
					<div class="row" style="height: 35px;">
                        <div class="col-md-6" style="text-align: right; height: 55px;">
                            <label for="facebookPersona"  style="width: 120px;">
								Email/Face:
							</label>
							<input type="email" title="Ingrese Email Correcto" id="facebookPersona" name="facebookPersona" placeholder="Ingrese" style="width: 250px;" required />
						</div>
						<div class="col-md-6" style="text-align: right;">
							<input type="hidden" value="" name="idPersona"/>
                            <input type="hidden" value="" name="cuentaCorrientePersona"/> 
							<input type="submit" value="Agregar"  style="width: 120px;" class="btn btn-sm btn-success Persona " />
							<input type="button" value="Limpiar"  style="width: 120px;" class="btn btn-sm btn-danger no"/>
                        </div>
					</div>
				</div>
			</div>
		</form>
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
                $('input[name=dniPersona]').val($(this).data('dnipersona'));
                $('input[name=codigoVendedor]').val($(this).data('codigovendedor'));
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
            //Boton limpiar campos
			$('.btn-danger').click(function() {
			location.reload();
			});
			$('.buttonPersonaNuevo').click(function() {
			 $('input[name=idPersona]').val($(this).data('idpersona'));
                $('input[name=facebookPersona]').val('');
                $('input[name=nombrePersona]').val('');
                $('input[name=apellidoPersona]').val('');
                $('input[name=celuPersona]').val('');
                $('input[name=dniPersona]').val('');
                $('input[name=codigoVendedor]').val('');
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