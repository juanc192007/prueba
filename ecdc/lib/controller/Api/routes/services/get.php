<?php
		require_once "controller/get.controller.php";
		extract($_REQUEST);
		
		$arrayParametros=Array();
		$tabla = $tablaPrametro;
		
						
		if($posc)
		{
			$arrayParametros = $_REQUEST;
		} else {
			$arrayParametros = null;
		}
	
		$response =  new GetController();
		$response->getData($tabla,$arrayParametros);

?>