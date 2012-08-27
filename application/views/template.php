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

	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/opavia.css" rel="stylesheet">
	<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet">

	<?php echo $_styles; ?>

	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="/assets/js/modernizr-2.6.1.min.js"></script>
</head>
<body>
	<header class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Óptica Pavía</a>
				<div class="nav-collapse collapse">
					<p class="navbar-text pull-right">
						Logged in as <a href="#" class="navbar-link">Username</a>
					</p>
					<ul class="nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="#about">Usuarios</a></li>
						<li><a href="#contact">Almacén</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row-fluid">
			<aside class="span3">
				<div class="sidebar-nav">
					<ul class="nav nav-tabs nav-stacked">
						<li><a href="#">Opcion 1</a></li>
						<li><a href="#">Opcion 2</a></li>
						<li><a href="#">Opcion 3</a></li>
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
	<script src="/assets/js/bootstrap.min.js"></script>

	<?php echo $_scripts; ?>

</body>
</html>