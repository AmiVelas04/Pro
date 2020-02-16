<?php
$peticionajax=true;
$carr=$_POST['carrera'];
$grad=$_POST['grado'];
$curso=$_POST['cur'];
$cat=$_POST['cat'];

require_once "../Controladores/asignaControlador.php";

$asignacion= new asignaControlador();


if ($asignacion->agregar_asignacion_controlador($cat,$curso)) 
{
    echo "Asignacion echa con etsito";
}
