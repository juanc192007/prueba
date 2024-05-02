<html>
	<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link href="css/style.css" rel="stylesheet">
	</head>
	
	<body > <center>
				<form id="frm">
					<div id="head">					
						<div id="containner">
						
							<h1>Calculadora de gasolina online</h1>
							<h3>Seleccione su vehiculo:</h3>
							<select id="vehiculo">
							<option></option>
							<option value="1">Chevrolet Spark 1.0 cc</option>
							<option value="2">Chevrolet Spark GT 1.206 cc</option>
							<option value="3">Kia Picanto</option>
							<option value="4">Renault Twingo</option>
							<option value="5">Renault Logan  2019 - 2020</option>
							<option value="6">Renault Sandero 1.6 cc</option>
							</select>
							
							<h3>Que desea Calcular?</h3>
							<select id="calculo">
							<option></option>
							<option value="1">Tengo la distancia en Kms y deseo saber cuanta gasolina necesito para recorrer esa distancia</option>
							<option value="2">Necesito saber cuantos Kms puedo recorrer con una cantidad de dinero</option>
							</select>						
						</div><br>	
					</div>
						
						<div id="CalckKms" class="div-background">
						<h3>Busca los kms de tu destino:</h3>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9472.57785967056!2d-76.49546951799796!3d3.416226134753745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1ses-419!2sco!4v1685381765054!5m2!1ses-419!2sco" width="100%" height="30%" frameborder="0" style="border:0" allowfullscreen></iframe>
							<h3>Ingrese los kilometros de distancia calculados por el mapa anterior:</h3>
							<input type="text" id="valorKms" class="valorKms">
							<br><br>
						</div>
						
						<div id="CalckDinero" class="div-background">
							<h3>Ingrese la cantidad de dinero para tanquear</h3>
							<input type="text" id="ValorDinero" class="ValorDinero">
							<br><br>
						</div>
					
					<br>
							<button type="button" id ="btnCalcular">Calcular</button>
							
					<br><br><br>
					<h2><div id="RespCalculo" class="div-background"></div></h2>
				</form>
				</center>
				<script src="js/jquery/jquery.min.js"></script>
				<script src="js/calculadora.js"></script>
				
				
	
	<body>
	
	
	


</html>
