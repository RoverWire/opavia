
<h1 class="page-title"><i class="icon-shopping-cart"></i> Impresión de Comprobantes</h1>

<div class="widget">
	<div class="widget-content">
		<p>Su <?php echo ($venta->folio_venta > 0) ? 'Venta':'Cotización' ?> ha sido guardada.</p>

		<p class="center">
			<a href="#" class="btn">Imprimir Comprobante</a>

			<?php if ($venta->folio_venta > 0): ?>
				<a href="#" class="btn">Orden de Laboratorio</a>
			<?php endif ?>
		</p>
	</div>
</div>