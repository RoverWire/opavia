<h1 class="page-title"><i class="icon-eye-open"></i> Reportes de Ventas</h1>

<div class="widget">
	<div class="widget-content">
		<form action="" method="post">
			<div class="row-fluid">
				<div class="span4">
					<label for="inicio" class="control-label">De</label>
					<input type="date" size="10" class="input-medium" name="inicio" id="inicio" value="<?php echo set_value('inicio') ?>" required>
				</div>
				<div class="span4">
					<label for="final" class="control-label">A</label>
					<input type="date" size="10" class="input-medium" name="final" id="final" value="<?php echo set_value('final') ?>" required>
				</div>
				<div class="span4">
					<label for="filtro" class="control-label">Mostrar</label>
					<select name="filtro" id="filtro" class="input-medium">
						<option value="0">Todos</option>
						<option value="1">Abonos Parciales</option>
						<option value="2">Ventas Contado</option>
					</select>
				</div>
				<br class="clear"> &nbsp;
				<div class="row-fluid">
					<div class="span8">
						<label for="descarga" class="checkbox">
							<input type="checkbox" name="descarga" id="descarga" value="1">
							Descargar el reporte como archivo excel.
						</label>
					</div>
					<div class="span4">
						<button class="btn btn-success"><i class="icon-search"></i> Filtrar Reporte</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php if (is_object($datos)): ?>

<div class="widget widget-table">
	<div class="widget-header">

	</div>
	<div class="widget-content">
		<table class="table table-bordered table-striped">
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
					<td><?php echo $row->fecha ?></td>
					<td><?php echo ($row->abono == $row->total) ? 'Contado':'Abono' ?></td>
					<td><?php echo '$ '.number_format($row->abono, 2) ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<?php endif ?>