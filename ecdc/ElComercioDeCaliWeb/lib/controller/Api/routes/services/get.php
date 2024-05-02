<?php
		require_once "controller/get.controller.php";
var_dump($_REQUEST);
		die('=============================================');
		$tabla = $routesArray[1];
		
		extract($_REQUEST);
		
		if($posc)
		{
			$arrayParametros = $_REQUEST;
		} else {
			$arrayParametros = null;
		}
	
		$response =  new GetController();
		//var_dump($arrayParametros);
		
		$response->getData($tabla,$arrayParametros);

?>