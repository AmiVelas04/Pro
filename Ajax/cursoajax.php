<?php
$peticionajax=true;
 $carr=$_POST['carrera'];
 $grad=$_POST['grado'];
require_once "../Controladores/cursocontrolador.php";
$lib = new cursoControlador();

$cont="";
$cont.=" <select class='form-control' 'id='cur'>" . $carr . "-" . $grad;
$cont.=$lib->mostrar_curso($carr,$grad);
echo $cont . "</select>";