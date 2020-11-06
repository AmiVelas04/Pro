<?php

$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/calificacionControlador.php";

    $ingrecali= new calificacionControlador();
echo $ingrecali->Ingreso_cali_Controlador();


