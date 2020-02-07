
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>CATEDRATICOS</small></h1>
			</div>
			<p class="lead"></p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="company.html" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA ASIGNACION DE CURSOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="company-list.html" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CURSOS			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- panel datos de la empresa -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA ASIGNACION</h3>
				</div>
				<div class="panel-body">
					<form data-form="save" action="<?php echo SERVERURL;?>ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
				    		<div class="container-fluid">
				    			<div class="row">
								
				    				<div class="col-xs-12 col-sm-6">
										<?php 
										require_once "./controladores/cursocontrolador.php";
										$carr=new cursoControlador();?>
										<h2><label class="control-label">Carrera *</label></h2>
										<div class="btn-group">
									  <select class="form-control" onchange="habilitar(this.value,grado.value,cat.values);" name="carrera" id="carrera">
			 						  <?php echo $carr->mostrar_carrera(); ?>
										</select>
              							 </div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
									<h2><label class="control-label">Grado *</label></h2>
									<div class="btn-group">
									<div>
             						<select class="form-control"  onchange="habilitar(this.value,carrera.value,cat.values);"id="grado" name="grado">
			   						<?php echo $carr->mostrar_grado(); ?>
									</select>
		
									</div>
          						  </div>
							</div>
							
								<div class="col-xs-12 col-sm-6">
								<h2><label class="control-label">Cursos *</label></h2>
								<div class="btn-group">
									<div id="curso"> </div>
								</div>	
									</div>
            </div>
									</div>

									<div class="col-xs-12 col-sm-6">
									<h2><label class="control-label">Catedratico*</label></h2>
									<div class="btn-group">
									
									<div>
             <select class="form-control" id="cat">
			   <?php echo $carr->mostrar_catedratico(); ?>
			</select>
		
		</div>
            </div>
									</div>
									
									
				    				
				    			
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm" id="save"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
				</div>
			</div>
		</div>
		