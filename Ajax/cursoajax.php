<?php
$peticionajax=true;
 $carr=$_POST['carrera'];
 $grad=$_POST['grado'];

require_once "../Controladores/cursocontrolador.php";
if (isset($_POST['carrera']) && isset($_POST['grado']) && !isset($_POST['curso'])) {
    $lib = new cursoControlador();

$cont="";
$cont.=" <select class='form-control' 'id='cur'>" . $carr . "-" . $grad;
$cont.=$lib->mostrar_curso($carr,$grad);
echo $cont . "</select>";
} 
elseif(isset($_POST['carrera']) && isset($_POST['grado']) && isset($_POST['curso'])) 
{
    $ingre= new cursoControlador();
   
   echo $ingre->agregar_curso_controlador($_POST['curso'],$_POST['carrera'],$_POST['grado']);
   
}

