
<div class="row">
    <div class="col-md-12">
        <form action="actions/empleado/guardarEmpleado.php" class="formEmpleado" id="formEmpleado">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Datos del Empleado
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row" style="height: 40px;">
                        <div class="col-md-4" style="text-align: right;">
                            <label for="nombrePersona"  style="width: 120px;">
                                Nombre:
                            </label>
                            <input type="text" id="nombrePersona" name="nombrePersona" title="Ingrese Nombre"  style="width: 120px;"  class="form-control" placeholder="Nombre" required />
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <label for="apellidoPersona"  style="width: 120px;">
                                Apellido:
                            </label>
                            <input type="text" id="apellidoPersona" name="apellidoPersona"  style="width: 120px;" title="Ingrese Apellido"  class="form-control" placeholder="Apellido" required />
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <label for="celuPersona"  style="width: 120px;">
                                Celular:
                            </label>
                            <input type="text" id="celuPersona" name="celuPersona"  style="width: 120px;" title="Ingrese Celu" placeholder="Ingrese"  class="form-control" required/>
                        </div>
                    </div>
                    <div class="row" style="height: 40px;">
                        <div class="col-md-4" style="text-align: right;">
                            <label for="localidadPersona"  style="width: 120px;">
                                Localidad:
                            </label>
                            <input type="text" id="localidadPersona" name="localidadPersona" style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese"  class="form-control" />
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <label for="direccionPersona"  style="width: 120px;">
                                Direccion:
                            </label>
                            <input type="text" id="direccionPersona" name="direccionPersona"  style="width: 120px;"  class="form-control" title="Ingrese CONDICION" placeholder="Ingrese" required />
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <label for="telefonoPersona"  style="width: 120px;">
                                Telefono:
                            </label>
                            <input type="text" id="telefonoPersona" name="telefonoPersona"  style="width: 120px;"  class="form-control" title="Ingrese Telefono" placeholder="Ingrese" required />
                        </div>
                    </div>
                    <div class="row" style="height: 35px;">
                        <div class="col-md-4" style="text-align: right;">
                            <label for="dniPersona"  style="width: 120px;">
                                DNI:
                            </label>
                            <input type="text" id="dniPersona" name="dniPersona" style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese"  class="form-control"     required />
                        </div>
                        <div class="col-md-4" style="text-align: right; height: 55px;">
                            <label for="fechaNacPersona"  style="width: 120px;">
                                F. Nacimiento:
                            </label>
                            <input type="date" id="fechaNacPersona" name="fechaNacPersona" title="Ingrese Fecha"  class="form-control" style="width: 170px;" required />
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <label for="codigoVendedor"  style="width: 120px;">
                                Cod. Vendedor:
                            </label>
                            <input type="password" title="Ingrese Codigo" id="codigoVendedor" name="codigoVendedor" placeholder="Ingrese" style="width: 150px;"  class="form-control" required />
                        </div>
                    </div>
                    <div class="row" style="height: 35px;">
                        <div class="col-md-6" style="text-align: right; height: 55px;">
                            <label for="facebookPersona"  style="width: 120px;">
                                Email/Face:
                            </label>
                            <input type="email" title="Ingrese Email Correcto" id="facebookPersona" name="facebookPersona" placeholder="Ingrese" style="width: 350px;" class="form-control" required />
                        </div>
                        <div class="col-md-3" style="text-align: right;">
                            <label for="cuentaCorrientePersona"  style="width: 120px;">
                                C.C. Inicial: 
                            </label>
                            <input type="text" id="cuentaCorrientePersona" name="cuentaCorrientePersona"  style="width: 120px;" class="form-control" title="Ingrese LOCALIDAD" placeholder="Ingrese" required />
                        </div>
                        <div class="col-md-3" style="text-align: right;">
                            <input type="hidden" value="" name="idPersona"/>
                            
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
        $('#cuentaCorrientePersona').prop('disabled', true);
        $('html,body').animate({scrollTop: $("#divPersona").offset().top}, 2000);
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
        $('#cuentaCorrientePersona').prop('disabled', false);
        $('.btn-success.Persona').val('Agregar');
        $('#divPersona').show("slow");
        $('.btn-danger').removeClass('no');
         $('html,body').animate({scrollTop: $("#divPersona").offset().top}, 2000);
    });

    //Validacion de formulario

    $("#formEmpleado").validate();


</script>