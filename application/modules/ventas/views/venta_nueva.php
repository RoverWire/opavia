
<h1 class="page-title"><i class="icon-shopping-cart"></i> Venta Nueva</h1>

<?php if ($this->session->flashdata('msg_warning')): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $this->session->flashdata('msg_warning'); ?>
	</div>
<?php endif ?>

<div class="widget">
	<div class="widget-content">
		<form action="ventas/clientes" method="post" class="row-fluid">
			<div class="span6 center">
				<label for="buscar">Cliente Existente</label>
				<input type="text" name="buscar" class="input-medium search-query">
  				<button type="submit" class="btn">Buscar</button>
			</div>
			<div class="span6 center">
				<div class="hidden-desktop">&nbsp; <br> </div>
				<label for="">Cliente Nuevo</label>
				<a href="/ventas/cliente_nuevo" class="btn btn-success">Agregar Cliente</a>
			</div>
		</form>

		<div class="row-fluid">
			<div class="span6 center">
				<div class="hidden-desktop">&nbsp; <br> </div>
				<a href="/ventas/credito" class="btn btn-success">Consulta de Créditos</a>
			</div>
		</div>
	</div>
</div>