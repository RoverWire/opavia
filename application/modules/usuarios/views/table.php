
<h1 class="page-title"><i class="icon-user"></i> Consulta de Usuarios</h1>

<div class="widget widget-table">
	<form action="" method="post">
		<div class="widget-header">
			<h3>Listado de Usuarios del Sistema</h3>
			<div class="pull-right">
				<a href="/usuarios/agregar" class="btn btn-small btn-success">Agregar Usuario</a>
				&nbsp;
			</div>
		</div>
		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="2%">#</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th width="2%">Activo</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="5">
							<button type="button" class="btn btn-danger"><i class="icon-remove"></i> Eliminar</button>
						</td>
					</tr>
				</tfoot>

				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><input type="checkbox" name="del[]" value="<?php echo $row->id; ?>"></td>
						<td><?php echo $row->nombre . ' ' . $row->apellidos; ?></td>
						<td><?php echo $row->usuario; ?></td>
						<td class="center"><?php echo ($row->activo == 0) ? 'No' : 'Si'; ?></td>
						<td class="center">
							<div class="btn-group">
								<a href="/usuarios/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="#" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>										 
						</td>	
					</tr>

				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</form>
</div>
