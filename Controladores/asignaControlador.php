<?php 
if($peticionajax) {
require_once "../Modelos/asignaModelos.php";
}
else
{
require_once "./Modelos/asignaModelos.php";

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
        echo "Ya se Realizo esta asignacion";
    }
    else
     {
        $datosAs=[        'curso'=>$cur,
        'cat'=>$cat
        ];
        $asigna=asignaModelos::agregar_asignacion_modelo($datosAs);
    
        
        if ($asigna->rowCount()>=1)
        {
            return true;
        }
        else
        {
            return false;
        }
       
     }
}

}