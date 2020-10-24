<?php
$peticionajax=true;
include "../core/configeneral.php";
require_once "../Controladores/cursoControlador.php";
require_once "../Controladores/calificacionControlador.php";

//Muestra todos los grados
if (isset($_POST['carr']) && isset($_POST['usuario'])) {
    session_start();
    $nuevo= new calificacionControlador();
    echo $nuevo->mostrar_grado($_POST['carr'],$_POST['usuario']);
    }
//Muiestra todos los cursos
    if (isset($_POST['carre']) && isset($_POST['grado']) && isset($_POST['usuario'])) {
        session_start();
        $nova= new calificacionControlador();
      
        echo $nova->mostrar_curso($_POST['carre'],$_POST['grado'],$_POST['usuario']);
            }
//muestra a los alumnos que llevan ese curso//muestra a los alumnos que llevan ese curso//muestra a los alumnos que llevan ese curso//muestra a los alumnos que llevan ese curso
            if (isset($_POST['car']) && isset($_POST['grad']) && isset($_POST['cur']) && isset($_POST['usuario'])) 
            {
                $al= new calificacionControlador();
                echo $al->mostrar_alumnos_curso($_POST['car'],$_POST['grad'],$_POST['cur'],$_POST['usuario']);
            }




//Muestra todos los cursos 
if (isset($_POST['carr']) && isset($_POST['grad']) && !isset($_POST['curso'])) {
    $lib = new cursoControlador();

$cont="";
$cont.=" <select class='form-control' id='cur' name='cur'>" . $_POST['carrera'] . "-" . $_POST['grado'];
$cont.=$lib->mostrar_curso($_POST['carr'],$_POST['grad']);
echo $cont . "</select>";
} 
elseif(isset($_POST['carr']) && isset($_POST['grad']) && isset($_POST['curso'])) 
{
    
    $ingre= new cursoControlador();
   
   echo $ingre->agregar_curso_controlador($_POST['curso'],$_POST['carr'],$_POST['grad']);
   
}






