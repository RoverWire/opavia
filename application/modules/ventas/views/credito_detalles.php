<h1 class="page-title"><i class="icon-money"></i> Detalles del Crédito</h1>

<?php if (isset($graduacion)): ?>
	<div class="widget widget-table">
		<div class="widget-header center bold">
			Graduación
		</div>
		<div class="widget-content">
			<table class="table table-bordered">
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
			Orden de Laboratorio
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>header</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>data</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endif ?>