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
		echo "El error al agregar al alumno es: " .$e;
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
		echo "El error al agregar al encargado  es: " .$e;
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
	echo "El error al agregar al telefono es: " .$e;
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
	echo "El error al asignar telefono es: " .$e;
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
	echo "El error al agregar al alumno es: " .$e;
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

protected function asigna_alu_carr_grad($idal,$idcarr,$idgrad)
{
	$sql=modeloMain::conectar()->prepare("Insert into asigna_alum(cod_al,id_carr,id_grado) values(:al,:carr,:grad)");
	$sql->bindparam(":al",$idal);
	$sql->bindparam(":carr",$idcarr);
	$sql->bindparam(":grad",$idgrad);
	try{
	$sql->execute();
	// linea opcional para probar funcionalidad del ingreso del alumno
	//return $sql;
	// intento de crea calificaciones de cada curso para el alumno ya asignado
	if($sql->rowCount()>=1)
	{
		
		if (self::iniciar_calificacion_curso($idal,$idcarr,$idgrad))
		{
		return $sql;
		}
		else
		{
		echo "error al generar una nueva calificacion idalumno: ". $idal . ", id carrera: " . $idcarr . " $idgrad";
		}
	}
	else
	{
		echo "Error en asignacion de alumno";	
	}
}
catch(PDOException $e)
{
echo $e;

}
	
}


protected function mostrar_alumno_modelo($id)
{
$consul="select nombre from alumno where cod_al='" . $id ."'";

$sql=modeloMain::ejecutar_consulta_simple($consul);

return $sql;
}

protected function mostrar_curso_modelo($id)
{
	$consul="select nombre from curso where id_curso=".$id;
	$sql=modeloMain::ejecutar_consulta_simple($consul);
	return $sql;
}
protected function iniciar_calificacion_curso($alumno,$carrera,$grado)
{
$buscacur_query="SELECT id_curso as id fROM curso WHERE id_carr=".$carrera." AND id_grado=" . $grado;

$sql1=modeloMain::ejecutar_consulta_simple($buscacur_query);
$datos1=$sql1->fetchAll();
foreach ($datos1 as $row) {
	$inscali=modeloMain::conectar()->prepare("insert into calificacion(id_curso,cod_al) values(:curso,:alumno)");
	$inscali->bindParam(":curso",$row['id']);
	$inscali->bindParam(":alumno",$alumno);
	$inscali->execute();
	if ($inscali->rowcount()>=1) {
	

		$buscacali_query="Select id_cali as id from calificacion where id_curso=".$row['id']." and cod_al='" . $alumno . "'";
		$sqlcali=modeloMain::ejecutar_consulta_simple($buscacali_query);
		
		if ($sqlcali->rowCount()>=1)
		{
			$c=0;
			$total2=$sqlcali->rowCount();
			$datos2=$sqlcali->fetchall();
			foreach ($datos2 as $fila) {
				for ($i=1; $i <=5 ; $i++) { 
				$ins_detalle_cali=modeloMain::conectar()->prepare("insert into detalle_cali(id_cali,id_peri) values(:calificacion,:periodo)");
				$ins_detalle_cali->bindParam(":calificacion",$fila['id']);
				$ins_detalle_cali->bindParam(":periodo",$i);
				$ins_detalle_cali->execute();
				
				}
				$c++;
			}
			if ($c>=$total2)
			{
				return true;
			}

		}
		else{
			return false;
		}
	} else {
		return false;
	}
	
}


}

}