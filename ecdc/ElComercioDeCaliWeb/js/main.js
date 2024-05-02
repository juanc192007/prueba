jQuery(document).ready(function ($) {

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Stick the header at top on scroll
  $("#header").sticky({
    topSpacing: 0,
    zIndex: '50'
  });

  // Intro background carousel
  $("#intro-carousel").owlCarousel({
    autoplay: true,
    dots: false,
    loop: true,
    animateOut: 'fadeOut',
    items: 1
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function (e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function (e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function (e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (!$('#header').hasClass('header-fixed')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });


  // Porfolio - uses the magnific popup jQuery plugin
  $('.portfolio-popup').magnificPopup({
    type: 'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function (openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 3
      }
    }
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });
  
		$('.requerido').click(function(){
			$(this).css('border-color','');
		});	
			//click para filtrar comercios y mostrar ventana emergente
					 
						$('#Filtrar-Comercio').click(function(){
							var valorReq = 0;
							var valor;
						
						//validar que se diligencie por lo menos un filtro para la busqueda de comercios:
								
								$('.requerido').each(function(index)
								{
									 
									if(this.value) 
									{
										valor = this.value;									
									}
									
								});
								
								
								if (valor)
								
								{
								
											$('.requerido').css('border-color','');
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
															 url : 'https://artecelestial.com.co/ElComercioDeCaliWeb/lib/controller/controller.php',
															//url : 'http://localhost:81/public_html/lib/controller/controller.php',
															//url : 'http://localhost:/ElComercioDeCaliWeb/lib/controller/controller.php',
															data : filtro,
															type : 'POST',
															dataType : 'html',
															success : function(data) {
																$('#resultado-comercios').html(data);
															}

														});
														
											
										}	else 
										{	
												$('.requerido').css('border-color','red');
												alertify.alert("Debe seleccionar algun filtro requerido");
												
										}		
									
									
							});
			
			
//Cerrar ventana emergente de filtro de comercios

			$('#btn-cerrar-popup').click(function(){
				$('#overlay').removeClass('active');
				$('#popup').removeClass('active');
				$('.owl-carousel ').show();
				$('#header ').show();				
			});

			
			
 //bloquear campo de producto en filtro de comercios

			$('#filtro-categoria').change(function(){
				var valueSelect = $('#filtro-categoria');
				
				
				if(valueSelect.val()!=0 || valueSelect.val()!="")
				{
					$('#filtro-producto').val('');
					$('#filtro-producto').attr('readonly', true); 
				} 
				else
				{
					$('#filtro-producto').attr('readonly', false); 
				}
			});
			
// bloquear select de categorias en filtro de comercios

			$('#filtro-producto').keyup(function(){
				
				$('#filtro-producto').attr('readonly', false); 
				$('#filtro-categoria').val('');
				$('#filtro-categoria').attr('readonly', true);
				
			});
			
//Cargar combo de marcas por categoria seleccionada:
		
	
		
		
				$('#filtro-categoria').change(function(){
					
					var idCategoriaHtml = $(this).attr("id");
					var valueCategoria = $(this).val();
					
					var filtro = 
					{
						"idCategoriaHtml"  : idCategoriaHtml,
						"valueCategoria" : valueCategoria
					};
						
							$.ajax({
									 url : 'https://artecelestial.com.co/ElComercioDeCaliWeb/lib/controller/controller.php',
									//url : 'http://localhost:81/public_html/lib/controller/controller.php',
									//url : 'http://localhost:/ElComercioDeCaliWeb/lib/controller/controller.php',
									data : filtro,
									type : 'POST',
									dataType : 'html',
									success : function(data) {
										$('#filtro-marca').html(data);
									}

								});

					
				
				});	
				

//Cargar combo de categoria por marca seleccionada:
	
	
	
				// $('#filtro-marca').change(function(){
					
					// var idCategoriaHtml = $(this).attr("id");
					// var valueCategoria = $(this).val();
					
					// var filtro = 
					// {
						// "idCategoriaHtml"  : idCategoriaHtml,
						// "valueCategoria" : valueCategoria
					// };
						
							// $.ajax({
									// url : 'http://elcomerciodecali.com.co/lib/controller/controller.php',
									// data : filtro,
									// type : 'POST',
									// dataType : 'html',
									// success : function(data) {
										// $('#filtro-categoria').html(data);
									// }

								// });

					
				
				// });		
				
				

});


