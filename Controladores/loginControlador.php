<?php 

 if($peticionajax) {

require_once "../modelos/loginModelo.php";
	
}
else
{
require_once "./modelos/loginModelo.php";

}

class loginControlador extends loginModelo
{
	public function iniciar_sesion_controlador()
	{
		$usuario=modeloMain::limpiar_cadena($_POST["usuario"]);
		$pass=modeloMain::limpiar_cadena($_POST["pass"]);
	//	$pass=modeloMain::encryption($pass);
		$datoslogin=
		["usuario"=>$usuario,
		  "pass"=>$pass
		];
		$datoscuenta=loginModelo::iniciar_sesion_modelo($datoslogin);
		if ($datoscuenta->rowcount()==1) 
		{

			$row=$datoscuenta->fetch();
			/*$fechaactual=date("Y-m-d");
			$yearactual=date("Y");
			$horaactual=date("h:i:s a");
			$consulta1=modeloMain::ejecutar_consulta_simple("select id from bitacora");
			$numero=($consulta1->rowcount())+1;
			$codigoB=modeloMain::generar_codigo("CB",7,$numero);

			$datosbitacora=
			[
			"codigo"=>$codigoB,
			"fecha"=>$fechaactual,
			"horainicio"=>$horaactual,
			"horafinal"=>"sin registro",
			"tipo"=>$row['CuentaTipo'],
			"year"=>$yearactual,
			"cuenta"=>$row['CuentaCodigo']
			];
			$insertarbitacora=modeloMain::guardar_bitacora($datosbitacora);
			if ($insertarbitacora->rowcount()>=1) 
			{*/
				 session_start(['name'=>'pyc']);
				$_SESSION['usuario'] =$usuario;
			 /*	$_SESSION['usuarip_pyc']=$row['CuentaUsuario'];
			 	$_SESSION['tipo_pyc']=$row['CuentaTipo'];
			 	$_SESSION['privilegio_pyc']=$row['CuentaPrivilegio'];
			 	$_SESSION['foto_pyc']=$row['CuentaFoto'];
			 	$_SESSION['token_pyc']=md5(uniqid(mt_rand(),true));
			 	$_SESSION['codigo_cuenta_pyc']=$row['CuentaCodigo'];
			 	$_SESSION['codigo_bitacora_pyc']=$codigoB;*/
			 	if ($row['tipo']== 1) 
			 	{
			 		$url=SERVERURL."admin";
			 	} 
			 	else 
			 	{
			 	$url=SERVERURL."admin";
			 		
			 	}

			 	return $urllocation='<script>window.location="'.$url .  '" </script>';


			/*} 
			else 
			{
			$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo guardar iniciar sesion por problemas tecnicos, por favor intente nuevamente","tipo"=>"error"];
			$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"el dni ya se encuebntra registrado","tipo"=>"error"];	
			return modeloMain::sweet_alert($alerta);
			}
			

			
		} else {
			$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"El nombre de usuario o contraseña no son correctos, su cuenta puede estar desabilitada","tipo"=>"error"];
			return modeloMain::sweet_alert($alerta);
		}*/

		}

	/*public function forzar_cierre_sesion_controlador()
	{
		session_destroy();
		return header("location:".SERVERURL."login/");
	}
	public function cerrar_sesion_controlador()
	{
	session_start(['name'=>'pyc']);
	$token=modeloMain::decryption($_GET['token']);
	$hora=date("h:i:s a");
	$datos=
	[
	"usuario"=>$_SESSION['usuario_pyc'],
	"token_s"=>$_SESSION['troken_pyc'],
	"token"=>$token,
	"codigo"=>$_SESSION['codigo_bitacora_pyc'],
	"hora"=>$hora
	];
	return loginModelo::cerrar_sesion_modelo($datos);
	
	}*/
	}

}