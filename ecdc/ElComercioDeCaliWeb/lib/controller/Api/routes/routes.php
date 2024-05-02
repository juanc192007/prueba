<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../db.php";


				$routesArray = str_replace("/ElComercioDeCaliWeb/lib/controller/Api","",$_SERVER['REQUEST_URI']);
				$posc = strpos($routesArray, '?');
				if($posc)
				{
					$routesArray = substr($routesArray, 0, $posc);
				}
				$routesArray = explode("/",$routesArray);
				$routesArray = array_filter($routesArray);
			

				/*==============================================
				Validacion para cuando no hay peticion a la Api
				===============================================*/
						if(count($routesArray) == 0){

						$json=array(

							'status' => 404,
							'resultado' => 'Not Foundx'
						);

							echo json_encode($json);
							return;

						}
						
				/*==============================================
				Cuando si hay peticion a la Api
				===============================================*/		
				
				if(count($routesArray) == 1 && isset($_SERVER['REQUEST_METHOD'])){
					
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