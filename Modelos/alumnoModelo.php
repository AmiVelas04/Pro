<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}
Global $idenc;
Global $idtel;


class alumnoModelo extends modeloMain
{
	protected function agregar_alumno_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("Insert into alumno(cod_al,nombre,edad) values(:cod,:nombre,:edad)");
		$sql->bindparam(":nombre",$datos['nombre']);
		
		$sql->bindparam(":cod",$datos['codigo']);
		$sql->bindparam(":edad",$datos['edad']);
try{
		$sql->execute();
		return $sql;
	}
	catch (PDOException $e)
	{
	}
		
		
	}
//agregar encargado
protected function agregar_encargado_modelo($datos)
	{
		$sql=modeloMain::conectar()->prepare("Insert into encargado(nombre,dpi) values(:nombre,:dpi)");
		$sql->bindparam(":dpi",$datos['dpi']);
		$sql->bindparam(":nombre",$datos['nombre']);
		
try{
		$sql->execute();
		
			return $sql;
	

	}
	catch (PDOException $e)
	{
	}
	
}

protected function agregar_telefono_modelo($datos){
	$sql=modeloMain::conectar()->prepare("Insert into telefono(telefono) values(:telefono)");
	$sql->bindparam(":telefono",$datos['telefono']);
		try{
	$sql->execute();

			return $sql;
}
catch (PDOException $e)
{
}


}

protected function Asignar_telefono_encargado($enc,$tel)
{

		$sql=modeloMain::conectar()->prepare("Insert into asigna_tel_enc(id_enc,id_tel) values(:enc,:tel)");
	$sql->bindparam(":enc",$enc);
	$sql->bindparam(":tel",$tel);
		try{
	$sql->execute();
	return $sql;
}
catch (PDOException $e)
{
}
}
protected function Asignar_alumno_encargado($idal,$idenc)
{

		$sql=modeloMain::conectar()->prepare("Insert into asigna_encar(id_enc,cod_al) values(:enc,:al)");
	$sql->bindparam(":enc",$idenc);
	$sql->bindparam(":al",$idal);
		try{
	$sql->execute();
	return $sql;
}
catch (PDOException $e)
{
}
}

protected function codigo_telefono($telefono){
	$sql=modeloMain::ejecutar_consulta_simple("Select id_tel from telefono where telefono='" . $telefono . "'");
	foreach($sql as $rows)
	{
		$id=$rows['id_tel'];
	}
	return $id;

}

protected function codigo_encargado($encargado){
	$sql=modeloMain::ejecutar_consulta_simple("Select id_enc from encargado where nombre='" . $encargado . "'");
	foreach($sql as $rows)
	{
		$id=$rows['id_enc'];
	}
	return $id;
}

protected function mostrar_carrera_modelo()
{
	$consul="Select id_carr as id, carrera from carrera";
	$sql=modeloMain::ejecutar_consulta_simple($consul);

	return $sql;
}

protected function mostrar_grado_modelo()
{
	$consul="Select id_grado as id, grado from grado";
	$sql=modeloMain::ejecutar_consulta_simple($consul);
	return $sql;
}

}