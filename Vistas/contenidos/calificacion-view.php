<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Alumnos</h1>
			</div>
			<?php require_once "./controladores/calificacionControlador.php"; 
			?>
			<p class="lead">Seleccione la carrera, el grado y el curso para poder ingresar calificaciones</p>
		</div>
		
	
		<div class="col-xs-12 col-sm-4 text-center">
		<h2><label class="">Carrera *</label></h2>
		<div class="btn-group">
		<div class="btn-group">
		 <select class="form-control" id="carrerac" name="carrerac" onchange="mostrar_grad('<?php echo trim($_SESSION['usuario']); ?>');" >
		 <?php 
		 $cur=new calificacionControlador();
		echo $cur->mostrar_carrera();
		?>
	    </select>
       	</div>
         </div>
		</div>
		
		
	
		<div class="col-xs-12 col-sm-4 text text-center">
		<h2><label class="">Grado *</label></h2>
		<div class="btn-group">
		<div class="btn-group">
	
		
		<div id ="mgrado" name="mgrado"></div>
	
		
	
		</select>
        </div>
        </div>
		</div>
	

		
		<div class="col-xs-12 col-sm-4 tex text-center">
		<h2><label class="">Curso *</label></h2>
		<div class="btn-group">
		<div class="btn-group">
		<div id="mostracurso" name="mostracurso"></div>
        </div>
        </div>
		</div>
		
		

		<div class="container-fluid">
		
			<div class="row">
				<div class="col-xs-12">
					<div class="list-group">
					<div class="panel panel-primary">
						<div class="panel panel-heading"> 
						<h4 class="text-titles text-center">Listado de Alumnos</h4>
						</div>
						<div class="panel panel-body">
						<div id="alumn" name="alumn"></div>
						</div>
						</div>
				
					
						
					</div>
					<nav class="text-center">
						<ul class="pagination pagination-sm">
							<li class="disabled"><a href="javascript:void(0)">«</a></li>
							<li class="active"><a href="javascript:void(0)">1</a></li>
							<li><a href="javascript:void(0)">2</a></li>
							<li><a href="javascript:void(0)">3</a></li>
							<li><a href="javascript:void(0)">4</a></li>
							<li><a href="javascript:void(0)">5</a></li>
							<li><a href="javascript:void(0)">»</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		