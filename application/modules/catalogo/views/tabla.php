
<h1 class="page-title"><i class="icon-shopping-cart"></i> Artículos</h1>

<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="<?php echo (isset($form_action)) ? $form_action:''?>" id="consulta" method="post">
		<div class="widget-header form-search force-top">
			<a href="/catalogo/agregar" class="btn btn-small btn-success btn-right"><i class="icon-plus"></i> Agregar</a>
			<a href="/catalogo/lineas" class="btn btn-small btn-right"><u class="icon-list"></u> Lineas de Artículos</a>
		</div>
		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="2%">#</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Existencia</th>
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
						<td><?php echo $row->marca ?></td>
						<td><?php echo $row->modelo ?></td>
						<td><?php echo $row->existencia ?></td>
						<td class="center">
							<div class="btn-group">
								<a href="/catalogo/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/catalogo/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>										 
						</td>	
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td class="center" colspan="5">No se encontraron resultados</td>
					</tr>
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>
