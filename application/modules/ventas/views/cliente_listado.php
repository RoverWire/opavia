<h1 class="page-title"><i class="icon-user"></i> Consulta de Clientes</h1>

<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_success'); ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="" method="post" class="form-search">
		<div class="widget-header">

			&nbsp;

			<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2 search-query">
			<button type="submit" class="btn btn-success">Buscar</button>
			

		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th width="4%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6">
							
						</td>
					</tr>
				</tfoot>
				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->apellidos; ?> </td>
						<td align="center">
							<div class="btn-group">
								<a href="/ventas/graduaciones/<?php echo $row->id; ?>" class="btn btn-small" title="editar">Seleccionar</a>
							</div>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td colspan="3" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>