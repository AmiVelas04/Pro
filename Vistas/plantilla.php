
<!DOCTYPE html>
<html lang="es">
<head>
	<title> <?php echo proy; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href=" <?php echo SERVERURL; ?>Vistas/css/main.css" >
		
	
</head>
<body>
<?php include "Vistas/Modulos/script.php";
	?>
	<?php 


$peticionajax=false; 
require_once "./controladores/vistascontrolador.php";
$vt= new vistasControlador();
$vistasR=$vt->obtener_vistas_controlador();

	if($vistasR=="login" || $vistasR=="404"):
		if ($vistasR=="login") {
		require_once "./vistas/contenidos/login-view.php";
		} else {
			require_once "./vistas/contenidos/404-view.php";
		}
		else:
	session_start(['name'=>'pyc']);
	require_once "./controladores/logincontrolador.php";
	$lc=new loginControlador();
	if (!isset($_SESSION['token_pyc']) || !isset($_SESSION['usuario_pyc'])) 
	{
		//$lc->forzar_cierre_sesion_controlador();
	}

	 ?>
	<!--Barra Lateral -->
	<?php include "Vistas/Modulos/navlateral.php";?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		
		<!-- Content page-->
		<?php include "Vistas/Modulos/navbar.php";
		require_once $vistasR;
		
		?>
		
		
		
	</section>
	<?php include "./Vistas/Modulos/logoutScript.php";
 	endif; ?>

	
	<script>
		$.material.init();
		
	</script>	
</body>
</html>