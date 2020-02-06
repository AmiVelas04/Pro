<?php 

if($peticionajax) {

require_once "../Modelos/administradorModelo.php";
	
}
else
{
require_once "./Modelos/administradorModelo.php";

}
//controlador para agregar administrador
class administradorControlador extends administradorModelo
{
	public function agregar_administrador_controlador()
	{
		$dpi=modeloMain::limpiar_cadena($_POST['dpi-reg']);
		$nombre=modeloMain::limpiar_cadena($_POST['nombre-reg']);
		$apellido=modeloMain::limpiar_cadena($_POST['apellido-reg']);
		$telefono=modeloMain::limpiar_cadena($_POST['telefono-reg']);
		$direccion=modeloMain::limpiar_cadena($_POST['direccion-reg']);

		$usuario=modeloMain::limpiar_cadena($_POST['usuario-reg']);
		$pass1=modeloMain::limpiar_cadena($_POST['password1-reg']);
		$pass2=modeloMain::limpiar_cadena($_POST['password2-reg']);
		$email=modeloMain::limpiar_cadena($_POST['email-reg']);
		/*$genero=modeloMain::limpiar_cadena($_POST['optionsGenero']);
		$privilegio=ModeloMain::decryption($_POST['optionsPrivilegio']);
		$privilegio=modeloMain::limpiar_cadena($privilegio);

		
		if ($genero=="Masculino") 
		{
			$foto="Male3Avatar.png";
		} 
		else
		{
			$foto="TeacherFemaleAvatar.png";
		}

	if ($privilegio<1 || $privilegio>3) 
	{
	$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"El nivel de privilegio que desea asignar es incorrecto","tipo"=>"error"];	
	} 
	else
	 {*/
		if ($pass1!=$pass2)
		{
		$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"constraseñas no coincidentes, intente nuevamente","tipo"=>"error"];	
		
		} 
		else 
		{
			$consulta1=modeloMain::ejecutar_consulta_simple("select dpi from admin where dpi=$dpi");
			if ($consulta1->rowcount()>=1) 
			{
				$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"el dpi ya se encuebntra registrado","tipo"=>"error"];	
			} 
			else 
			{
				$consulta2=modeloMain::ejecutar_consulta_simple("select usuario from usuario where usuario='$usuario'");
				if($consulta2->rowcount()>=1)
				{
					$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"el usuario ya se encuentra registrado","tipo"=>"error"];	
				}
				else
				{
					$codigo=modeloMain::generar_codigo();
					$codigo+=1;
					$clave=($pass1);
					$dataAc=[
						"codigo"=>$codigo,
						"usuario"=>$usuario,
						"clave"=>$clave,
						"estado"=>"Activa",
						"tipo"=>1
						];
					$guardarcuenta=modeloMain::agregar_cuenta($dataAc);
					if ($guardarcuenta->rowcount()>=1)
					{
						$dataAd=[
						"dpi"=>$dpi,
						"nombre"=>$nombre,
						"apellido"=>$apellido,
						"direccion"=>$direccion,
						"codigo"=>$codigo
								];
						

						$guardarAdmin=administradorModelo::agregar_administrador_modelo($dataAd);		
						if($guardarAdmin->rowcount()>=1)
						{
						$alerta=["Alerta"=>"limpiar","titulo"=>"Administrador registrado","texto"=>"El administrador se registro con exito en el sistema","tipo"=>"success"];	
						}
						else
						{
						modeloMain::eliminar_cuenta($codigo);
						$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se ha podido ingresar el administrador","tipo"=>"error"];	
						print_r($guardarAdmin->errorInfo());
						}
					} 
					else 
					{
						print_r($guardarcuenta->errorInfo());
					
										
					$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"no se pudo guardar la cuenta","tipo"=>"error"];	
					}
					
				}
			}
			
		}
	//}
	


		return modeloMain::Sweet_alert($alerta);
	}

