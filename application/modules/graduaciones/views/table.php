<h1 class="page-title"><i class="icon-eye-open"></i> Graduaciones</h1>

<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_success'); ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="">
		<div class="widget-header">
			<div class="pull-right">
				<a href="/graduaciones/agregar/<?php echo $id_cliente ?>" class="btn btn-small btn-success"><i class="icon-plus"></i> Agregar</a> &nbsp;
			</div>
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th colspan="4" class="center">Ojo Izquierdo</th>
						<th colspan="4" class="center">Ojo Derecho</th>
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
						<td colspan="9">
							&nbsp;
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
							<div class="btn-group">
								<a href="/graduaciones/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/graduaciones/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>
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