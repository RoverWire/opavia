<h1 class="page-title"><i class="icon-eye-open"></i> Orden de Venta / Cotización</h1>

<div class="widget">
	<div class="widget-content">
		<form action="" method="post" id="form_venta" class="form-horizontal">
		
		<?php if (validation_errors() != ''): ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<h4>Error</h4>
				La información está incompleta o errónea.
			</div>	
		<?php endif ?>

		<?php if ($id_graduacion): ?>
			
			<legend>Laboratorio</legend>

			<?php $error = form_error('datos[lente]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="lente" class="control-label">Lente</label>
				<div class="controls">				
					<?php echo drop_lentes('datos[lente]', $lente, 'id="lente"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[material]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="material" class="control-label">Material</label>
				<div class="controls">				
					<?php echo drop_lentes_material('datos[material]', $material, 'id="material"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tipo]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tipo" class="control-label">Tipo</label>
				<div class="controls">				
					<?php echo drop_lentes_tipo('datos[tipo]', $tipo, 'id="tipo"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tinte]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tinte" class="control-label">Tinte</label>
				<div class="controls">				
					<?php echo drop_lentes_tinte('datos[tinte]', $tinte, 'id="tinte"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[intensidad]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="intensidad" class="control-label">Intensidad</label>
				<div class="controls">				
					<?php echo drop_lentes_intensidad('datos[intensidad]', $intensidad, 'id="intensidad"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[aplicacion]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="aplicacion" class="control-label">Aplicacion</label>
				<div class="controls">				
					<?php echo drop_lentes_aplicacion('datos[aplicacion]', $aplicacion, 'id="aplicacion"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[tratamiento]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="tratamiento" class="control-label">Tratamiento</label>
				<div class="controls">				
					<?php echo drop_lentes_tratamiento('datos[tratamiento]', $tratamiento, 'id="tratamiento"') ?>
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[fecha_entrega]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="fecha_entrega" class="control-label">Fecha de Entrega</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[fecha_entrega]" id="fecha_entrega" data-date="<?php echo date('Y-m-d') ?>" value="<?php echo set_value('fecha_entrega', $fecha_entrega); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('datos[id_laboratorio]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="id_laboratorio" class="control-label">Laboratorio</label>
				<div class="controls">
					<select name="datos[id_laboratorio]" id="id_laboratorio">
						<?php foreach ($laboratorios->result() as $row): ?>
							<option value="<?php echo $row->id ?>"><?php echo $row->nombre ?></option>
						<?php endforeach ?>
					</select>
					<?php echo $error ?>
				</div>
			</div>

			<legend>Graduación</legend>

			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th colspan="4" class="center">
							Ojo Derecho
							<input type="hidden" name="datos[id_graduacion]" value="<?php echo $id_graduacion ?>">
						</th>
						<th colspan="4" class="center">Ojo Izquierdo</th>						
					</tr>
					<tr>
						<th class="center">sph</th>
						<th class="center">cyl</th>
						<th class="center">axis</th>
						<th class="center">add</th>
						<th class="center">sph</th>
						<th class="center">cyl</th>
						<th class="center">axis</th>
						<th class="center">add</th>
					</tr>
				</thead>
				
				<tbody>
				<?php $row = $graduacion->row(); ?>
					<tr>
						<td class="center"><?php echo $row->od_sph ?></td>
						<td class="center"><?php echo $row->od_cyl ?></td>
						<td class="center"><?php echo $row->od_axis ?></td>
						<td class="center"><?php echo $row->od_add ?></td>
						<td class="center"><?php echo $row->oi_sph ?></td>
						<td class="center"><?php echo $row->oi_cyl ?></td>
						<td class="center"><?php echo $row->oi_axis ?></td>
						<td class="center"><?php echo $row->oi_add ?></td>
					</tr>
				</tbody>
			</table>

		<?php endif ?>


			<legend>Artículos</legend>

			<table class="table table-striped table-bordered">
				<thead>
					<th class="center" width="10%">Cantidad</th>
					<th class="center">Descripcion</th>
					<th class="center" width="15%">Precio Unitario</th>
					<th class="center" width="15%">Total</th>
				</thead>
				<tfoot>
					<td class="center" colspan="4">
						<a href="/ventas/articulos/<?php echo $id_cliente ?>" class="btn bnt-small">Regresar a Productos</a>						
					</td>
				</tfoot>
				<tbody>
					<?php 
					if (isset($lista_articulos)) {
						$i = 0;
						$total = 0;
						foreach ($lista_articulos->result() as $row) {
					?>
					<tr>
						<td>
							<input type="text" name="articulo[<?php echo $i ?>][cantidad]" data-i="<?php echo $i ?>" value="1" class="input-mini number-only">
							<input type="hidden" name="articulo[<?php echo $i ?>][unitario]" id="unitario<?php echo $i ?>" value="<?php echo $row->precio_venta ?>">
							<input type="hidden" name="articulo[<?php echo $i ?>][id_articulo]" value="<?php echo $row->id ?>">
						</td>
						<td><?php echo $row->marca.', '.$row->modelo ?></td>
						<td class="right">$<?php echo number_format($row->precio_venta, 2) ?></td>
						<td class="center">
							<div class="input-prepend">
								<span class="add-on">$</span>
								<input type="text" name="articulo[<?php echo $i ?>][total]" id="total<?php echo $i ?>" value="<?php echo $row->precio_venta ?>" class="input-mini total">
							</div>
						</td>
					</tr>
					<?php
							$total += $row->precio_venta;
							$i++;
						}
					}
					?>
				</tbody>
			</table>

			<?php $error = form_error('datos[total]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="total" class="control-label">Total</label>
				<div class="controls">
					<input type="text" class="input-small" name="datos[total]" id="total" value="<?php echo set_value('total', $total); ?>">
					<?php echo $error ?>
				</div>
			</div>

			<?php $error = form_error('abono'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label class="control-label" for="abono">Efectivo / Abono</label>
				<div class="controls">
					<input type="text" name="abono" class="input-small">
					<?php echo $error ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button id="efectuar_venta" type="button" class="btn">Efectuar Venta</button>
					<button id="cotizar" type="button" class="btn">Guardar Cotización</button>
					<input type="hidden" name="tipo_operacion" id="tipo_operacion" value="venta">
					<input type="hidden" name="datos[id_cliente]" id="id_cliente" value="<?php echo $id_cliente ?>">
					<input type="hidden" name="datos[id_usuario]" value="<?php echo $this->session->userdata('id') ?>">
				</div>
			</div>
		</form>
	</div>
</div>