<h1 class="page-title"><i class="icon-user"></i> Editar Información</h1>

<div class="widget">
	<div class="widget-content">
		<form action="" class="form-horizontal" method="post">
			<?php if ($this->session->flashdata('msg_success')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('msg_success'); ?>
				</div>
			<?php endif ?>
			
			<?php $error = form_error('datos[nombre]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="nombre" class="control-label">Nombre</label>
				<div class="controls">
					<input type="text" name="datos[nombre]" id="nombre" value="<?php echo set_value('nombre', $nombre); ?>"> 
					<?php echo $error; ?>
				</div>		
			</div>

			<?php $error = form_error('datos[apellidos]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="apellidos" class="control-label">Apellidos</label>
				<div class="controls">
					<input type="text" name="datos[apellidos]" id="apellidos" value="<?php echo set_value('apellidos', $apellidos); ?>">
					<?php echo $error; ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Guardar</button>
					<a href="/usuarios/perfil" class="btn btn-inverse">Regresar</a>
				</div>
			</div>
		</form>
	</div>
</div>