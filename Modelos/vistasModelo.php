<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas)
		{

			$lista_blanca=["adminlist","adminsearch","admin","busqueda","catalogo",
			"categorialista","categoria","catedraticobusca","catedraticolista","catedratico",
			"catlista","cat","home","libroconfig","libroinfo","cursos",
			"micuenta","misdatos","alumnolista","alumno","calificacion","addcali"];
			if(in_array($vistas,$lista_blanca))
				{
					if(is_file("./Vistas/contenidos/" . $vistas . "-view.php")){
						$contenido="./Vistas/contenidos/" . $vistas . "-view.php";
					}else
					{
						$contenido="login";
					}

				}
			elseif ($vistas=="login") {

					$contenido="login";
				}
			elseif ($vistas=="index") {
					$contenido="login";
			}
			else
			{
				$contenido="404";	
			}
			return $contenido;


			

			
		}
	}