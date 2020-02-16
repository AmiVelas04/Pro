<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administración <small>Alumnos</small></h1>
			</div>
			<p class="lead"></p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="provider.html" class="btn btn-info">
						  <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ALUMNO
							  		</a>
			  	</li>
			  	<li>
			  		<a href="provider-list.html" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ALUMNOS
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel nuevo ALUMNO -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO ALUMNO</h3>
				</div>
				<div class="panel-body">
					<form data-form="Guradar" name="formalumn" action="<?php echo SERVERURL;?>ajax/alumnoAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Información del Alumno</legend>
				    		<div class="container-fluid">
				    			<div class="row">
								<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Codigo del Alumno *</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,10}" class="form-control" type="text" name="cod-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre del Alumno *</label>
										  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Nombre del Responsable *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="responsable-reg" required="" maxlength="50">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">DPI del Responsable *</label>
										  	<input pattern="[0-9+]{1,13}" class="form-control" type="text" name="dpi-reg" required="" maxlength="50">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Edad</label>
										  	<input pattern="[0-9+]{1,2}" class="form-control" type="text" name="edad-reg" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
										  	<input pattern="[0-9+]{1,8}" class="form-control" type="text" name="telefono-reg" maxlength="15">
										</div>
				    				</div>
				    				
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
										  	<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
										</div>
									</div>

									<div class="col-xs-12 col-md-3 col-lg-offset-2">
										<div class="form-group label-floating">
										<?php require_once "./controladores/alumnoControlador.php";
												$grad = new alumnoControlador();
												$carr = new alumnoControlador();?>
										  	<label class="control-label">Carrera</label>
											  <select class="form-control" id="carr" name="carr">
											 <?php Echo $carr->mostrar_carrera_controlador();?>
											  </select>
										</div>
									</div>

									<div class="col-xs-12 col-md-3 col-lg-offset-2">
										<div class="form-group label-floating">
										  	<label class="control-label">Grado</label>
										  	<select class="form-control" id="grad" name= "grad">
												 
												  <?php Echo $grad->mostrar_grado_controlador();?>
												 
											  </select>
										</div>
									</div>
									
				    			</div>
				    		</div>
						</fieldset>
						<legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Fotografia</legend>
							<div class="col-xs-12">
		    					<div class="form-group">
		    						<span class="control-label">Imágen</span>
									<input type="file" name="imagen-reg" accept=".jpg, .png, .jpeg">
									<div class="input-group">
										<input type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
										<span class="input-group-btn input-group-sm">
											<button type="button" class="btn btn-fab btn-fab-mini">
												<i class="zmdi zmdi-attachment-alt"></i>
											</button>
										</span>
									</div>
									<span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
								</div>
		    				</div>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
						</p>
						<div class="RespuestaAjax"></div>
				    </form>
				</div>
			</div>
		</div>