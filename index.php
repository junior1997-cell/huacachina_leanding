<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrate ya!! | Huacachina del Norte</title>

	<!-- Icono Huacachina Del Norte -->
	<link rel="apple-touch-icon" href="assets/img/icons/toggle-dark.png">
	<link rel="shortcut icon" href="assets/img/icons/toggle-dark.png">

	<!-- bootstrap 5.0.2 -->
	<link rel="stylesheet" href="plugins/bootstrap-5.0.2-dist/css/bootstrap.min.css">
	<!-- Font Awesome 6.2 -->
	<link rel="stylesheet" href="plugins/fontawesome-free-6.2.0/css/all.min.css" />
	<!-- Toastr -->
	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
	<!-- New diseño -->
	<link rel="stylesheet" href="assets/css/style_form.css">

	<!-- Meta Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1255509375439962');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1255509375439962&ev=PageView&noscript=1" />
	</noscript>
	<!-- End Meta Pixel Code -->

</head>

<body>
	<section class="height-fondo-img">

		<div class="container-fluid ">
			<div class="row espacio-laterial">
				<!-- :::::::::::::::::::::: SIGUENOS :::::::::::::::::: -->
				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="iconNav">
						<span>Siguenos en:</span>
						<div class="">
							<a class="landing-facebook" href="#" target="_blank"><img src="assets/img/icons/face.png" alt=""></a>
							<a class="landing-instagram" href="#" target="_blank"><img src="assets/img/icons/instagram.png" alt=""></a>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<!-- :::::::::::::::::::::: LOGO :::::::::::::::::: -->
								<div class="col-lg-12">
									<div class="logo subir-img">
										<a href=""><img src="assets/img/icons/logo.svg" alt=""></a>
									</div>
								</div>

								<!-- :::::::::::::::::::::: TITULO :::::::::::::::::: -->
								<div class="col-lg-12 mt-1">
									<div class="texto">
										<h4 class="blanco">¡REGISTRATE HOY!</h4>
										<h4 class="gr landing-titulo"><i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></h4>
										<p class="blanco landing-descripcion"></p>
									</div>
								</div>
							</div>
						</div>

						<!-- :::::::::::::::::::::: FORMULARIO :::::::::::::::::: -->
						<div class="col-lg-6 mt-5">
							<div class="form">
								<form name="form-agregar-correo" id="form-agregar-correo" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group mb-3">
												<label for="nombres_apellidos" class="form-label">Nombres y Apellidos<span class="red">*</span></label>
												<input type="text" class="form-control" id="nombres_apellidos" name="nombres_apellidos">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group mb-3">
												<label for="telefono" class="form-label">Número de teléfono<span class="red">*</span></label>
												<input type="tel" class="form-control" id="telefono" name="telefono">
											</div>
										</div>
									</div>
									<button type="submit" style="display: none;" id="submit-form-correo">Submit</button>
								</form>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<button type="button" class="enviar" id="guardar_registro_correo">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- :::::::::::::::::::::: CONTACTANOS :::::::::::::::::: -->
				<div class="col-md-6 col-lg-3 col-xl-3 mt-5">
					<div class="contactos">
						<h5>Contáctanos</h5>
						<div class="cel"> <a href="tel:+"></a>
							<a class="text-white text-decoration-none landing-celular" href="tel:+51937863276">
								<img src="assets/img/icons/Icono-Telefono.png" alt="">
								<span class="blanco hover-color"> <i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></span>
							</a>
						</div>
						<div class="web">
							<a class="text-white text-decoration-none landing-web" href="https://www.huacachinadelnorte.pe/" target="_blank">
								<img src="assets/img/icons/Icono-web.png" alt="">
								<span class="hover-color"><i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></span>
							</a>
						</div>
						<div class="face">
							<a class="text-white text-decoration-none landing-facebook" href="https://www.facebook.com/huacachinadelnortep" target="_blank">
								<img src="assets/img/icons/Icono-facebook.png" alt="">
								<span class="hover-color"><i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></span>
							</a>
						</div>
						<div class="insta">
							<a class="text-white text-decoration-none landing-instagram" href="https://www.instagram.com/huacachinadelnorte/" target="_blank">
								<img src="assets/img/icons/Icono-instagram.png" alt="">
								<span class="hover-color"><i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></span>
							</a>
						</div>

					</div>
				</div>

				<!-- :::::::::::::::::::::: MAPA :::::::::::::::::: -->
				<div class="col-md-6 col-lg-3 col-xl-3 mt-5">
					<div class="hubi">
						<h5>Oficina:</h5>
						<p class="landing-direccion"><i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i></p>
						<div class="landing-mapa">
							<i class="fa-solid fa-circle-notch fa-spin-pulse fa-lg text-white"></i>
						</div>
					</div>
				</div>

				<!-- :::::::::::::::::::::: BONO :::::::::::::::::: -->
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="bono text-center landing-img-bono">
						<i class="fa-solid fa-circle-notch fa-spin-pulse fa-2x text-white mt-5"></i>
					</div>
				</div>

				<!-- :::::::::::::::::::::: ICONOS :::::::::::::::::: -->
				<div class="col-md-6 col-lg-2 col-xl-2">

					<div class="row align-middle">
						<div class="mt-5 col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12 text-sm-center text-lg-end wh">
							<a href="" class="landing-whatsapp" target="_blank">
								<img class="resplandor" src="assets/img/icons/Whatsapp icono GR-12.svg" alt="">
							</a>
						</div>
						<div class="mt-5 col-6 col-sm-6 col-md-12 col-lg-12 col-xl-12 text-sm-center text-lg-end vyc">
							<a href="https://www.huacachinadelnorte.pe/" target="_blank">
								<img src="assets/img/icons/Logo Vyc Inmobiliaria-06.svg" alt="">
							</a>
						</div>
					</div>
				</div>


				<!-- /.col-lg-6 -->
			</div>
		</div>

	</section>

	<!-- jQuery 3.6.0 -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jquery-validation -->
	<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="plugins/jquery-validation/additional-methods.min.js"></script>
	<script src="plugins/jquery-validation/localization/messages_es_PE.js"></script>
	<!-- bootstrap 5.0.2 -->
	<script src="plugins/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
	<!-- sweetalert2 -->
	<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- Toastr -->
	<script src="plugins/toastr/toastr.min.js"></script>
	<!-- Api Mapa -->
	<!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJZ5VXawUSvX2v-QuV_JwQb6_j-EP7oyk&callback=initMap"> </script> -->

	<!-- Funciones Crud -->
	<script type="text/javascript" src="assets/js/funcion_crud.js"></script>
	<!-- Funciones Generales -->
	<script type="text/javascript" src="assets/js/funcion_general.js"></script>

	<!-- js -->
	<script src="scripts/landing_disenio.js"></script>

	<!-- <script>
		function initMap() {
			console.log('mapa cargado');
		}
	</script> -->

</body>

</html>