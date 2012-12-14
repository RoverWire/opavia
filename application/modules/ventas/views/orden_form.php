<h1 class="page-title"><i class="icon-eye-open"></i> Orden de Laboratorio</h1>

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

			<legend>Materiales</legend>

			<?php $error = form_error('datos[lente]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="lente" class="control-label">Lente</label>
				<div class="controls">				
					<?php echo drop_lentes('datos[lente]', $lente, 'id="lente') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[material]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="material" class="control-label">Material</label>
				<div class="controls">				
					<?php echo drop_lentes_material('datos[material]', $material, 'id="material') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tipo]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tipo" class="control-label">Tipo</label>
				<div class="controls">				
					<?php echo drop_lentes_tipo('datos[tipo]', $tipo, 'id="tipo') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tinte]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tinte" class="control-label">Tinte</label>
				<div class="controls">				
					<?php echo drop_lentes_tinte('datos[tinte]', $tinte, 'id="tinte') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[intensidad]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="intensidad" class="control-label">Intensidad</label>
				<div class="controls">				
					<?php echo drop_lentes_intensidad('datos[intensidad]', $intensidad, 'id="intensidad') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[aplicacion]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="aplicacion" class="control-label">Aplicacion</label>
				<div class="controls">				
					<?php echo drop_lentes_aplicacion('datos[aplicacion]', $aplicacion, 'id="aplicacion') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tratamiento]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tratamiento" class="control-label">Tratamiento</label>
				<div class="controls">				
					<?php echo drop_lentes_tratamiento('datos[tratamiento]', $tratamiento, 'id="tratamiento') ?>
					<?php echo $error ?>
				</div>
			</div>

			<legend>Venta / Cotización</legend>

			<?php $error = form_error('datos[importe]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="importe" class="control-label">Importe</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[importe]" id="importe" value="<?php echo set_value('importe', $importe); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[fecha_entrega]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="fecha_entrega" class="control-label">Fecha de Entrega</label>
				<div class="controls">
					<input type="text" name="datos[fecha_entrega]" id="fecha_entrega" value="<?php echo set_value('fecha_entrega', $fecha_entrega); ?>">
					<?php echo $error ?>
				</div>
			</div>


		</form>
	</div>
</div>