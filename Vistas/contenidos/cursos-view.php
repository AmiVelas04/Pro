c<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>NUEVO CURSO</small></h1>
			</div>
			<p class="lead">Por favor ingrese el nombre del curso y seleccione el grado y la carrera a la que pertenece</p>
		</div>
		
		<!-- Panel nuevo curso -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CURSO</h3>
				</div>
				<div class="panel-body">
					<form data-form="save" action="<?php echo SERVERURL;?>Ajax/cursoajax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data>
						<fieldset>
							<legend><i class="zmdi zmdi-library></i> &nbsp; Información básica</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre del curso *</label>
										  	<input pattern="[a-zA-Z0-9-]{1,30}" class="form-control" type="text" name="curso" required="" maxlength="60">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
									<?php require_once "./controladores/cursocontrolador.php";
									$carr = new cursoControlador();?>
									<h2><label class="control-label">Carrera *</label></h2>
									<div class="btn-group">
									
									<div class="btn-group">
									  <select class="form-control" id="carrera" name="carr">
			 						  <?php echo $carr->mostrar_carrera(); ?>
										</select>
              							 </div>
           								 </div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
									<?php require_once "./controladores/cursocontrolador.php";
									$grad = new cursoControlador();

		?>
									<h2><label class="control-label">Grado *</label></h2>
									<div class="btn-group">
									<div>
             						<select class="form-control" id="grado" name ="grad">
			   						<?php echo $carr->mostrar_grado(); ?>
									</select>
		
									</div>
           
           					 </div>
				    				</div>
				    			
				    			
								</div>
							</div>
						</fieldset>
						<br>
						
		    					<p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Guardar</button>
					    </p>
					</form>
					<div class="RespuestaAjax">	</div>
				</div>
			</div>
		</div>
