<?php 

if($peticionajax) {

require_once "../Modelos/usuModelo.php";
require_once "../vistas/modulos/script.php";
	
}
//revisar este else para poder ver si hay alguna funcion diferente
else
{
require_once "./Modelos/usuModelo.php";
require_once "./vistas/modulos/script.php";

}
//controlador para agregar Usuario
class usuControlador extends usuModelo
{

    public function agregar_usuario_controlador()
    {
        $cod=modeloMain::limpiar_cadena($_POST['cod-reg']);
		$usuario=modeloMain::limpiar_cadena($_POST['nombre-reg']);
		$pass=modeloMain::limpiar_cadena($_POST['responsable-reg']);
		$tipo=modeloMain::limpiar_cadena($_POST['telefono-reg']);
        $estado=modeloMain::limpiar_cadena($_POST['edad-reg']);
        $datosusu=[
            'codigo'=>$cod,
            'nombre'=>$nombre,
            'edad'=>$edad
            ];
            $res=usuModelo::agregar_alumno_modelo($usu);
            if ($res->rowCount()>=1)
            {
                $alerta=["Alerta"=>"limpiar","titulo"=>"Alumno Registrado con exito","texto"=>"Usuario se ingreso con exito","tipo"=>"success"];	
                
            }
            else
            {
                $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"Error ingresar el usuario","tipo"=>"error"];	
                
            }
        }

        return usuModelo::Sweet_alert($alerta);
            
        
    }
}