<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

class administradorModelo extends modeloMain
{
	protected function agregar_administrador_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("Insert into Catedratico(nombre,apellido,dpi,direccion,id_usu) values(:nombre,:apellido,:dpi,:direccion,:codigo)");
		$sql->bindparam(":dpi",$datos['dpi']);
		$sql->bindparam(":nombre",$datos['nombre']);
		$sql->bindparam(":apellido",$datos['apellido']);
		$sql->bindparam(":direccion",$datos['direccion']);
		$sql->bindparam(":codigo",$datos['codigo']);
try{
		$sql->execute();
		return $sql;
	}
	catch (PDOException $e){
	


	}
		
		

	}
}