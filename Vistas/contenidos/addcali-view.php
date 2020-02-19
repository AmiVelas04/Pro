<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book-image zmdi-hc-fw"></i> INGRESO DE CALIFICACIONES</h1>
			</div>
			<p class="lead">Seleccione el Bimestre Para poder ingresar la calificacion</p>
		</div>
		<div class="container-fluid text-center">
			<div class="btn-group">
			<select class="form-control" id="bim" name="bim" onchange="" >
		<option value="0" >Seleccione un periodo</option>
		<option value="1" >Bimestre 1</option>
		<option value="2" >Bimestre 2</option>
		<option value="3" >Bimestre 3</option>
		<option value="4" >Bimestre 4</option>
		<option value="5" >Recuperacion</option>
	    </select>
            </div>
		</div>
		<div class="container-fluid">
			<h2 class="text-titles text-center">Ingresar datos de la calificacion</h2>
			<div class="row">
				<div class="col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<div class="row-picture">
								<img class="circle" src="<?php echo SERVERURL;?>vistas/assets/book/book-default.png" alt="icon">
							</div>
							<?php 
							require_once "./Controladores/alumnoControlador.php";
							
							if(isset($_GET["views"])){
								$ruta=explode("/",$_GET['views']);
							$alu=$ruta[1];
							$cu=$ruta[2];
						
							}
							else	
							{
								echo "No esta definida";
							}
							$al=new alumnoControlador();
							?>
							<div class="row-content">
								<h4 class="list-group-item-heading">Nombre del Alumno: <strong><?php echo $al->mostrar_alumno($alu);?></strong> </h4>
								<h5 class="list-group-item-heading">Curso: <strong> <?php echo $al->mostrar_curso($cu);?> </strong> <br> </h5>
								
							</div>

								<form>

								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Tarea 1</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="t1" required="" maxlength="2">
								</p>
								</div>
								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Tarea 2</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="t2" required="" maxlength="2">
								</p>
								</div>
								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Tarea 3</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="t3" required="" maxlength="2">
								</p>
								</div>		
								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Parcial 1</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="p1" required="" maxlength="2">
								</p>
								</div>
								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Parcial 2</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="p2" required="" maxlength="2">
								</p>
								</div>
								<div class="col-md-1">
								<p class="list-group-item-text">
								
									<label><strong>Examen</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="x1" required="" maxlength="2">
								</p>
								</div>
								<div class="col-md-2 text-center">
								<p class="list-group-item-text">
								
									<label><strong>Nota</strong></label>
									<input pattern="[0-9]{1,2}" class="form-control" type="text" name="not" required="" maxlength="2" disabled="true">
								</p>
								</div>
								<div class="col-md-1 text-center">
								<p class="list-group-item-text">
								
									<label><strong>Limpiar</strong></label>
									<br>
									<a  class="btn btn-warning" type="submit" name="limp"><i class="zmdi zmdi-undo"></i></a>
								</p>
								</div>
								<div class="col-md-1 text-center">
								<p class="list-group-item-text">
								
									<label><strong>Guardar</strong></label>
									<br>
									<button class="btn btn-success" type="submit" name="guard" ><i class="zmdi zmdi-check"></i></button>
								</p>
								</div>
							
							</form>
						</div>
						</div>
						<div class="list-group-separator"></div>
						
						<div class="list-group-separator"></div>
					</div>
				
				</div>
			</div>
		</div>
		