	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="login-box">
				<div class="widget">
					<div class="widget-header">
						<h3>Inicio de Sesión</h3>
					</div>
					<div class="widget-content">
						<?php echo validation_errors(); ?>
						<form action="" method="post" class="form-horizontal">
							<div class="control-group input-prepend">
								<span class="add-on"><i class="icon-user"></i></span>						
								<input type="text" name="usuario" id="usuario" class="login-input" placeholder="usuario">						
							</div>

							<div class="control-group input-prepend">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input type="password" name="pass" id="pass" class="login-input" placeholder="contraseña">
							</div>

							<div class="center">
								<button type="submit" class="btn btn-large btn-block">Entrar</button>
							</div>				
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
