			
<table>
	<thead>
		<tr>
			<th>Linea</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Existencia</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($query->result() as $row): ?>
		<tr>
			<td><?php echo utf8_decode($row->linea) ?></td>
			<td><?php echo utf8_decode($row->marca) ?></td>
			<td><?php echo utf8_decode($row->modelo) ?></td>
			<td><?php echo $row->existencia ?></td>
		</tr>

	<?php endforeach ?>

	</tbody>
</table>