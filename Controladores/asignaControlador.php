<?php 
if($peticionajax) {
require_once "../Modelos/asignaModelo.php";
}
else
{
require_once "./Modelos/asignaModelo.php";

}

class asignaControlador extends asignaModelo
{
public function agregar_asignacion_controlador()
{
 $cat=modeloMain::limpiar_cadena($_POST['cat']);
 $cur=modeloMain::limpiar_cadena($_POST['cur']);

 $consulta1=modeloMain::ejecutar_consulta_simple("select * from asigna_cur_cat where id_curso=$cur and id_cat=$cat");
    if ($consulta1->rowCount()>=1)
    {
        echo "Ya se Realizo esta asignacion";
    }
    else
     {
        $datosAs=[
        'curso'=>$cur,
        'cat'=>$cat
        ];
        $asigna=asignaModelo::agregar_asignacion_modelo($datosAs);
        if ($asigna->rowCount()>=1)
        {
            echo "Asignacion realizada con exito";
        }
       
     }
}

}