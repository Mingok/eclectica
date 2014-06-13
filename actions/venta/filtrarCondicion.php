<?php
function getCondicion(){
    require_once (__DIR__.'\..\..\base\manejoMySQL.php');
    $objManejoMySQL= new manejoMySQL();
	$strSql="SELECT * FROM tipoventa WHERE grupoTipoVenta='".$_POST["grupoTipoVenta"]."'";
    
  $arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
$resp ='';
  if($arrResultado){
    if(count($arrResultado)>0){
		$resp.="<option value=''>- Elija Una -</option>";
        foreach ($arrResultado as $arrResultado1){
          $resp.="<option value='".$arrResultado1["idTipoVenta"]."'>".$arrResultado1["detalleTipoVenta"]."</option>";
            }
    }else $resp.="<option value='1'>".$strSql."</option>
                    <option value='2'>- Elija Una -</option>
                    <option value='3'>- Elija Una -</option>
                    <option value='4'>- Elija Una -</option>
                    <option value='5'>- Elija Una -</option>
                    <option value='6'>- Elija Una -</option>";
    }else $resp="ERROR";
    echo $resp;
}

if($_POST){
	switch($_POST["tarea"]){
	case "filtraCondicion":getCondicion();
			break;
	}
}
?>