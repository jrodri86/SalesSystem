<?php
require("conexion.php");
class Usuario extends Conexion{
	
	//private $cedula;
	private $nombre;
	private $apellido;
	private $login;
	private $clave;
	
	function __construct(){
		Conexion::__construct();
	}
	
	function validarUsuario($log,$cla){
		$this->login=$log;
		$this->clave=$cla;
		$query="SELECT nombre, apellido
				FROM usuarios
				WHERE login='".$this->login."' AND clave='".$this->clave."'";
		$resource=$this->ejecutar($query);
		$cantidad=$this->cantidadRegistros($resource);
		if($cantidad>0){
			$fila = mysql_fetch_assoc($resource); 
			$this->nombre=$fila["nombre"];
			$this->apellido=$fila["apellido"];
			return true;
		}
		else
			return false;
	}
	
	function getNombre(){
		return $this->nombre;
	}
	
	function getApellido(){
		return $this->apellido;
	}
	
	function listarUsuarios(){
		$query="SELECT * FROM usuarios";
		$result=$this->ejecutar($query);
		return $result;
	}
}
?>





