
<form action="" method="post" class="form-horizontal">
	<legend><?php echo $titulo_form; ?></legend>

	<?php $error = form_error('datos[nombre]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="nombre" class="control-label">Nombre</label>
		<div class="controls">
			<input type="text" name="datos[nombre]" id="nombre" value="<?php echo set_value('nombre', $nombre); ?>"> 
			<?php echo $error; ?>
		</div>		
	</div>

	<?php $error = form_error('datos[apellidos]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="apellidos" class="control-label">Apellidos</label>
		<div class="controls">
			<input type="text" name="datos[apellidos]" id="apellidos" value="<?php echo set_value('apellidos', $apellidos); ?>">
			<?php echo $error; ?>
		</div>
	</div>

	<?php $error = form_error('datos[usuario]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="usuario" class="control-label">Usuario</label>
		<div class="controls">
			<input type="text" name="datos[usuario]" id="usuario" value="<?php echo set_value('usuario', $usuario); ?>">
			<?php echo $error; ?>
		</div>
	</div>

	<?php $error = form_error('datos[pass]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="pass" class="control-label">Contraseña</label>
		<div class="controls">
			<input type="password" name="datos[pass]" id="pass">
			<?php echo $error; ?>
		</div>
	</div>

	<?php $error = form_error('repetir'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="repetir" class="control-label">Repetir Contraseña</label>
		<div class="controls">
			<input type="password" name="repetir" id="repetir">
			<?php echo $error; ?>
		</div>
	</div>

	<?php $error = form_error('datos[tipo]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="tipo" class="control-label">Tipo de Usuario</label>
		<div class="controls">
			<select name="datos[tipo]" id="tipo">
				<option value="0" <?php echo set_select('tipo', '0'); ?>>Administrador</option>
				<option value="1" <?php echo set_select('tipo', '1'); ?>>Vendedor</option>
			</select>
			<?php echo $error; ?>
		</div>
	</div>

	<?php $error = form_error('datos[activo]'); ?>
	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<label for="activo" class="control-label">Estado</label>
		<div class="controls">
			<select name="datos[activo]" id="activo">
				<option value="1" <?php echo set_select('activo', '1'); ?>>Cuenta Activada</option>
				<option value="0" <?php echo set_select('activo', '0'); ?>>Cuenta Suspendida</option>
			</select>
			<?php echo $error; ?>
		</div>
	</div>

	<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
		<div class="controls">
			<button type="submit" class="btn">Guardar</button>
			<button type="button" class="btn btn-inverse">Regresar</button>
		</div>
	</div>

</form>