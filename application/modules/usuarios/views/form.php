
<form action="" method="post" class="form-horizontal">
	<legend>Agregar Usuario Nuevo</legend>

	<div class="control-group">
		<label for="nombre" class="control-label">Nombre</label>
		<div class="controls">
			<input type="text" name="datos[nombre]" id="nombre" value="">
		</div>
	</div>

	<div class="control-group">
		<label for="apellidos" class="control-label">Apellidos</label>
		<div class="controls">
			<input type="text" name="datos[apellidos]" id="apellidos" value="">
		</div>
	</div>

	<div class="control-group">
		<label for="usuario" class="control-label">Usuario</label>
		<div class="controls">
			<input type="text" name="datos[usuario]" id="usuario" value="">
		</div>
	</div>

	<div class="control-group">
		<label for="pass" class="control-label">Contraseña</label>
		<div class="controls">
			<input type="password" name="datos[pass]" id="pass">
		</div>
	</div>

	<div class="control-group">
		<label for="repetir" class="control-label">Repetir Contraseña</label>
		<div class="controls">
			<input type="password" name="repetir" id="repetir">
		</div>
	</div>

	<div class="control-group">
		<label for="tipo" class="control-label">Tipo de Usuario</label>
		<div class="controls">
			<select name="datos[tipo]" id="tipo">
				<option value="0">Administrador</option>
				<option value="1">Vendedor</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label for="activo" class="control-label">Estado</label>
		<div class="controls">
			<select name="datos[activo]" id="activo">
				<option value="1">Cuenta Activada</option>
				<option value="0">Cuenta Suspendida</option>
			</select>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="button" class="btn">Guardar</button>
			<button type="button" class="btn btn-inverse">Regresar</button>
		</div>
	</div>

</form>