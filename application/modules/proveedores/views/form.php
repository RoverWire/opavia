<h1 class="page-title"><i class="icon-truck"></i> <?php echo $titulo_form; ?></h1>

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

			<?php $error = form_error('datos[nombre]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="nombre" class="control-label">Nombre</label>
				<div class="controls">
					<input type="text" name="datos[nombre]" id="nombre" value="<?php echo set_value('nombre', $nombre); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>


			<?php $error = form_error('datos[direccion]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="direccion" class="control-label">Dirección</label>
				<div class="controls">
					<textarea name="datos[direccion]" id="direccion"><?php echo set_value('direccion', $direccion); ?></textarea>
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('datos[telefono]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="telefono" class="control-label">Teléfono</label>
				<div class="controls">
					<input type="text" name="datos[telefono]" id="telefono" value="<?php echo set_value('telefono', $telefono); ?>">
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('datos[email]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="email" class="control-label">E-mail</label>
				<div class="controls">
					<input type="text" name="datos[email]" id="email" value="<?php echo set_value('email', $email); ?>">
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('datos[rfc]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="rfc" class="control-label">RFC</label>
				<div class="controls">
					<input type="text" name="datos[rfc]" id="rfc" value="<?php echo set_value('rfc', $rfc); ?>">
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('datos[status]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="status" class="control-label">Estado</label>
				<div class="controls">
					<select name="datos[status]" id="status">
						<option value="1" <?php echo validar_seleccion($status, '1'); ?>>Activo</option>
						<option value="0" <?php echo validar_seleccion($status, '0'); ?>>Suspendido</option>
					</select>
					<?php echo $error; ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
					<a href="/proveedores" class="btn btn-inverse">Regresar</a>
				</div>
			</div>
		</form>
	</div>
</div>