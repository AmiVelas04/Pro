<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

class usuModelo extends modeloMain
{
    protected function agregar_alumno_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("Insert into usuario(id_usu,usuario,pass,tipo,estado) values(:cod,:usuario,:pass,:tipo,:estado)");
    	$sql->bindparam(":cod",$datos['codigo']);
        $sql->bindparam(":usuario",$datos['nombre']);
        $sql->bindparam(":pass",$datos['pass']);
        $sql->bindparam(":tipo",$datos['tipo']);
        $sql->bindparam(":estado",$datos['estado']);
	
		
try{l,
		$sql->execute();
		return $sql;
	}
	catch (PDOException $e)
	{
		echo "El error al agregar al alumno es: " .$e;
	}
		
		
	}

}


