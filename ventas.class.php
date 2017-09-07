<?php
require("conexion.php");
class Ventas extends Conexion{
	
	private $nombre;
	private $tipo;
	private $producto;
	private $valor;
	
	function __construct(){
		Conexion::__construct();
	}
			
	function listarVentas(){
		$query="SELECT * FROM ventas";
		$result=$this->ejecutar($query);
		return $result;
	}
}
?>