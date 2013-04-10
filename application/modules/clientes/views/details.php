<h1 class="page-title"><i class="icon-user"></i> <?php echo $cliente->nombre.' '.$cliente->apellidos; ?></h1>

<div class="widget widget-table">
	<form action="" method="post" class="form-search">
		<div class="widget-header center">
			Créditos Pendientes
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="5%">Folio</th>
						<th>Total</th>
						<th width="10%">Fecha</th>
						<th width="15%">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($credito->result() as $row): ?>
					<tr>
						<td><?php echo $row->folio_venta ?></td>
						<td>$ <?php echo number_format($row->total, 2) ?></td>
						<td><?php echo $row->fecha ?></td>
						<td class="center">					
							<a href="/ventas/detalle/<?php echo $row->id; ?>" class="btn btn-small" title="detalles"><i class="icon-search"></i> Detalles</a>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($credito->num_rows() == 0): ?>
					<tr>
						<td colspan="5" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>


<div class="widget widget-table">
	<form action="" method="post" class="form-search">
		<div class="widget-header center">
			Cotizaciones
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="5%">Folio</th>
						<th>Total</th>
						<th width="10%">Fecha</th>
						<th width="15%">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($cotizacion->result() as $row): ?>
					<tr>
						<td><?php echo $row->folio_venta ?></td>
						<td>$ <?php echo number_format($row->total, 2) ?></td>
						<td><?php echo $row->fecha ?></td>
						<td class="center">					
							<a href="/ventas/detalle/<?php echo $row->id; ?>" class="btn btn-small" title="detalles"><i class="icon-search"></i> Detalles</a>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($cotizacion->num_rows() == 0): ?>
					<tr>
						<td colspan="5" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>

<div class="widget widget-table">
	<form action="" method="post" class="form-search">
		<div class="widget-header center">
			Compras Realizadas
		</div>

		<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="5%">Folio</th>
						<th>Total</th>
						<th width="10%">Fecha</th>
						<th width="15%">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($compra->result() as $row): ?>
					<tr>
						<td><?php echo $row->folio_venta ?></td>
						<td>$ <?php echo number_format($row->total, 2) ?></td>
						<td><?php echo $row->fecha ?></td>
						<td class="center">					
							<a href="/ventas/detalle/<?php echo $row->id; ?>" class="btn btn-small" title="detalles"><i class="icon-search"></i> Detalles</a>
						</td>
					</tr>

				<?php endforeach ?>

				<?php if ($compra->num_rows() == 0): ?>
					<tr>
						<td colspan="5" class="center">No se encontraron resultados</td>
					</tr>
					
				<?php endif ?>
				</tbody>
			</table>
		</div>
	</form>
</div>