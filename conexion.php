<?php
class Conexion{
	private $server;
	private $usuario;
	private $password;
	private $bd;
	private $links;
	
	function __construct()
	{
		$this->server="localhost";
		$this->usuario="root";
		$this->password="";
		$this->bd="php_sistema";
		
		$this->conectarServidor();
	}
	
	function conectarServidor()
	{
		$this->links=@mysql_connect($this->server,$this->usuario,$this->password);
		
		if($this->links==false)
			throw new Exception("Error conectandose ".mysql_error());
			
		
		$select_db=@mysql_select_db($this->bd,$this->links);
		
		if($select_db==false)
			throw new Exception("Error seleccionando bd ".mysql_error());		
	}
	
	function ejecutar($query)
	{
		$result=@mysql_query($query);
		if(!$result)
		{
			throw new Exception("Error con la ejecución de la consulta ".mysql_error());	
		}
		return $result;
	}
	
	function cantidadRegistros($resource)
	{
		$cantidad=mysql_num_rows($resource);
		return $cantidad;
	}
	
	function obtenerArreglo($result)
	{
		$arreglo=mysql_fetch_array($result);
		return $arreglo;
	}
}
?>