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

protected function mostrar_carrera_catedratico()
{
$cat=calificacionModelo::id_catedratico($_SESSION['usuario']);
$sql=modeloMain::ejecutar_consulta_simple("SELECT carr.id_carr as id, carr.carrera as carrera FROM carrera carr 
inner JOIN curso cur ON cur.id_carr= carr.id_carr
INNER JOIN grado grad ON grad.id_grado=cur.id_grado
INNER JOIN asigna_cur_cat acc ON acc.id_curso=cur.id_curso
INNER JOIN catedratico cat ON cat.id_cat=acc.id_cat
WHERE cat.id_cat=".$cat." 
GROUP BY carr.id_carr");

return $sql;
}

protected function mostrar_grado_catedratico($carr)
{
    $cat=calificacionModelo::id_catedratico($_SESSION['usuario']);
    $sql=modeloMain::ejecutar_consulta_simple("SELECT grad.id_grado as id,grad.grado as grado FROM grado grad 
    inner JOIN curso cur ON cur.id_carr= grad.id_grado
    INNER JOIN carrera carr ON carr.id_carr=cur.id_carr
    INNER JOIN asigna_cur_cat acc ON acc.id_curso=cur.id_curso
    INNER JOIN catedratico cat ON cat.id_cat=acc.id_cat
    WHERE cat.id_cat=".$cat." and carr.id_carr=".$carr." 
    GROUP BY grad.id_grado");
    return $sql;
}

protected function mostrar_curso_catedratico()
{
    $cat=calificacionModelo::id_catedratico($_SESSION['usuario']);
    $sql=modeloMain::ejecutar_consulta_simple("Select cur.id_curso as id,cur.nombre as curso FROM curso cur 
    INNER JOIN asigna_cur_cat acc ON acc.id_curso=cur.id_curso
    INNER JOIN catedratico cat ON cat.id_cat=acc.id_cat
    WHERE cat.id_cat=" . $cat);
    return $sql;
}

private function id_catedratico($usuario)
{
$sql=modeloMain::ejecutar_consulta_simple("SELECT cat.id_cat as id FROM catedratico cat 
INNER JOIN usuario usu ON usu.id_usu=cat.id_usu
WHERE usu.usuario='".$usuario."'");
 if ($sql->rowCount()>=1) {
     $datos=$sql->fetchAll();
    foreach ($datos as $row) {
        $id=$row['id'];
return $id;

    }
 } else {
    return 0;
 }
 
}

}
