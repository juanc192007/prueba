<?php


if(isset($_POST["vehiculo"])){
	extract($_REQUEST);
	
	$vehiculos = Array(
	
		"1" => 40, // Chevrolet Spark 1.0 cc 50 kms x galon
		"2" => 57, // Chevrolet Spark GT 1.206 cc 67 kms x galon
		"3" => 40, // Kia Picanto 50 kms x galon
		"4" => 40, // Renault Twingo 50 kms x galon
		"5" => 40, // Renault Logan  2019 - 2020 50 kms x galon
		"6" => 40, // Renault Sandero 1.6 cc 50 kms x galon	
	
	);
	
	$PrecioGasolina = (12211);
	
	
	if($valorKms){
		$kmsXgalon = $vehiculos[$vehiculo]; 
		$calculo = (($valorKms*2) * 1)/$kmsXgalon;
		echo 'Para recorrer ida y vuelta '.$valorKms.' Kms necesita '.round($calculo,2) .' Galones que cuestan: $'.round($calculo*$PrecioGasolina);
	}	
	
	
	if($valorDinero){
		$kmsXgalon = $vehiculos[$vehiculo];
		$calculo = ($valorDinero * $kmsXgalon)/$PrecioGasolina;
		echo 'Con $'.round($valorDinero).' puede recorrer '.round($calculo).' Kms';
		
	}
	
	

}



function getDistance($addressFrom, $addressTo, $unit){
    //Change address format
    $formattedAddrFrom = str_replace(' ','+',$addressFrom);
    $formattedAddrTo = str_replace(' ','+',$addressTo);
    
    //Send request and receive json data
    $geocodeFrom = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
    $outputFrom = json_decode($geocodeFrom);
    $geocodeTo = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false');
    $outputTo = json_decode($geocodeTo);
    
    //Get latitude and longitude from geo data
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;
    
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return ($miles * 1.609344).' km';
    } else if ($unit == "N") {
        return ($miles * 0.8684).' nm';
    } else {
        return $miles.' mi';
    }
}


	


?>
