<script>
$(document).ready(function(){
$('.btn-exit-system').on('click', function(e){
		e.preventDefault();
		var Token=$(this).attr('href');
		swal({
		  	title: '¿Desea Salir?',
		  	text: "La sesion se cerrará y los cambios no guardados se perderan",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
			$.ajax({
				url:'<?php echo SERVERURL; ?>ajax/loginAjax.php?Token=' + Token,
				success:function(data){
					if (data=="true") 
					{
						window.location.href="<?php echo SERVERURL; ?> login/";
					} 
					else 
					{
						swal(
							"Ocurrio un error",
							"No se pudo cerrar la sesion",
							"error"
							);

					}


				}

			});
		});	
})


	});
</script>