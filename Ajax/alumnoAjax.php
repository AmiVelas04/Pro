<?php

$peticionajax=true;
require_once "../Controladores/alumnoControlador.php";
$insalum=new alumnoControlador();
echo $insalum->agregar_alumno_controlador();

