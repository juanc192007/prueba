

					$(document).ready(function ($) {
						
						
					 //click para filtrar comercios y mostrar ventana emergente
				  
						$('#Filtrar-Comercio').click(function(){
						
						//validar que se diligencie por lo menos un filtro para la busqueda de comercios:
								
								$('.requerido').each(function(){
									valor = $(this).val();
									if( valor != '')
									{
										valorReq = 1;
										
									} 
									
								});
								
								console.log(valor);							
								
								
								if(valorReq == 0)
								{
								
										alert('Debe diligenciar un filtro');
										//$('.requerido').css('border-color','red');
									
								} else {
								
											
											//$('.requerido').css('border-color','');
											$('#overlay').addClass('active');
											$('#popup').addClass('active');
											$('.owl-carousel ').hide();
											$('#header ').hide();
											
											
												var filtro = {
													"producto"  :    $('#filtro-producto').val(),
													"categoria" :    $('#filtro-categoria').val(),
													"marca"	    :    $('#filtro-marca').val(),
													"Ccomercial":    $('#filtro-centros-comerciales').val(),
													"orderByPrecio": $('#filtro-precio').val(),
												};
												
													$.ajax({
															url : 'http://elcomerciodecali.com.co/lib/controller/controller.php',
															data : filtro,
															type : 'POST',
															dataType : 'html',
															success : function(data) {
																$('#resultado-comercios').html(data);
															}

														});
														
											
										}			
									
									
							});
										
						
					});