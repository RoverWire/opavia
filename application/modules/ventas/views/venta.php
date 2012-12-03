<h1 class="page-title"><i class="icon-user"></i> Venta</h1>

<form action="" method="" class="form-horizontal">
	<div class="widget widget-content">
		<legend>Datos del Cliente</legend>
		<div class="row-fluid">
			<div class="span1 bold">Nombre:</div>
			<div class="span5"> <?php echo $cliente->nombre.' '.$cliente->apellidos; ?> </div>
			<div class="span1 bold">Direccion:</div>
			<div class="span5"><?php echo $cliente->direccion ?></div>
		</div>
	</div>

	<div class="widget widget-content">
		<legend>Orden y Graduación</legend>
		<div class="control-group">
			<label for="od_sph" class="control-label">Esfera Derecho</label>
			
		</div>
	</div>
</form>