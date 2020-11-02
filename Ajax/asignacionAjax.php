<?php


$peticionajax=true;
$carr=$_POST['carrera'];
$grad=$_POST['grado'];
$curso=$_POST['cur'];
if (!isset($_POST['cat']))
{
    $cat=$_POST['cate'];
}
if (!isset($_POST['cate']))
{
    $cat=$_POST['cat'];
}


require_once "../Controladores/asignaControlador.php";

$asignacion= new asignaControlador();

echo $asignacion->agregar_asignacion_controlador($cat,$curso);


//header("Location:".SERVERURL."cat?resp=".$resp . "");

	


