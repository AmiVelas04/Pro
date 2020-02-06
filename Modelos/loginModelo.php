<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

class loginModelo extends modeloMain
{
	protected function iniciar_sesion_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("select * from usuario where usuario=:usuario and pass=:pass and estado='Activa'");
		//$clave=modeloMain::encryption($datos['pass']);
		$sql->bindparam(":usuario",$datos['usuario']);
		$sql->bindparam(":pass",$datos['pass']);
		//echo $clave;
		$sql->execute();
		return $sql;
	}

	protected function cerrar_sesion_modelo($datos)
	{
		if ($datos['usuario']!='' && $datos['token_s']==$datos['token']) 
		{
			$abitacora=modeloMain::actualizar_bitacora($datos['codigo'],$datos['hora']);
			if ($abitacora->rowcount()==1) 
			{
			session_unset();
			session_destroy();
			$respuesta="true";

			} 
			else 
			{
			$respuesta="false";
			}
			
		} 
		else 
		{
			$respuesta="false";
		}
		return $respuesta;
		

	}
}