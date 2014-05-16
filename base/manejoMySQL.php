<?php
Class manejoMySQL {
	var $host='localhost';
	var $database='eclectica';
	var $username='root';
	var $password='';
	
	function setDatabase($strDataBase){
		$this->database=$strDataBase;
	}

	function setHost($strHost){
		$this->host=$strHost;
	}
	
	function consultar($strSql,&$arrResultado){
		$conexion = mysqli_connect($this->host,$this->username,$this->password,$this->database);
		$result = null;
		$objRs = mysqli_query($conexion,$strSql);
        if(!empty($objRs)) {
           $arrResultado = mysqli_fetch_all($objRs,MYSQLI_ASSOC); 
        }
		mysqli_close($conexion);
	}
}
?>