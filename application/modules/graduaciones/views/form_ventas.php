<h1 class="page-title"><i class="icon-eye-open"></i> <?php echo $titulo_form; ?></h1>

<div class="widget">
	<div class="widget-content">
		<form action="" method="post" class="form-horizontal">
		
		<?php if (validation_errors() != ''): ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<h4>Error</h4>
				La información está incompleta o errónea.
			</div>	
		<?php endif ?>

			<legend>Ojo Derecho</legend>

			<?php $error = form_error('datos[od_sph]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="od_sph" class="control-label">Esfera</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[od_sph]" id="od_sph" value="<?php echo set_value('od_sph', $od_sph); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[od_cyl]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="od_cyl" class="control-label">Cilindro</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[od_cyl]" id="od_cyl" value="<?php echo set_value('od_cyl', $od_cyl); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[od_axis]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="od_axis" class="control-label">Eje</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[od_axis]" id="od_axis" value="<?php echo set_value('od_axis', $od_axis); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[od_add]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="od_add" class="control-label">Esfera de Cerca</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[od_add]" id="od_add" value="<?php echo set_value('od_add', $od_add); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<legend>Ojo Izquierdo</legend>

			<?php $error = form_error('datos[oi_sph]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="oi_sph" class="control-label">Esfera</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[oi_sph]" id="oi_sph" value="<?php echo set_value('oi_sph', $oi_sph); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[oi_cyl]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="oi_cyl" class="control-label">Cilindro</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[oi_cyl]" id="oi_cyl" value="<?php echo set_value('oi_cyl', $oi_cyl); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[oi_axis]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="oi_axis" class="control-label">Eje</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[oi_axis]" id="oi_axis" value="<?php echo set_value('oi_axis', $oi_axis); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[oi_add]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="oi_add" class="control-label">Esfera de Cerca</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[oi_add]" id="oi_add" value="<?php echo set_value('oi_add', $oi_add); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
					<a href="/ventas/articulos" class="btn btn-inverse">Omitir</a>
				</div>
			</div>

		</form>
	</div>
</div>