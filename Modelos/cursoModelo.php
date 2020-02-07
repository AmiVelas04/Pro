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
	protected function agregar_curso_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("Insert into curso(id_curso,nombre,id_carr,id_grado) values(:id,:nombre,:carrera,:grado)");
        $id=cursoModelo::id_curso($datos['curso']);
        $sql->bindparam(":id",$id);
		$sql->bindparam(":nombre",$datos['curso']);
		$sql->bindparam(":carrera",$datos['carrera']);
		$sql->bindparam(":grado",$datos['grado']);
		
try{
  
        $sql->execute();
        echo $sql->errorInfo();
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
    protected function id_carrera($carrera)
    {
        $consul="Select id_carr from carrera where carrera='". $carrera . "'";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        $sql->fetchAll();
        foreach ($sql as $row) {
        $id=$row['id_carr'];

        }
        return $id;

    }

    protected function id_grado($grado)
    {
        $consul="Select id_grado from grado where grado='". $grado . "'";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        $sql->fetchAll();
        foreach ($sql as $row) {
        $id=$row['id_carr'];

        }
        return $id;

    }

    protected function id_curso()
    {
        $consul="select id_curso from curso";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        $total=$sql->rowCount();
        $total+=1;
        return $total;

    }

    
}