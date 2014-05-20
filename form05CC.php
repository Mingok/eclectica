<?php define( 'EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/'); define( 'EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/'); ?>
	<head>
		<meta http-equiv="content-type" content="text/html" />
		<meta name="author" content="Emmanuel" />
		<title>
			Nombre del programa
		</title>
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap-theme.min.css" type="text/css" />
		
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/lib/jquery.js"></script>
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/dist/jquery.validate.js"></script> 
		<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>bootstrap/bootstrap.min.js">
		</script>
		<script type="text/javascript" src="js/buscar-en-tabla.js">
		</script>
	</head>
    <div class="cuentaC" id="cuentaC">
	<div class="col-md-3">
        <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
                    Actualizar CC
                    </h3>
                </div>
                <div class="panel-body">
                <form action="actions/cliente/actualizaCcCliente.php" class="formCcCliente" id="formCcCliente">
            		<table style="width: 100%;" >
            			<tr style="vertical-align: middle;width: 100px;">
                        	<td style="height:30px; text-align: left;">  <div id="CC" style="width: 100px;"><strong>Debe:</strong>;</div></td>
                         </tr>
                         <tr style="vertical-align: middle;">    
            				<td style="height:30px; text-align: center;">
            					<input type="hidden" value="" name="idPersona"/>
                                 <input type="hidden" value="" name="cuentaCorrientePersona"/> 
            					Entrega: &nbsp;
            					<input type="text" name="entregaCliente" placeholder="ingresar" style="width: 100px;" class="textCaracteristicas"/>
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