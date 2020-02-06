<?php 

if ($peticionajax) {

require_once "../core/configAPP.php";

}
else
{
	
require_once "./core/configAPP.php";
}
class modeloMain{
	protected function conectar()
	{
		$link=new PDO(sgbd,usuario,contra);
		return $link;
	}

	protected function ejecutar_consulta_simple($consulta)
	{

		$respuesta=self::conectar()->prepare($consulta);
		$respuesta->execute();
		return $respuesta;
	}
	
//Agregar cuenta
	protected function agregar_cuenta($datos){
		$sql=self::conectar()->prepare("insert into usuario(id_usu,usuario,pass,tipo,estado) values(:id,:usuario,:pass,:tipo,:estado)");
		$sql->bindparam(":id",$datos['codigo']);
		$sql->bindparam(":usuario",$datos['usuario']);
		$sql->bindparam(":pass",$datos['clave']);
		$sql->bindparam("estado",$datos['estado']);
		$sql->bindparam(":tipo",$datos['tipo']);
		try{
		$sql->execute();
		return $sql;
		}
		catch(PDOException $e)
		{
			
					
		}
		}	
		
//Eliminar cuenta
	protected function eliminar_cuenta($codigo)
	{
		$sql=self::conectar()->prepare("delete from cuenta where cuentacodigo=:codigo");
		$sql->bindparam(":codigo",$codigo);
		$sql->execute();
		
		return $sql;

	}

	protected function guardar_bitacora($datos)
	{
		$sql=self::conectar()->prepare("insert into bitacora(bitacoracodigo,bitacorafecha,bitacorahorainicio,bitacorahorafinal,bitacoratipo,bitacorayear,cuentacodigo) values (:codigo,:fecha,:inicio,:final,:tipo,:year,:cuenta)");
		$sql->bindparam(":codigo",$datos['codigo']);
		$sql->bindparam(":fecha",$datos['fecha']);
		$sql->bindparam(":inicio",$datos['horainicio']);
		$sql->bindparam(":final",$datos['horafinal']);
		$sql->bindparam(":tipo",$datos['tipo']);
		$sql->bindparam(":year",$datos['year']);
		$sql->bindparam(":cuenta",$datos['cuenta']);

		$sql->execute();
		return $sql; 
	}

	protected function actualizar_bitacora($codigo,$hora)
	{
	$sql=self::conectar()->prepare("update bitacora set bitacorahorafinal=:hora where bitacoracodigo = :codigo");
	$sql->bindparam(":hora", $hora);
	$sql->bindparam(":codigo", $codigo);
	$sql->execute();
	return $sql; 
	}

	protected function eliminar_bitacora($codigo)
	{
	$sql=self::conectar()->prepare("delete from bitacora where bitacoracodigo = :codigo");
	$sql->bindparam(":codigo",$codigo);
	$sql->execute();
	return $sql; 

	}


	public function encryption($string){
		$output=false;
		$key=hash('sha256',SECRET_KEY);
		$iv=substr(hash('sha256',SECRET_IV),0,16);
		$output=openssl_encrypt($string, method, $key, 0,$iv);
		$output=base64_encode($output);
		
		return $output;
	}	

	protected function decryption($string)
	{
		$key=hash('sha256',SECRET_KEY);
		$iv=substr(hash('sha256',SECRET_IV),0,16);
		$output=openssl_decrypt($string, method, $key,0,$iv);
		return $output;
	}

	protected function generar_codigo()
	{
		$consulta='select count(*) as tot from usuario';
		$sql=modeloMain::conectar()->prepare($consulta);
		$sql->execute();
		$data=$sql->fetch();
		//echo "Codigo Generado: " . $data['tot'];
		return $data{'tot'};


	}

	protected function limpiar_cadena($cadena)
	{
		$cadena=trim($cadena);
		$cadena=stripslashes($cadena);
		$cadena=str_ireplace("<script>","",$cadena);
		$cadena=str_ireplace("</script>","",$cadena);
		$cadena=str_ireplace("<script src","",$cadena);
		$cadena=str_ireplace("<script type","",$cadena);
		$cadena=str_ireplace("SELECT * FROM","",$cadena);
		$cadena=str_ireplace("DELETE FROM","",$cadena);
		$cadena=str_ireplace("INSERT INTO","",$cadena);
		$cadena=str_ireplace("--","",$cadena);
		$cadena=str_ireplace("^","",$cadena);
		$cadena=str_ireplace("[","",$cadena);
		$cadena=str_ireplace("]","",$cadena);
		$cadena=str_ireplace("==","",$cadena);
		return $cadena;

	}

	protected function Sweet_alert($datos)
	{
	
		if ($datos['Alerta']=='simple') 
		{
			$alerta='
			<script>
			swal("'. $datos["titulo"].'","'. $datos["texto"].'","'. $datos["tipo"].'");
			</script>
			';
			
		}
		elseif ($datos['Alerta']=='recargar') 
		{
		$alerta="
			<script>
			swal({
  			title: '" .$datos['titulo'] . "Recargado',
  			text:'" . $datos['texto'] . "',
  			type:'".$datos['tipo']. "',
  			confirmButtontext: 'Aceptar'
			}).then(function(){
				location.reload();
				})

			</script>

			";
		}
		elseif ($datos['Alerta']=='limpiar') 
		{
			$alerta="
			<script>
			swal({ 
  			title: '" .$datos['titulo']."',
  			text:'" . $datos['texto'] . "',
  			type:'".$datos['tipo']. "',
  			confirmButtontext: 'Aceptar'
			}).then(function(){
				$('.FormularioAjax')[0].reset();
				})

			</script>
			";
		}
		return $alerta;
	}

}