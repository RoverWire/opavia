
<h1 class="page-title"><i class="icon-user"></i> Consulta de Usuarios</h1>

<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="" id="consulta" method="post">
		<div class="widget-header">			
			<div class="pull-right">
				<a href="/usuarios/agregar" class="btn btn-small btn-success"><i class="icon-plus"></i> Agregar</a> &nbsp;
			</div>
		</div>
		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="2%">#</th>
						<th class="hidden-phone">Nombre</th>
						<th>Usuario</th>
						<th>Tipo</th>
						<th width="2%" class="hidden-phone">Activo</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6">
							<button type="button" class="btn btn-danger" id="btn-delete"><i class="icon-remove"></i> Eliminar</button>
						</td>
					</tr>
				</tfoot>

				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><input type="checkbox" name="del[]" value="<?php echo $row->id; ?>"></td>
						<td class="hidden-phone"><?php echo $row->nombre . ' ' . $row->apellidos; ?></td>
						<td><?php echo $row->usuario; ?></td>
						<td><?php echo ($row->tipo == 0) ? 'Admin' : 'Ventas'; ?></td>
						<td class="center hidden-phone"><?php echo ($row->activo == 0) ? 'No' : 'Si'; ?></td>
						<td class="center">
							<div class="btn-group">
								<a href="/usuarios/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/usuarios/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>										 
						</td>	
					</tr>

				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</form>
</div>
