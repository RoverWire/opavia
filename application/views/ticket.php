<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="es" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="es" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title; ?> | Óptica Pavía</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Uncomment to use; use thoughtfully!
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon
	<link rel="shortcut icon" href="img/favicon.ico">
	-->
	
	<link href="/assets/css/ticket.css" rel="stylesheet">

	<?php echo $_styles; ?>

	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="/assets/js/modernizr-2.6.1.min.js"></script>
</head>
<body>
	<div class="contenedor">
		<div class="encabezado">
			<img src="/assets/img/logo_login.png" alt="" class="logo">
		</div>
		
		<div class="contenido">
			<?php echo $content; ?>
		</div>

		<div class="encabezado pie">
			<p>
				Calle 59 No. 234-A por 8 y 6 Col. Esperanza. Teléfono 922.31.77 <br>
				atencion_clientespavia@hotmail.com <br>
				Horario: Lunes a Viernes 9:30 am a 1:30 pm y 4:30 pm a 8:00 pm. Sábados de 9:30 am a 2:00 pm
			</p>
		</div>
	</div>	

	<!-- here comes the javascript -->

	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="/assets/js/jquery.js"></script>

	<!-- this is where we put our custom functions -->
	<script src="/assets/js/bootstrap.min.js"></script>

	<?php echo $_scripts; ?>

</body>
</html>