
<h2>Consulta de Usuarios</h2>

<table class="table table-hover">
	<thead>
		<tr>
			<th width="2%">#</th>
			<th width="30%">Nombre</th>
			<th width="30%">Usuario</th>
			<th width="2%">Activo</th>
			<th>Opciones</th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($query->result() as $row): ?>
		<tr>
			<td><input type="checkbox" name="del[]" value="<?php echo $row->id; ?>"></td>
			<td><?php echo $row->nombre . ' ' . $row->apellidos; ?></td>
			<td><?php echo $row->usuario; ?></td>
			<td><?php echo ($row->activo == 0) ? 'No' : 'Si'; ?></td>
			<td>
				<a href="/usuarios/editar/<?php echo $row->id; ?>" class="icon-pencil" title="editar"></a>
				<a href="#" class="icon-off" title="desactivar"></a>
				<a href="#" class="icon-remove" title="eliminar"></a>				 
			</td>	
		</tr>

	<?php endforeach ?>
	</tbody>
</table>
