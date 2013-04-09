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

	<link href="/assets/font/opensans.css" rel="stylesheet">	
	<link href="/assets/css/bootstrap.no.icons.min.css" rel="stylesheet">
	<link href="/assets/css/font-awesome.css" rel="stylesheet">	
	<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="/assets/css/opavia.css" rel="stylesheet"

	<?php echo $_styles; ?>

	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="/assets/js/modernizr-2.6.1.min.js"></script>
</head>
<body>
	<header class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="span2" href="#"><img src="/assets/img/logo.png" alt=""></a>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $username; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/usuarios/perfil"><i class="icon-user"></i> Mi Cuenta</a></li>
								<li><a href="/usuarios/perfil/password"><i class="icon-lock"></i> Contraseña</a></li>
								<li class="divider"></li>
								<li><a href="/usuarios/logout"><i class="icon-off"></i> Cerrar Sesión</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row">
			<aside class="span3">
				<div class="sidebar-nav">
					<ul id="main-nav" class="nav nav-tabs nav-stacked">
						<li><a href="/ventas"><i class="icon-shopping-cart"></i> Ventas</a></li>
						<li><a href="/usuarios"><i class="icon-user"></i> Usuarios</a></li>					
						<li><a href="/proveedores"><i class="icon-truck"></i> Proveedores</a></li>
						<li><a href="/clientes"><i class="icon-briefcase"></i> Clientes</a></li>
						<li><a href="/laboratorios"><i class="icon-beaker"></i> Laboratorios</a></li>
						<li><a href="/catalogo"><i class="icon-shopping-cart"></i> Catálogo</a></li>
					</ul>
				</div>
			</aside>

			<div class="span9">
				<?php echo $content; ?>
			</div>
		</div>
	</div>

	<!-- here comes the javascript -->

	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="/assets/js/jquery.js"></script>

	<!-- this is where we put our custom functions -->
	<script src="/assets/js/bootstrap.js"></script>

	<?php echo $_scripts; ?>

</body>
</html>