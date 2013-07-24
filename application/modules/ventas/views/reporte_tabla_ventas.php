
<?php if (is_object($datos)): ?>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Cliente</th>
			<th>Fecha</th>
			<th>Cantidad</th>
			<th>Articulo</th>
			<th>Importe</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos->result() as $row): ?>
		<tr>
			<td><?php echo $row->nombre.' '.$row->apellidos ?></td>
			<td><?php echo $row->fecha ?></td>
			<td><?php echo $row->cantidad ?></td>
			<td><?php echo $row->marca.' '.$row->modelo ?></td>
			<td><?php echo '$ '.number_format($row->total, 2) ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php endif ?>
