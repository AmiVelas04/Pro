<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

class cursoModelo extends modeloMain
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
    protected function mostrar_grado_modelo()
    {
        $consul="Select grado from grado";
        $sql=modeloMain::ejecutar_consulta_simple($consul);

        return $sql;
    }

    protected function mostrar_carrera_modelo()
    {
        $consul="Select carrera from carrera";
        $sql=modeloMain::ejecutar_consulta_simple($consul);

        return $sql;
    }
    protected function mostrar_catedratico_modelo()
    {
        $consul="Select nombre from catedratico";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    protected function mostrar_curso_modelo($car,$grad)
    {
        $consul="Select id_curso,nombre from curso where id_carr=". $car . " and id_grado=". $grad;
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;

    }
}