<?php 

if($peticionajax) {

require_once "../Modelos/calificaionModelo.php";

}
else
{
require_once "./Modelos/calificacionModelo.php";
}

class calificacionControlador extends calificacionModelo{

    public function mostrar_carrera($cat)
    {
        $sql=calificacionControlador::mostrar_carrera_catedratico($cat);
        $cont="";
        if ($sql->rowCount()>=1)
        {
            $datos=$sql->fetchall();
            foreach ($$datos as $row) {
                $cont.="<option value='".$row['id']."'>". $row['carrera'] . "</option>";
            }
        }
        return $cont;
    }

    public function mostrar_grado($cat)
    {
        $sql=calificacionControlador::mostrar_grado_catedratico($cat);
        $cont="";
        if ($sql->rowCount()>=1)
        {
            $datos=$sql->fetchall();
            foreach ($$datos as $row) {
                $cont.="<option value='".$row['id']."'>". $row['grado'] . "</option>";
            }
        }
        return $cont;
    }

    public function mostrar_alumnos_curso($cur,$carr,$grad)
    {

    }

    public function verificar_catedratico(){
    $user=$_SESSION['user'];
    
    }




    
}