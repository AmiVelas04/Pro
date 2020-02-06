<?php 

if($peticionajax) {

require_once "../Modelos/alumnoModelo.php";
	
}
else
{
require_once "./Modelos/alumnoModelo.php";

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

	
  

            $consulta1=modeloMain::ejecutar_consulta_simple("select * from alumno where cod_al=$cod");
			if ($consulta1->rowcount()>=1) 
			{
				echo "El alumno ya ha sido registrado";
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
                                echo "Asignacion de alumno encargado correcta";
                            }
                            $datostel=[
                                'telefono'=>$telefono
                            ];
                            $res3=alumnoModelo::agregar_telefono_modelo($datostel);
                            if ($res3->rowCount()>=1 )
                            {
                                $idenc=alumnoModelo::codigo_encargado($responsable);
                                $idtel=alumnoModelo::codigo_telefono($telefono);
                                $res4=alumnoModelo::asignar_telefono_encargado($idenc,$idtel);
                                if ($res->rowCount()>=1)
                                {
                                    echo "Datos Almacenados Correctamente";
                                }
                                else
                                {
                                    echo "Error en la asignacion de datos";  
                                }


                            
                            }
                                
                            }
                }

            }
   }
}


        

