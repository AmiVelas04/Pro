<?php 

if($peticionajax) {

require_once "../Modelos/calificacionModelo.php";

}
else
{
require_once "./Modelos/calificacionModelo.php";
}

class calificacionControlador extends calificacionModelo{

    public function mostrar_carrera()
    {
        $sql=calificacionControlador::mostrar_carrera_catedratico();
        $cont="";
        if ($sql->rowCount()>=1)
        {
            $datos=$sql->fetchall();
            $cont.="<option value='0'>Seleccione una Carrera</option>";
            foreach ($datos as $row) {
                $cont.="<option value='".$row['id']."'>". $row['carrera'] . "</option>";
            }
        }
    
        return $cont;
    }

    public function mostrar_grado($carr)
    {
       
       
        $sql=calificacionModelo::mostrar_grado_catedratico($carr);
        $cont="<select class='form-control' id='gradoc'>";
        if ($sql->rowCount()>=1)
        {
            $datos=$sql->fetchall();
           
            foreach ($datos as $row) {
                $cont.="<option value='".$row['id']."'>". $row['grado'] . "</option>";
            }
            return $cont;
        }
        else
        {
            $cont.="<option value='0'>No tiene grados asignados</option> </select>";
            return $cont;
        }
        
    }


    public function mostrar_curso()
    {
        $sql=calificacionControlador::mostrar_curso_catedratico();
        $cont="";
        if ($sql->rowCount()>=1)
        {
            $datos=$sql->fetchall();
            $cont.="<option value='0'>Seleccione un Curso </option>";
            foreach ($datos as $row) {
                $cont.="<option value='".$row['id']."'>". $row['curso'] . "</option>";
            }
        }
        return $cont;
    }
    
    public function mostrar_alumnos_curso($cur,$carr,$grad)
    {

    }

    public function verificar_catedratico(){
   
    
    }




    
}