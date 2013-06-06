
<h1 class="page-title"><i class="icon-user"></i> Consulta de Usuarios</h1>

<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="<?php echo (isset($form_action)) ? $form_action:''?>" id="consulta" method="post">
		<div class="widget-header form-search force-top">
			<div class="input-append">
				<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2 search-query">
				<button type="submit" class="btn"><i class="icon-search"></i></button>
			</div>

			<?php if (!empty($buscar)): ?>
				<a href="/usuarios" class="btn btn-small"><i class="icon-undo"></i> Limpiar Filtro</a>
			<?php endif ?>			
			
			<a href="/usuarios/agregar" class="btn btn-small btn-success btn-right"><i class="icon-plus"></i> Agregar</a> &nbsp;
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
						<td colspan="6" class="row-fluid">
							<div class="span2">
								<button type="button" class="btn btn-danger" id="btn-delete"><i class="icon-remove"></i> Eliminar</button>
							</div>
							<div class="span10">
								<?php echo $this->pagination->create_links(); ?>								
							</div>
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
