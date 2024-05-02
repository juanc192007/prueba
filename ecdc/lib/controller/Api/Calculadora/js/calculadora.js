				$(document).ready(function ($) {
					$('#CalckDinero').css("display","none");
					$('#CalckKms').css("display","none");
					
					
					$('#calculo').change(function(){
						
						$('#ValorDinero').val(null);
						$('#valorKms').val(null);
						$('#RespCalculo').html("");
						
						var calculo = $('#calculo').val();
						console.log(calculo);
						if(calculo == 1){
								$('#CalckKms').css("display","block");
								$('#CalckDinero').css("display","none");
								//$('#valorKms').val("");
							} else {
								$('#CalckDinero').css("display","block");
								$('#CalckKms').css("display","none");
								//$('#ValorDinero').val("");
								
							}
						
						
					});
						$('#btnCalcular').click(function(){
							var vehiculo = $('#vehiculo').val();
							var calculo = $('#calculo').val();
							var valorDinero = $('#ValorDinero').val();
							var valorKms = $('#valorKms').val();
								
							if(vehiculo == ""){
								alert ("Seleccione Vehiculo");
								return;
							}
							
							if(calculo == ""){
								alert ("Seleccione Cálculo");
								return;
							}
							
							//console.log(valorKms);
							//console.log(valorDinero);
							if(valorDinero == "" && valorKms == "")
							{
								alert ("Ingrese valor");
								return;
							}
							
							var datos = {
								"vehiculo": vehiculo,
								"calculo" : calculo,
								"valorDinero":valorDinero,
								"valorKms": valorKms
							};
							
							$.ajax({
								  method: "POST",
								  url:'https://elcomerciodecali.com.co/lib/controller/Api/Calculadora/calculo/gasolina.php',
								  data: datos,
								  dataType : 'html',
								  success : function(data) {
									$('#RespCalculo').html(data);
								  }	
								});
								  
							
							
							
						});
						
			});