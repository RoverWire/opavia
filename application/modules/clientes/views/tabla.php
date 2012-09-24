
<h1 class="page-title"><i class="icon-user"></i> Consulta de Clientes</h1>

<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="">
		<div class="widget-header">
			<div class="pull-right">
				<a href="/cientes/agregar" class="btn btn-small btn-success"><i class="icon-plus"></i> Agregar</a> &nbsp;
			</div>
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="3%">#</th>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>E-Mail</th>
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
						<td><?php echo $row->nombre.' '.$row->apellidos; ?> </td>
						<td><?php echo $row->telefono; ?></td>
						<td><?php echo $row->email; ?></td>
						<td align="center">
							<div class="btn-group">
								<a href="/clientes/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/clientes/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>
						</td>
					</tr>

				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</form>
</div>