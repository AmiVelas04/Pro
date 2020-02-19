<?php 

if($peticionajax) {

require_once "../Modelos/alumnoModelo.php";
require_once "../vistas/modulos/script.php";
	
}
else
{
require_once "./Modelos/alumnoModelo.php";
require_once "./vistas/modulos/script.php";

}
//controlador para agregar alumno

class alumnoControlador extends alumnoModelo
{
	public function agregar_alumno_controlador()
	{
		$cod=modeloMain::limpiar_cadena($_POST['cod-reg']);
		$nombre=modeloMain::limpiar_cadena($_POST['nombre-reg']);
		$responsable=modeloMain::limpiar_cadena($_POST['responsable-reg']);
		$telefono=modeloMain::limpiar_cadena($_POST['telefono-reg']);
        $edad=modeloMain::limpiar_cadena($_POST['edad-reg']);
        $dpi=modeloMain::limpiar_cadena($_POST['dpi-reg']);
        $grado=modeloMain::limpiar_cadena($_POST['grad']);
        $carrera=modeloMain::limpiar_cadena($_POST['carr']);

	
  

            $consulta1=modeloMain::ejecutar_consulta_simple("select * from alumno where cod_al=$cod");
			if ($consulta1->rowCount()>=1) 
			{
				$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"El alumno ya se encuentra resitrado","tipo"=>"error"];	
            } 
            else
            {
                $datosal=[
                'codigo'=>$cod,
                'nombre'=>$nombre,
                'edad'=>$edad
                ];
                $res=alumnoModelo::agregar_alumno_modelo($datosal);
                if ($res->rowCount()>=1)
                {
                   
                    $datosenc=[
                    'nombre'=>$responsable,
                    'dpi'=>$dpi
                    ];
                    $res2=alumnoModelo::agregar_encargado_modelo($datosenc);
                    if ($res2->rowCount()>=1)
                    {
                       
                        $id=alumnoModelo::codigo_encargado($responsable);
                        $alenc=alumnoModelo::Asignar_alumno_encargado($cod,$id);
                        if($alenc->rowCount()>=1)
                        {
                            $datostel=[
                            'telefono'=>$telefono
                            ];
                            $res3=alumnoModelo::agregar_telefono_modelo($datostel);
                            if ($res3->rowCount()>=1 )
                            {
                               
                                $idenc=alumnoModelo::codigo_encargado($responsable);
                                $idtel=alumnoModelo::codigo_telefono($telefono);
                                $res4=alumnoModelo::asignar_telefono_encargado($idenc,$idtel);
                                if ($res4->rowCount()>=1)
                                {
                                  
                                    $res5=alumnoModelo::asigna_alu_carr_grad($cod,$carrera,$grado);
                                    if ($res5->rowCount()>=1)
                                    {
                                        $alerta=["Alerta"=>"limpiar","titulo"=>"Alumno Registrado con exito","texto"=>"El alumo se registró con exito","tipo"=>"success"];	
                                        
                                    }
                                    else
                                    {
                                        $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"Error al asignar carrera y grado al alumno","tipo"=>"error"];	
                                        echo "cod: " . $cod . "<br>" . "id carrera: " . $carrera . "<br>" . "grado: " . $grado . "<br>" ;
                                    }
                                }
                                else
                                {
                                    $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar carrera y grado al alumno","tipo"=>"error"];	
                                }
                            }
                            else
                            {
                                $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar el telefono","tipo"=>"error"];	
                            }
                        }
                        else
                        {
                            $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar al encargado","tipo"=>"error"];	
                        }
                    }
                    else
                    {
                        $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar al encargado","tipo"=>"error"];	
                    }
                }
                else
                {
                        $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo agregar al alumno","tipo"=>"error"];
            	}

            }

            return alumnoModelo::Sweet_alert($alerta);
            
   }

   public function mostrar_grado_controlador(){
    $sql=alumnoModelo::mostrar_grado_modelo();
    $conte="";
    $num=0;
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    $conte.="<option value='0'>Seleccione un Grado</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['grado'] . "</option>";
    }
    }               
    
    return $conte;
}

public function mostrar_carrera_controlador(){
    $sql=alumnoModelo::mostrar_carrera_modelo();
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

public function mostrar_alumno($id)
{
$sql=alumnoModelo::mostrar_alumno_modelo($id);
$cont="";
if($sql->rowCount()>=1){
$datos=$sql->fetchAll();

foreach ($datos as $row ) {
$cont.=$row['nombre'];

}
return $cont;
}
else
{
return $cont;

}
}

public function mostrar_curso($curso)
{
    $sql=alumnoModelo::mostrar_curso_modelo($curso);
    $cont="";
    if($sql->rowCount()>=1)
    {
        $datos=$sql->fetchAll();
        foreach ($datos as $row)
        {
        $cont.=$row['nombre'];
        }
        return $cont;

    }
    else
    {
        return $cont;
    }
}



}


        

