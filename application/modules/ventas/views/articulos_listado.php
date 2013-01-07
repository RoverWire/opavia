
<h1 class="page-title"><i class="icon-shopping-cart"></i> Artículos</h1>

<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="" id="consulta" method="post">
		<div class="widget-header">			
			&nbsp;

			<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2 search-query">
			<button type="submit" class="btn btn-small btn-success">Buscar</button>
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
						<td colspan="5">
							
						</td>
					</tr>
				</tfoot>

				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><?php echo $row->marca ?></td>
						<td><?php echo $row->modelo ?></td>
						<td><?php echo $row->existencia ?></td>
						<td class="center">
							<a href="/catalogo/editar/<?php echo $row->id; ?>" class="btn btn-small" title="editar">Seleccionar</a>								 
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
