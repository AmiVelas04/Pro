<?php

$peticionajax=true;
require_once  "../core/configeneral.php";
if (isset($_POST['dpi-reg'])) 
{
	require_once "../controladores/administradorControlador.php";
	$insAdmin= new administradorControlador();
	if (isset($_POST['dpi-reg']) && isset($_POST['nombre-reg'])) 
	{
	echo $insAdmin->agregar_administrador_controlador();
	} 

}
else 
{
	session_start();
	session_destroy();
	echo '<script> windows.location.href="'.SERVERURL.'adminlist/"</script>';
	
}
