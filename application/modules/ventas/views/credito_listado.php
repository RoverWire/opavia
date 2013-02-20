<h1 class="page-title"><i class="icon-user"></i> Deudores</h1>

<?php if ($this->session->flashdata('msg_success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_success'); ?>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<form action="" method="post" class="form-search">
		<div class="widget-header">
			<div class="form-search force-top">
				<div class="input-append">
					<input type="text" name="buscar" value="<?php echo $buscar ?>" class="span2 search-query">
					<button type="submit" class="btn"><i class="icon-search"></i></button>
				</div>
			</div>
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="5%">Folio</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th width="10%">Fecha</th>
						<th width="10%">Opciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="5" class="center">
							
						</td>
					</tr>
				</tfoot>
				<tbody>
				<?php foreach ($query->result() as $row): ?>
					<tr>
						<td><?php echo $row->folio_venta ?></td>
						<td><?php echo $row->nombre; ?></td>
						<td><?php echo $row->apellidos; ?> </td>
						<td><?php echo $row->fecha ?></td>
						<td align="center">
							<div class="btn-group">						
								<a href="/ventas/detalle_credito/<?php echo $row->id; ?>" class="btn btn-small" title="detalles"><i class="icon-search"></i></a>
								<a href="/ventas/tickets/comprobante/<?php echo $row->id; ?>" class="btn btn-small" title="comprobante" target="blank"><i class="icon-print"></i></a>
								<a href="#" class="btn btn-small" title="abonar"><i class="icon-money"></i></a>
							</div>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($query->num_rows() == 0): ?>
					<tr>
						<td colspan="5" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>