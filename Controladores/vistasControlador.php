<?php 
require_once "./Modelos/vistasModelo.php";
class vistasControlador extends vistasModelo{

	public function obtener_plantilla()
	{
		return require_once "./Vistas/plantilla.php";
	}	
	public function obtener_vistas_controlador()
	{
		if(isset($_GET['views']))
		{
			$ruta=explode("/",$_GET['views']);

			$respuesta=vistasModelo::obtener_vistas_modelo($ruta[0]);
			foreach ($ruta as $row) {

			//echo "Esta es la vista que busca: " . $respuesta;
			//echo "<br>";
				
			}
		}
		else
		{
			$respuesta="login";


		}	
		return $respuesta;

	}
}