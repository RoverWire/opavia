<p class="center">Orden de Laboratorio</p>

<table class="articulos">
	<tr>
		<th class="underline" colspan="2">Cristales / Micas</th>
	</tr>
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

</table>

<table class="articulos">
	<tr>
		<th colspan="3">Graduación</th>
	</tr>
	<tr class="underline">
		<th width="30%">&nbsp;</th>
		<th>O.D.</th>
		<th>O.I.</th>
	</tr>
	<tr>
		<td class="bold">Esf.</td>
		<td><?php echo $graduacion->od_sph ?></td>
		<td><?php echo $graduacion->oi_sph ?></td>
	</tr>
	<tr>
		<td class="bold">Cyl.</td>
		<td><?php echo $graduacion->od_cyl ?></td>
		<td><?php echo $graduacion->oi_cyl ?></td>
	</tr>
	<tr>
		<td class="bold">Eje</td>
		<td><?php echo $graduacion->od_axis ?></td>
		<td><?php echo $graduacion->oi_axis ?></td>
	</tr>
	<tr>
		<td class="bold">Add.</td>
		<td><?php echo $graduacion->od_add ?></td>
		<td><?php echo $graduacion->oi_add ?></td>
	</tr>
</table>