<?php
function getCondicion(){
    require_once (__DIR__.'\..\..\base\manejoMySQL.php');
    $objManejoMySQL= new manejoMySQL();
	$strSql="SELECT * FROM tipoventa WHERE grupoTipoVenta='".$_POST["grupoTipoVenta"]."'";
    
  $arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);

  if($arrResultado){
    if(mysql_num_rows($arrResultado)>0){
		$resp.="<option value=''>- Elija Una -</option>";
        while($r=mysql_fetch_object($arrResultado)){
          $resp.="<option value='".$r->idTipoVenta."'>".$r->detalleTipoVenta."</option>";
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