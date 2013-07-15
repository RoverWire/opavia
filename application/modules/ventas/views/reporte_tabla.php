
<?php if (is_object($datos)): ?>

<table>
	<caption>Reporte de Ingresos</caption>
	<thead>
		<tr>
			<th>Cliente</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Abono</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos->result() as $row): ?>
		<tr>
			<td><?php echo $row->nombre.' '.$row->apellidos ?></td>
			<td align="center"><?php echo $row->fecha ?></td>
			<td align="right"><?php echo ($row->abono == $row->total) ? 'Contado':'Abono' ?></td>
			<td><?php echo $row->abono ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php endif ?>
