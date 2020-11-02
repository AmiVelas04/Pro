
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
				    	</fieldset>
				    	<br>
				    
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
						<button type="submit" id= "save" name ="id" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Guardar</button>
					    </p>
						<div name="RespuestaAjax" id="RespuestaAjax"></div>
					</form>
				</div>
			</div>
		</div>

		<?echo ?>
		<script>
		
$('.FormularioAjax').submit(function(e)
{
	e.preventDefault();
	var form=$(this);
	var tipo = form.attr('data-form');
	var accion = form.attr('action');
	var metodo = form.attr('method');
	var respuesta = form.children('.RespuestaAjax');
	var MsjError=  swal('Ocurrio un error'); 
	var formdata= new FormData(this);

	var textoAlerta;
	if (tipo==='save') 
	{
		textoAlerta="los datos seran almacenados" ;
	}
	else if(tipo==='delete')
	{
	textoAlerta="los datos seran eliminados";	
	}
	else if(tipo==='update')
	{
	textoAlerta="los datos se actualizaran";	
	}
	else
	{
	textoAlerta="Desear realizar esta operacion?";		
	}

	swal({

		title:"¿Seguro?",
		text:  textoAlerta,
		type: "question",
		showCancelButton:true,
		confirmButtonText:"Aceptar",
		cancelButtonText:"Cancelar"
	}).then(function ()
	{
		$.ajax({
			type: metodo,
			url: accion,
			data: formdata ? formdata: form.serialize(),
			cache:false,
			contentType:false,
			processData:false,
			xhr: function()
			{
				var xhr= new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt)
				{
					if (evt.lengthComputable)
					{
						var percentComplete=evt.loaded /evt.total;
						percentComplete=parseInt(percentComplete*100);
						if (percentComplete<100) 
						{
							respuesta.append('<p class"text-center">Procesando...</p>');
						}
						else
						{
							respuesta.html('<p class"text-center"></p>');
						}
					}
				},false);
				return xhr;
			},
			success:function(data)
			{
				respuesta.html(data);
			},
			error:function () 
			{
				respuesta.html(MsjError);
				
			}
			});
		return false;
	}
		   );
});

</script>
		