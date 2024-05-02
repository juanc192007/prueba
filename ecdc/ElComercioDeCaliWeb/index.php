<html lang="es">
<head>
  <meta charset="utf-8">
  <title>El Comercio de Cali | Portal de Comercio Electrónico</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	

  <!-- Favicons -->
  <link href="img/logoCc.png" rel="icon">
  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="estilos.css">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="css/alertify.core.css"/>
  <link rel="stylesheet" href="css/alertify.bootstrap.css"/>
  <link rel="stylesheet" href="css/alertify.default.css"/>


  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style_mobile.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contacto@elcomerciodecali.com.co</a>
        <i class="fa fa-phone"></i> +57 3154032966
      </div>
      <div class="social-links float-right">
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#body"><img src="img/logoCc.png" alt="" title="" /></a>
      </div>

    </div>
	
	<div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Inicio</a></li>
          <li><a href="#about">Quienes Somos</a></li>
          <li><a href="#clients">Comercios Registrados</a></li>
          <li><a href="#contact">Contacto</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
	 </div> 
  </header><!-- #header --> 

  
  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
           <!-- <img src="img/about-img.jpg" alt=""> -->
		   <img src="img/cali.jpg" alt=""> 
          </div>

          <div class="col-lg-6 content">
            <h2>Bienvenido al portal de comercio electrónico mas grande del suroccidente colombiano.</h2>
            <h3>Aquí podrá encontrar todo el comercio de la ciudad de cali en un solo sitio.</h3>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Comercio al por mayor y detal.</li>
              <li><i class="ion-android-checkmark-circle"></i> Productos y servicios a la puerta de su casa.</li>
              <li><i class="ion-android-checkmark-circle"></i> Todas las marcas y productos del centro de cali.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- #about -->
<!--==========================
      Seccion de comercios
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Nuestros comercios registrados</h2>
          <p>En esta seccion podrá encontrar todos los locales comerciales que se han registrado con nosotros ofreciendo productos y servicios online de acuerdo a tus necesidades:</p>
        </div>
		
		<div class="filtros-comercios">
			<h3>Filtrar comercios por producto:</h3>
			<form id="form-filters">
					
							<label for="filtro-producto" class="label-filtro">Buscar por nombre / referencia de producto: </label>
							<input type="text" class="text-filtro requerido" id="filtro-producto">
							<label for="filtro-categoria" class="label-filtro">Buscar por categorias de producto: </label>
							<select class="select-filtro requerido" id="filtro-categoria">
							<?php
								ini_set('display_errors', 1);
								ini_set('display_startup_errors', 1);
								error_reporting(E_ALL);
								
								require 'lib/controller/controller.php';
								$controller = new controlller();
								$combo = $controller->cargarCombo();
								echo $combo;
							?>
							</select>
						
						<label for="filtro-marca" class="label-filtro label-marca">Buscar por Marca: </label>
						<select class="select-filtro requerido filtro-marca" id="filtro-marca">
							<?php
							$combo = $controller->cargarComboMarca();
							echo $combo;
						?>
						</select>	
						
						<label for="filtro-centros-comerciales" class="label-filtro label-centroC">Buscar por centro comercial: </label>
						<select class="select-filtro filtro-centro" id="filtro-centros-comerciales">
							<?php
							$combo = $controller->cargarComboCentrosC();
							echo $combo;
						?>
						</select>
							
							
						<label for="filtro-precio" class="label-filtro label-precio">Ordenar por precio </label>
						<select class="select-filtro filtro-precio" id="filtro-precio">
							<option value="asc" selected>más barato</option>
							<option value="desc">más alto</option>
						</select>	
						
						<div class="text-center"><button type="button" id="Filtrar-Comercio">Buscar Comercios</button>
						</div>
					</div>
			</form>
			
		
		<div class="filtros-comercios"><h3>Todos los comercios Registrados:</h3>
			<div class="owl-carousel clients-carousel filtros-comercios">
				<?php
					$tiendas = $controller ->buscarData();
					echo $tiendas;
				?>
		  </div>  
		</div>
	  </div>
	  
	  </div>
	  
    </section><!-- #clients -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contacto</h2>
          <p>Si eres comerciante y deseas tener tu sitio para vender por internet o si ya tienes uno y deseas agregarlo al portal no dudes en comunicarte con nosotros:</p>
        </div>

        <div class="row contact-info">
          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Contacto:</h3>
              <p><a href="tel:+155895548855">3154032966</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">contacto@elcomerciodecali.com.co</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15930.34260872675!2d-76.54278343392114!3d3.450451828722714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a66459e95971%3A0x869dcda54e2f3bb0!2sCOMUNA%203%2C%20Cali%2C%20Valle%20del%20Cauca!5e0!3m2!1ses!2sco!4v1594620338866!5m2!1ses!2sco" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen ></iframe>
      </div>

      <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
    
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
       
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
  <script src="lib/jquery/alertify.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="js/main.js"></script>
  <!--<script src="js/functions.js"></script>-->

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  
							<div class="overlay" id="overlay">
								  <div class="popup" id="popup">
									  <a href="#clients" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fa fa-times"></i></a>
									  <h2>Resultado de la busqueda</h2>
								  <div class="resultados-filtro" id="resultado-comercios"></div>
							</div>
  
  
<!--<div id="dialog-message" title="elcomercio de cali">
  <p>Debe diligenciar alguno de los filtros requeridos</p>
</div>-->
</body>
</html>
