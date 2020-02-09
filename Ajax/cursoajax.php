<?php
$peticionajax=true;


require_once "../Controladores/cursoControlador.php";
require_once "../Controladores/calificacionControlador.php";


if (isset($_POST['carr'])) {
    $nuevo= new calificacionControlador();
    echo $nuevo->mostrar_grado($_POST['carr']);
    
    }
  

if (isset($_POST['carrera']) && isset($_POST['grado']) && !isset($_POST['curso'])) {
    $lib = new cursoControlador();

$cont="";
$cont.=" <select class='form-control' 'id='cur'>" . $_POST['carrera'] . "-" . $_POST['grado'];
$cont.=$lib->mostrar_curso($_POST['carrera'],$_POST['grado']);
echo $cont . "</select>";
} 
elseif(isset($_POST['carrera']) && isset($_POST['grado']) && isset($_POST['curso'])) 
{
    $ingre= new cursoControlador();
   
   echo $ingre->agregar_curso_controlador($_POST['curso'],$_POST['carrera'],$_POST['grado']);
   
}


