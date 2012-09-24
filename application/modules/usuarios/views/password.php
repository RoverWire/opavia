
<h1 class="page-title"><i class="icon-lock"></i> Cambiar Contraseña</h1>

<div class="widget">
	<div class="widget-content">
		<form action="" method="post" class="form-horizontal">
			<?php if ($this->session->flashdata('msg_success')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('msg_success'); ?>
				</div>
			<?php endif ?>

			<?php if (validation_errors() != ''): ?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<h4>Error</h4>
				La información está incompleta o errónea.
			</div>	
			<?php endif ?>

			<?php $error = form_error('actual'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="actual" class="control-label">Contraseña Actual</label>
				<div class="controls">
					<input type="password" name="actual" id="actual">
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('datos[pass]'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="pass" class="control-label">Nueva Contraseña</label>
				<div class="controls">
					<input type="password" name="datos[pass]" id="pass">
					<?php echo $error; ?>
				</div>
			</div>

			<?php $error = form_error('repetir'); ?>
			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<label for="repetir" class="control-label">Repetir Contraseña</label>
				<div class="controls">
					<input type="password" name="repetir" id="repetir">
					<?php echo $error; ?>
				</div>
			</div>

			<div class="control-group<?php echo ($error != '') ? ' error' : ''; ?>">
				<div class="controls">
					<button type="submit" class="btn">Cambiar</button>
				</div>
			</div>
		</form>
	</div>
</div>