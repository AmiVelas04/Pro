<?php 
if($peticionajax) {
require_once "../Modelos/asignaModelos.php";
require_once "../vistas/modulos/script.php";
}
else
{
require_once "./Modelos/asignaModelos.php";
require_once "./vistas/modulos/script.php";
}

class asignaControlador extends asignaModelos
{
public function agregar_asignacion_controlador($cat,$cur)
{
 //$cat=modeloMain::limpiar_cadena($_POST['cat']);
 //$cur=modeloMain::limpiar_cadena($_POST['cur']);

 $consulta1=modeloMain::ejecutar_consulta_simple("select * from asigna_cur_cat where id_curso=$cur and id_cat=$cat");
    if ($consulta1->rowCount()>=1)
    {
      $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"el curso ya ha sido asignado","tipo"=>"error"];
    }
    else
     {
        $datosAs=['curso'=>$cur,
                  'cat'=>$cat
                 ];
        $asigna=asignaModelos::agregar_asignacion_modelo($datosAs);
    
        
        if ($asigna->rowCount()>=1)
        {
          $alerta=["Alerta"=>"limpiar","titulo"=>"Curso asignado","texto"=>"El Curso se asigno correctamente","tipo"=>"success"];	
          
        }
        else
        {
         
          $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo asignar el curso","tipo"=>"error"];
        }
       
     }
     return asignaModelos::Sweet_alert($alerta);
}

}