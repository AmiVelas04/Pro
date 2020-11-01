
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>ASIGNACIÓN DE CURSOS</small></h1>
			</div>
			<p class="lead"></p>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  
			</ul>
		</div>

		<!-- panel datos de la empresa -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA ASIGNACION</h3>
				</div>
				<div class="panel-body">
					<form data-form="save"  method="POST" class="FormularioAjax" action="<?php echo SERVERURL;?>ajax/asignacionAjax.php" name= "FormularioAjax" autocomplete="on" enctype="multipart/form-data">
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
									  <select class="form-control" onchange="habilitar(this.value,grado.value,cat.value);" name="carrera" id="carrera">
			 						  <?php echo $carr->mostrar_carrera(); ?>
										</select>
              							 </div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
									<h2><label class="control-label">Grado *</label></h2>
									<div class="btn-group">
									<div>
             						<select class="form-control"  onchange="habilitar(this.value,carrera.value,cat.value);" id="grado" name="grado">
									   <?php 
									   echo $carr->mostrar_grado(); ?>
									</select>
		
									</div>
          						  </div>
							</div>
							
								<div class="col-xs-12 col-sm-6">
								<h2><label class="control-label">Cursos *</label></h2>
								<div class="btn-group">
									<div id="curso" name="curso"> 
									
									</div>
								</div>	
									</div>
            </div>
									</div>

									<div class="col-xs-12 col-sm-6">
									<h2><label class="control-label">Catedratico*</label></h2>
									<div class="btn-group">
									
									<div>
             <select class="form-control" id="cat" name ="cat">
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
							
						<button type="submit" id= "save" name ="id" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Guardar</button>
					    </p>
						<div name="respuesta" id="respuesta"></div>
						<div name="RespuestaAjax" id="RespuestaAjax"></div>
					</form>
					<?php
				
					if (isset($_GET['resp']))
					{
						echo "<script>alert( 'hola');</script>";
						$resp=$_GET['resp'];
						echo $resp;
						if( $resp==1)
						{
							$titulo="Asignacion ya realizada";
						$msj="La asignación ya se haba realizadop con anterioridad";
						$icono="warning";
						echo "<script>mensaje('".$titulo."','".$msj."','".$icono."');</script>";
						  
						}
						elseif($resp==2)
						{
							$titulo="Asignacion correcta";
							$msj="La asignación se  realizo correctamente";
							$icono="success";
							echo "<script>mensaje('".$titulo."','".$msj."','".$icono."');</script>";
							  						
						}
						else
						{
							
							$titulo="Error en la asignacion";
							$msj="No se llevo a cabo la asignacion";
							$icono="error";
							echo "<script>mensaje('".$titulo."','".$msj."','".$icono."');</script>";
							  
						}

					}

?>
					
					
				</div>
			</div>
		</div>
		