//controlador para la paginacion
public function paginador_administrador_controlador($pagina,$registros,$privilegio,$codigo)
{
$pagina=modeloMain::limpiar_cadena($pagina);
$registros=modeloMain::limpiar_cadena($registros);
$privilegio=modeloMain::limpiar_cadena($privilegio);
$codigo=modeloMain::limpiar_cadena($codigo);
$tabla="";

$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina:1;
$inicio=($pagina>0) ? (($pagina*$registros)-$registros):0; 

$conexion=modeloMain::conectar();
$datos=$conexion->query("
Select SQL_CALC_FOUND_ROWS * from admin where cuentacodigo!='$codigo' and id!='1' order by adminnombre asc limit $inicio,$registros 
	");
	$datos=$datos->fetchAll();
	$total=$conexion->query("Select FOUND_ROWS()");
	$total=(int)$total->fetchColumn();
	$Npaginas=ceil($total/$registros);

$tabla.="<div class='table-responsive'>
						<table class='table table-hover text-center'>
							<thead>
								<tr>
									<th class='text-center'>#</th>
									<th class='text-center'>DPI</th>
									<th class='text-center'>NOMBRES</th>
									<th class='text-center'>APELLIDOS</th>
									<th class='text-center'>TELÉFONO</th>";
	if ($privilegio<=2) 
	{
	$tabla.="<th class='text-center'>A. CUENTA</th>
	<th class='text-center'>A. DATOS</th>
	";
	}
	if ($privilegio==1) 
	{
	$tabla.="<th class='text-center'>ELIMINAR</th>";
	}
	$tabla.="</tr>
	</thead>
	<tbody>";

	if ($total>=1 && $pagina<=$Npaginas) 
	{
	$contador=$inicio+1;
		foreach($datos as $rows)
		{
		$tabla.='
		<tr>
		<td>'.$contador.'</td>
		<td>'.$rows['AdminDNI'].'</td>
		<td>'.$rows['AdminNombre'].'</td>
		<td>'.$rows['AdminApellido'].'</td>
		<td>'.$rows['AdminTelefono'].'</td>';
			if ($privilegio<=2)
			{
			$tabla.='
			<td>
			<a href="'.SERVERURL.'micuenta/'.ModeloMain::encryption($rows['CuentaCodigo']).'" class="btn btn-success btn-raised btn-xs">
			<i class="zmdi zmdi-refresh"></i>
			</a>
			</td>
			<td>
			<a href="'.SERVERURL.'misdatos/'.ModeloMain::encryption($rows['CuentaCodigo']).'" class="btn btn-success btn-raised btn-xs">
			<i class="zmdi zmdi-refresh"></i>
			</a>
			</td>';
			}
			if ($privilegio==1) 
			{
			$tabla.='<td>
			<form>
			<button type="submit" class="btn btn-danger btn-raised btn-xs">
			<i class="zmdi zmdi-delete"></i>
			</button>
			</form>
			</td>';
			}
			$tabla.='</tr>';
			$contador++;
		}	
	} 
	else 
	{
		if ($total>=1) 
		{
		$tabla='
		<tr>
		<td colspan="5">
		<a href="'.SERVERURL.'adminlist/" class="btn btn-sm btn-info btn-raised">
		Haga clic aca para recargar el listado
		</a>
		</td>
		</tr>';
		} 
		else 
		{
		$tabla='
		<tr>
		<td colspan="5">No hay registros en el sistema</td>
		</tr>';
		}
	
	
	}

$tabla.='</tbody>
		</table>
		</div>';

	if ($total>=1 && $pagina<=$Npaginas) 
	{
	$tabla.='	<nav class="text-center">
	<ul class="pagination pagination-sm">';

		if ($pagina==1) 
		{
		$tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
		} 
		else
		{
		$tabla.='<li><a href="'.SERVERURL.'adminlist/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
		}

for ($i=1; $i<=$Npaginas ; $i++) 
{ 
	if ($pagina==$i) 
	{
	$tabla.='<li class="active"><a href="'.SERVERURL.'adminlist/'.($i).'">'.$i.'</a></li>';
	}
	else 
	{
	$tabla.='<li><a href="'.SERVERURL.'adminlist/'.($i).'">'.$i.'</a></li>';
	}
	
}


if ($pagina==$Npaginas) 
{
$tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
} 
else
{
$tabla.='<li><a href="'.SERVERURL.'adminlist/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
}



$tabla.='</ul>
</nav>';
}						
return $tabla;

}



}





