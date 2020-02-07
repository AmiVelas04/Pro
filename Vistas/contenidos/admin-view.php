<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> USUARIOS <small>CATEDRATICOS</small></h1>
			</div>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="<?php echo SERVERURL;?>admin" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; CATEDRATICOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo SERVERURL;?>adminlist" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CATEDRATICOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="<?php echo SERVERURL;?>adminsearch" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR CATEDRATICO
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo administrador -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CATEDRATICO</h3>
				</div>
				<div class="panel-body">
					<form data-form="save" action="<?php echo SERVERURL;?>ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">DPI*</label>
										  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dpi-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">NOMBRES *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">APELLIDOS *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">TELEFONO</label>
										  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
										  	<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre de usuario *</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Contraseña *</label>
										  	<input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la contraseña *</label>
										  	<input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">E-mail</label>
										  	<input class="form-control" type="email" name="email-reg" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<div class="form-group">
											<label class="control-label">Estado</label>
											<div class="radio radio-primary">
												<label>
													<input type="radio" name="optionsGenero" id="optionsRadiosA" value="Activa" checked="">
													<i class="zmdi zmdi-check"></i> &nbsp; Activado
												</label>
											</div>
											<div class="radio radio-primary">
												<label>
													<input type="radio" name="optionsGenero" id="optionsRadiosD" value="Desactivada">
													<i class="zmdi zmdi zmdi-block-alt"></i> &nbsp; Desactivado
												</label>
											</div>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
							    		<p class="text-left">
					                        <div class="label label-success">Nivel 1</div> Administrador
					                    </p>
					                    <p class="text-left">
					                        <div class="label label-primary">Nivel 2</div> Catedratico
					                    </p>
					                </div>
				    				<?php if (True) : ?>
				    				<div class="col-xs-12 col-sm-6">
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="optionsPrivilegio" id="optionsRadios1" value="<?php echo $lc->encryption(1); ?>">
												<i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
											</label>
										</div>
									<?php endif; ?>	
										<?php if (true) : ?>
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="optionsPrivilegio" id="optionsRadios2" value="<?php echo $lc->encryption(2); ?>">
												<i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
											</label>
										</div>
										<?php endif; ?>	
									</div>
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
					    <div class="RespuestaAjax"></div>
				    </form>
				</div>
			</div>
		</div>