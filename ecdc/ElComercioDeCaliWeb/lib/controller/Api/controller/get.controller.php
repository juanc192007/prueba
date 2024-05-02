<?php

	include_once "../controller.php";
	
	class GetController {
		
	
		public function getData($tabla,$arrayParametros){
			
			
			
			$controlller = new controlller();
			$response = $controlller->GetData($tabla,$arrayParametros);
			$this->fncResponse($response);
			
		}
		
		public function fncResponse($response){
			
				if(!empty($response)){
				
				$json=array(

								'status' => 200,
								'total' => count($response),
								'results' => $response
							);

							
		} else {
				$json=array(

							'status' => 404,
							'results' => 'Not Found'
						);
			
		}		
							echo json_encode($json, http_response_code($json['status']));
							return;
	  }
	
	}

?>