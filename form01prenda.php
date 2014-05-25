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
		<?php include_once 'views/prenda/listaPrenda.php'; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php include_once 'views/prenda/abmPrenda.php'; ?>
	</div>
</div>