
<h1 class="page-title"><i class="icon-shopping-cart"></i> Impresión de Comprobantes</h1>

<div class="widget">
	<div class="widget-content">
		<p class="center">Su <?php echo ($venta->folio_venta > 0) ? 'Venta':'Cotización' ?> ha sido guardada. Puede imprimir el
			comprobante correspondiente.</p>

		<p class="center">
			<a href="/ventas/tickets/comprobante/<?php echo $venta->id ?>" class="btn btn-small" target="blank"><i class="icon-print"></i> Comprobante</a>

			<?php if ($venta->folio_venta > 0 && $venta->id_graduacion > 0): ?>
				<a href="/ventas/tickets/orden/<?php echo $venta->id ?>" class="btn btn-small" target="blank"><i class="icon-print"></i> Orden de Laboratorio</a>
			<?php endif ?>
		</p>
		<hr>
		<p class="center">
			<a href="/ventas/" class="btn btn-success">Regresar a Ventas</a>
		</p>
	</div>
</div>