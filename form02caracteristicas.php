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
  
    <?php 
	require_once 'classes/empresa/empresa.php'; 
	$empresaList = new empresa(); 
	$empresas = $empresaList->datosEmpresa();
	$empresa = null;
	if (is_array($empresas)) {
		$empresa = array_shift($empresas);
	}
?>
<h1 style="text-align: left;">
	&nbsp;Caracteristicas&nbsp;
</h1>
<div class="row">
	<div class="col-md-4"><?php include_once 'views/tela/abmTela.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/color/abmColor.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/marca/abmMarca.php'; ?></div>
</div>
<div class="row">
	<div class="col-md-4"><?php include_once 'views/talle/abmTalle.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/estampado/abmEstampado.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/estacion/abmEstacion.php'; ?></div>
</div>
<div class="row">
	<div class="col-md-7"><?php include_once 'views/tipoVenta/abmTipoVenta.php'; ?></div>
	<div class="col-md-5"><img src="./imagenes/logos/<?php echo $empresa['logoEmpresa'];?>"  style="border: 5px solid Darkred; height: 200px;"/></div>
</div>