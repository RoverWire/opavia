
<h1 class="page-title"><i class="icon-shopping-cart"></i> Lineas de Artículos</h1>

<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_success'); ?>
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
				<a href="/catalogo/lineas" class="btn btn-small"><i class="icon-undo"></i> Limpiar Filtro</a>
			<?php endif ?>

			<a href="/catalogo/lineas/agregar" class="btn btn-small btn-success btn-right"><i class="icon-plus"></i> Agregar</a> &nbsp;
		</div>
		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="2%">#</th>
						<th>Nombre</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<td colspan="3" class="row-fluid">
							<div class="span2">
								<button type="button" class="btn btn-danger" id="btn-delete"><i class="icon-remove"></i> Eliminar</button>
							</div>
							<div class="span10">
								<?php echo $this->pagination->create_links(); ?>								
							</div>							
						</td>
				</tfoot>

				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><input type="checkbox" name="del[]" value="<?php echo $row->id; ?>"></td>
						<td><?php echo $row->nombre ?></td>
						<td class="center">
							<div class="btn-group">
								<a href="/catalogo/lineas/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar"><i class="icon-pencil"></i></a>
								<a href="/catalogo/lineas/eliminar/<?php echo $row->id; ?>" class="btn btn-small btn-danger" title="eliminar"><i class="icon-remove"></i></a>
							</div>										 
						</td>	
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td class="center" colspan="3">No se encontraron resultados</td>
					</tr>
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>
