
<h1 class="page-title"><i class="icon-shopping-cart"></i> <?php echo $titulo_form; ?></h1>

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

			<?php $error = form_error('datos[id_linea]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="id_linea" class="control-label">Linea</label>
				<div class="controls">
					<select name="datos[id_linea]" id="id_linea">
						<option value="">Seleccione una línea</option>
						<?php echo $id_linea; ?>
					</select> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[id_proveedor]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="id_proveedor" class="control-label">Proveedor</label>
				<div class="controls">
					<select name="datos[id_proveedor]" id="id_proveedor">
						<option value="">Seleccione un proveedor</option>
						<?php echo $id_proveedor; ?>
					</select> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[marca]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="marca" class="control-label">Marca</label>
				<div class="controls">
					<input type="text" name="datos[marca]" id="marca" value="<?php echo set_value('marca', $marca); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[modelo]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="modelo" class="control-label">Modelo</label>
				<div class="controls">
					<input type="text" name="datos[modelo]" id="modelo" value="<?php echo set_value('modelo', $modelo); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[color]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="color" class="control-label">Color</label>
				<div class="controls">
					<input type="text" name="datos[color]" id="color" value="<?php echo set_value('color', $color); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[costo_compra]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="costo_compra" class="control-label">Costo Compra</label>
				<div class="controls">
					<input type="text" name="datos[costo_compra]" id="costo_compra" value="<?php echo set_value('costo_compra', $costo_compra); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[precio_venta]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="precio_venta" class="control-label">Precio Venta</label>
				<div class="controls">
					<input type="text" name="datos[precio_venta]" id="precio_venta" value="<?php echo set_value('precio_venta', $precio_venta); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[existencia]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="existencia" class="control-label">Existencia</label>
				<div class="controls">
					<input type="text" name="datos[existencia]" id="existencia" value="<?php echo set_value('existencia', $existencia); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
					<a href="/catalogo" class="btn btn-inverse">Regresar</a>
				</div>
			</div>

		</form>
	</div>
</div>