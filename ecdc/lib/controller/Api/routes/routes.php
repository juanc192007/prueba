<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../db.php";

				$routesArray = $_SERVER['REQUEST_URI'];
				$routesArray = str_replace("lib","",$routesArray);
				$routesArray = str_replace("controller","",$routesArray);
				$routesArray = str_replace("Api","",$routesArray);	
				$routesArray = explode("/",$routesArray);
				$routesArray = array_filter($routesArray);
				
				if(count($routesArray) >= 1) {
				$posc = strpos($routesArray[4], '?');
					if($posc)
					{
						$tablaPrametro = substr($routesArray[4], 0, $posc);
					}else {
						$tablaPrametro = $routesArray[4];
					}
				}
				/*==============================================
				Validacion para cuando no hay peticion a la Api
				===============================================*/
						if(count($routesArray) == 0){

						$json=array(

							'status' => 404,
							'resultado' => 'Not Found'
						);

							echo json_encode($json);
							return;

						}
						
				/*==============================================
				Cuando si hay peticion a la Api
				===============================================*/		
				if(count($routesArray) >= 1 && isset($_SERVER['REQUEST_METHOD'])){
					
				/*==============================================
				Peticion GET
				===============================================*/	

					if($_SERVER['REQUEST_METHOD'] == 'GET'){
						
						include "services/get.php";
						
					}
					
				/*==============================================
				Peticion POST
				===============================================*/	

					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						
						$json=array(

							'status' => 200,
							'resultado' => 'Solicitud POST'
						);

							echo json_encode($json);
							return;
						
					}
					
					
					
				/*==============================================
				Peticion PUT
				===============================================*/	

					if($_SERVER['REQUEST_METHOD'] == 'PUT'){
						
						$json=array(

							'status' => 200,
							'resultado' => 'Solicitud PUT'
						);

							echo json_encode($json);
							return;
						
					}
					
				/*==============================================
				Peticion DELETE
				===============================================*/	

					if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
						
						$json=array(

							'status' => 200,
							'resultado' => 'Solicitud DELETE'
						);

							echo json_encode($json);
							return;
						
					}
				}
				

?>