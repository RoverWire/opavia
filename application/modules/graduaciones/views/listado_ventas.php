<h1 class="page-title"><i class="icon-eye-open"></i> Seleccione una Graduación</h1>

<div class="widget widget-table">
	<form action="">
		<div class="widget-header">
			<div class="pull-right">
				<a href="/ventas/agregar_graduacion/<?php echo $id_cliente ?>" class="btn btn-small btn-success"><i class="icon-plus"></i> Agregar</a> &nbsp;
			</div>
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th colspan="4" class="center">Ojo Derecho</th>
						<th colspan="4" class="center">Ojo Izquierdo</th>
						<th width="4%" rowspan="2">Opciones</th>
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
				<tfoot>
					<tr>
						<td colspan="9" class="center">
							<a href="/ventas/orden/0" class="btn btn-small">Omitir Graduación</a>
						</td>
					</tr>
				</tfoot>
				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td class="center"><?php echo $row->od_sph ?></td>
						<td class="center"><?php echo $row->od_cyl ?></td>
						<td class="center"><?php echo $row->od_axis ?></td>
						<td class="center"><?php echo $row->od_add ?></td>
						<td class="center"><?php echo $row->oi_sph ?></td>
						<td class="center"><?php echo $row->oi_cyl ?></td>
						<td class="center"><?php echo $row->oi_axis ?></td>
						<td class="center"><?php echo $row->oi_add ?></td>
						<td class="center">
							<a href="/ventas/orden/<?php echo $row->id; ?>" class="btn btn-small">Seleccionar</a>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td colspan="9" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>