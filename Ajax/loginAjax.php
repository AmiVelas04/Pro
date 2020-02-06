<?php 
$peticionajax=true;
require_once  "../core/configeneral.php";
if (isset($_GET['Token'])) 
{
	require_once "../Controladores/loginControlador.php";
$logout=new loginControlador();
//echo $logout->cerrar_sesion_controlador();

}
else 
{
	session_start();
	session_destroy();
	echo '<script> windows.location.href="'.SERVERURL.'adminlist/"</script>';
	
}

