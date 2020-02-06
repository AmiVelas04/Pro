<?php 

if($peticionajax) {

require_once "../Modelos/cursoModelo.php";
	
}
else
{
require_once "./Modelos/cursoModelo.php";

}
class cursoControlador extends cursoModelo
{

    public function mostrar_grado(){
        $sql=cursoModelo::mostrar_grado_modelo();
        $conte="";
        $num=0;
        if ($sql->rowcount()>=1)
        {
        $datos=$sql->fetchall();
        $conte.="<option value='0'>Seleccione un Grado</option>";
        foreach($datos as $row)
        {
            $num++;
            $conte.="<option value='".$num."'>". $row['grado'] . "</option>";
        }
        }               
        
        return $conte;
    }

    public function mostrar_carrera(){
        $sql=cursoModelo::mostrar_carrera_modelo();
        $cont="";
        $num=0;
        if ($sql->rowcount()>=1)
        {
        $datos=$sql->fetchall();
        $cont.="<option value='0'>Seleccione una Carrera</option>";
        foreach($datos as $row)
        {
            $num++;
        $cont.="<option value='".$num."'>". $row['carrera'] . "</option>";
        }
        }               
        
        return $cont;
    }

    public function mostrar_catedratico(){

        $sql=cursoModelo::mostrar_catedratico_modelo();
        $cont="";
        $num=0;
        if ($sql->rowcount()>=1)
        {
        $datos=$sql->fetchall();
        //$cont.="<option value='0'>Seleccione un Catedratico</option>";
        foreach($datos as $row)
        {
            $num++;
        $cont.="<option value='".$num."'>". $row['nombre'] . "</option>";
        }
        }               
        return $cont;

    }

    public function mostrar_curso($carr,$grad)
    {
       
        $sql=cursoModelo::mostrar_curso_modelo($carr,$grad);
        $cont="";
        if ($sql->rowcount()>=1)
        {
        $datos=$sql->fetchAll();
            foreach($datos as $row)
            {
                $cont.="<option value='".$row['id_curso']."'>". $row['nombre'] . "</option>";
            }
       return $cont;

        }
    }



}