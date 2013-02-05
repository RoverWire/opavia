<p class="center bold">
	<?php if ($venta->folio_venta > 0): ?>
		Comprobante de Venta <br>
		<?php echo $venta->folio_venta ?>
	<?php else: ?>
		Cotización
	<?php endif ?>

</p>

<p class="center">
	Fecha de Expedición: <?php echo $venta->fecha; ?>
</p>

<table class="datos_cliente">
	<tr>
		<th colspan="2" class="underline">Datos del Cliente</th>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td class="bold" width="35%">Nombre</td>
		<td><?php echo $cliente->nombre.' '.$cliente->apellidos ?></td>
	</tr>
	<tr>
		<td  class="bold">Dirección</td>
		<td><?php echo $cliente->direccion ?></td>
	</tr>
	<tr>
		<td  class="bold">Teléfono</td>
		<td><?php echo $cliente->telefono ?></td>
	</tr>
	<tr>
		<td  class="bold">No. Cliente</td>
		<td><?php echo $cliente->id ?></td>
	</tr>
</table>

<?php if ($venta->id_graduacion > 0): ?>
<table class="articulos">
	<tr>
		<th class="underline" colspan="2">Cristales / Micas Graduadas</th>
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
<?php endif ?>


<table class="articulos">
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
			<td><?php echo $row->modelo ?></td>
			<td class="right"><?php echo number_format($row->total, 2) ?></td>
		</tr>
		<?php
			}
		?>

		<tr>
			<td class="underline" colspan="3"></td>
		</tr>
		<tr>
			<td class="right bold" colspan="2">Total:</td>
			<td class="right"><?php echo number_format($total, 2) ?></td>
		</tr>
		<?php if ($venta->folio_venta > 0): ?>
		<tr>
			<td class="right bold" colspan="2">Su pago:</td>
			<td class="right"><?php echo number_format($pago, 2) ?></td>
		</tr>
		<tr>
			<td class="right bold" colspan="2">Saldo:</td>
			<td class="right"><?php echo number_format(($total-$pago), 2) ?></td>
		</tr>
			
		<?php endif ?>
	</tbody>
</table>

<?php if ($venta->fecha_entrega): ?>
<p>Fecha de entrega: <?php echo $venta->fecha_entrega ?></p>

<p>Por favor, conserve este comprobante y muéstrelo cuando se le vaya hacer entrega de sus lentes terminados.</p>
<?php endif ?>