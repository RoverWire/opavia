
<h1 class="page-title"><i class="icon-shopping-cart"></i> Artículos</h1>


<div class="widget widget-table">
	<form action="" id="consulta" method="post">
		<div class="widget-header force-top force-top-10">			
			<select name="linea">
				<option value="">Todas</option>
				<?php echo $lineas ?>

			</select>
			<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2">
			<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>

			<div class="right btn-right">
				Articulos Seleccionados: <strong id="counter"><?php echo $contador ?></strong>
			</div>		
		</div>
		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Existencia</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="5" class="center">
							<a href="/ventas/graduaciones/<?php echo $idcliente ?>" class="btn btn-small btn-success">Seleccionar Graduacion</a>
							<a href="/ventas/orden/0" class="btn btn-small btn-inverse">Terminar Venta</a>
						</td>
					</tr>
				</tfoot>

				<tbody>
				<?php 
					if (isset($query)) {
						foreach ($query->result() as $row) {
				?>
					<tr>
						<td><?php echo $row->marca ?></td>
						<td><?php echo $row->modelo ?></td>
						<td><?php echo $row->existencia ?></td>
						<td class="center">
							<?php if (isset($articulos[$row->id])): ?>
								<button type="button" class="btn btn-small btn-danger del-articulo" data-id="<?php echo $row->id ?>">Eliminar</a>
							<?php else: ?>
								<button type="button" class="btn btn-small add-articulo" data-id="<?php echo $row->id ?>">Agregar</a>
							<?php endif ?>
						</td>	
					</tr>
				<?php 
						}

						if ($query->num_rows() == 0) { 
				?>
					<tr>
						<td class="center" colspan="5">No se encontraron resultados</td>
					</tr>
				<?php 
						}

					} else {
				?>
					<tr>
						<td class="center" colspan="5">Proporcione un criterio de búsqueda</td>
					</tr>
				<?php 
					}
				?>
				</tbody>
			</table>
		</div>
	</form>
</div>

