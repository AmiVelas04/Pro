<?php 

 if($peticionajax) {
require_once "../core/modeloMain.php";
}
else
{
require_once "./core/modeloMain.php";
}

class asignaModelos extends modeloMain{
    protected function agregar_asignacion_modelo($datos)
    {
        $sql=modeloMain::conectar()->prepare("Insert into asigna_cur_cat( id_cur,id_cat) values (:curso,:cat)");
        $sql->bindparam(":curso",$datos['curso']);
        $sql->bindparam(":cat",$datos['cat']);
        try{
            $sql->execute();
            return $sql;
        }
        catch (PDOException $e)
        {
       
        }
    }
  
}