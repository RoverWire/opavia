<h1 class="page-title"><i class="icon-money"></i> Detalles del Crédito</h1>

<?php if (isset($graduacion)): ?>
	<div class="widget widget-table">
		<div class="widget-header center bold">
			Graduación
		</div>
		<div class="widget-content">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th colspan="4" class="center">Ojo Derecho</th>
						<th colspan="4" class="center">Ojo Izquierdo</th>
					</tr>
					<tr>
						<th class="center">sph</th>
						<th class="center">cyl</th>
						<th class="center">axis</th>
						<th class="center">add</th>
						<th class="center">sph</th>
						<th class="center">cyl</th>
						<th class="center">axis</th>
						<th class="center">add</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center"><?php echo $graduacion->od_sph ?></td>
						<td class="center"><?php echo $graduacion->od_cyl ?></td>
						<td class="center"><?php echo $graduacion->od_axis ?></td>
						<td class="center"><?php echo $graduacion->od_add ?></td>
						<td class="center"><?php echo $graduacion->oi_sph ?></td>
						<td class="center"><?php echo $graduacion->oi_cyl ?></td>
						<td class="center"><?php echo $graduacion->oi_axis ?></td>
						<td class="center"><?php echo $graduacion->oi_add ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="widget widget-table">
		<div class="widget-header center bold">
			Orden de Laboratorio: <?php echo $laboratorio->nombre ?>
		</div>
		<div class="widget-content">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Material</th>
						<th>Especificación</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($venta->lente)): ?>
						<tr>
							<td class="bold">Lente</td>
							<td><?php echo $venta->lente; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->material)): ?>
						<tr>
							<td class="bold">Material</td>
							<td><?php echo $venta->material; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->tipo)): ?>
						<tr>
							<td class="bold">Tipo</td>
							<td><?php echo $venta->tipo; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->tinte)): ?>
						<tr>
							<td class="bold">Tinte</td>
							<td><?php echo $venta->tinte; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->intensidad)): ?>
						<tr>
							<td class="bold">Intensidad</td>
							<td><?php echo $venta->intensidad; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->aplicacion)): ?>
						<tr>
							<td class="bold">Aplicacion</td>
							<td><?php echo $venta->aplicacion; ?></td>
						</tr>
					<?php endif ?>

					<?php if (!empty($venta->tratamiento)): ?>
						<tr>
							<td class="bold">Tratamiento</td>
							<td><?php echo $venta->tratamiento; ?></td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endif ?>

<div class="widget widget-table">
	<div class="widget-header center bold">
		Artículos
	</div>
	<div class="widget-content">
		<table class="table table-bordered table-striped">
			<thead>
				<tr class="underline">
					<th width="15%">Cant.</th>
					<th>Artículo</th>
					<th width="15%">Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$total = 0;

					foreach ($articulos->result() as $row){
						$total += $row->total;
				?>
				<tr>
					<td><?php echo $row->cantidad ?></td>
					<td><?php echo $row->marca.' '.$row->modelo ?></td>
					<td class="right"><?php echo number_format($row->total, 2) ?></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td class="right bold" colspan="2">Subtotal:</td>
					<td class="right"><?php echo number_format($total, 2) ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<div class="widget widget-table">
	<div class="widget-header bold center">
		Historial de Pagos Efectuados
	</div>
	<div class="widget-content">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="center">Fecha</th>
					<th class="center">Monto Abonado</th>
					<th class="center">Saldo</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3" class="center">
						<a class="btn" href="/ventas/abonar/<?php echo $venta->id ?>">Realizar Abono</a>
						<a class="btn" href="/ventas/credito">Regresar</a>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($abonos->result() as $pago): ?>
				<tr>
					<td class="center"><?php echo $pago->fecha ?></td>
					<td class="right">$ <?php echo number_format($pago->abono, 2) ?></td>
					<td class="right">$ <?php echo number_format($pago->saldo, 2) ?></td>
				</tr>

			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>