<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

class calificacionModelo extends modeloMain{
protected function mostrar_alumnos_curso_carrera($curso,$carrera,$grad)
{
$sql=modeloMain::ejecutar_consulta_simple("SELECT a.nombre,a.fotografia FROM alumno a 
INNER JOIN asigna_alum aa ON aa.cod_al=a.cod_al
INNER JOIN carrera carr ON carr.id_carr =aa.id_carr
INNER JOIN grado grad ON grad.id_grado=aa.id_grado
INNER JOIN curso cur ON cur.id_carr=aa.id_carr AND cur.id_grado AND aa.id_grado
WHERE cur.id_curso=". $curso." AND carr.id_carr=".$carrera." AND grad.id_grado=" . $grad);
return $sql;
}

protected function mostrar_carrera_catedratico($cat)
{
$sql=modeloMain::ejecutar_consulta_simple("SELECT carr.id_carr as id, carr.carrera as carreraFROM carrera carr 
inner JOIN curso cur ON cur.id_carr= carr.id_carr
INNER JOIN grado grad ON grad.id_grado=cur.id_grado
INNER JOIN asigna_cur_cat acc ON acc.id_curso=cur.id_curso
INNER JOIN catedratico cat ON cat.id_cat=acc.id_cat
WHERE cat.id_cat=".$cat." 
GROUP BY carr.id_carr");
return $sql;
}

protected function mostrar_grado_catedratico($cat)
{
    $sql=modeloMain::ejecutar_consulta_simple("SELECT grad.id_grado as id,grad.grado as grado FROM grado grad 
    inner JOIN curso cur ON cur.id_carr= grad.id_grado
    INNER JOIN carrera carr ON carr.id_carr=cur.id_carr
    INNER JOIN asigna_cur_cat acc ON acc.id_curso=cur.id_curso
    INNER JOIN catedratico cat ON cat.id_cat=acc.id_cat
    WHERE cat.id_cat=".$cat." 
    GROUP BY grad.id_grado");
    return $sql;
}

protected function id_catedratico($usuario)
{
$sql=modeloMain::ejecutar_consulta_simple("SELECT cat.id_cat FROM catedratico cat 
INNER JOIN usuario usu ON usu.id_usu=cat.id_usu
WHERE usu.usuario='".$usuario."'");
return $sql;
}

}
