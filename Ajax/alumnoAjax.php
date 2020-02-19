<?php

$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/alumnoControlador.php";
require_once "../vistas/modulos/script.php";


$insalum=new alumnoControlador();
echo $insalum->agregar_alumno_controlador();
/*
if(2<2){

    echo  $alerta='
    <script>
    
    swal({ 
      title:"Titulo",
      text:"-si hsce",
      type:"success",
      confirmButtontext: "Aceptar"
    }).then(function(){
        $(".FormularioAjax")[0].reset();
        });
        setTimeout(regresar,5000);
        function regresar(){
        window.location.href="'.SERVERURL.'alumno/";
        }
    </script>
    ';
    echo "<script></script>";

}
else{
  
}*/