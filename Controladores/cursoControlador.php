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
        $cont.="<option value='".$row['id']."'>". $row['carrera'] . "</option>";
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
        $cont.="<option value='".$row['id']."'>". $row['nombre'] . "</option>";
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
                $cont.="<option value='".$row['id']."'>". $row['nombre'] . "</option>";
            }
       return $cont;

        }
    }

    public function agregar_curso_controlador($curso,$carr,$grad)
    {
        $datoscur=[
            'curso'=>$curso,
            'carrera'=>$carr,
            'grado'=>$grad
        ];
        
    $curso=cursoModelo::agregar_curso_modelo($datoscur);
    if ($curso->rowCount()>=1) {
        $alerta=["Alerta"=>"limpiar","titulo"=>"Alumno Registrado con exito","texto"=>"El curso se registro correctamente","tipo"=>"success"];	

    } else
     {
        $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar carrera y grado al alumno","tipo"=>"error"];	
    }
    
    return cursoModelo::Sweet_alert($alerta);
    }



}