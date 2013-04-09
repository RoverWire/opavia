<h1 class="page-title"><i class="icon-money"></i> Abono a Crédito</h1>

<div class="widget">
	<div class="widget-content">
		<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Saldo</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<span class="span2 uneditable-input"><?php echo number_format($saldo, 2) ?></span>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Cantidad a Abonar</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<input class="span2" id="abono" name="abono" type="text" placeholder="0.00">
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn" type="submit">Realizar Abono</button>
					<a class="btn" href="/ventas/credito">Regresar</a>
				</div>
			</div>			
		</form>
	</div>
</div>