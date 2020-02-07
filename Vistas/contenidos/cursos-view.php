<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>NUEVO CURSO</small></h1>
			</div>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
		</div>
		
		<!-- Panel nuevo curso -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CURSO</h3>
				</div>
				<div class="panel-body">
					<form>
						<fieldset>
							<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre del curso *</label>
										  	<input pattern="[a-zA-Z0-9-]{1,30}" class="form-control" type="text" name="codigo-reg" required="" maxlength="30">
										</div>
				    				</div>
									<div class="col-xs-12 col-sm-6">
									<?php require_once "./controladores/cursocontrolador.php";
									$carr = new cursoControlador();

		?>
									<h2><label class="control-label">Carrera *</label></h2>
									<div class="btn-group">
									
              <a href="javascript:void(0)" class="btn btn-default btn-raised">Carrera</a>
              <a href="javascript:void(0)" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php echo $carr->mostrar_carrera(); ?>
               
              </ul>
            </div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
									<?php require_once "./controladores/cursocontrolador.php";
									$grad = new cursoControlador();

		?>
									<h2><label class="control-label">Grado *</label></h2>
									<div class="btn-group">
									
              <a href="javascript:void(0)" class="btn btn-default btn-raised">Grado</a>
              <a href="javascript:void(0)" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
			  <?php echo $grad->mostrar_grado(); ?>
               
              </ul>
            </div>
				    				</div>
				    			
				    				
				    				
				    			
								</div>
							</div>
						</fieldset>
						<br>
						
		    					<p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
					</form>
				</div>
			</div>
		</div>
