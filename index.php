<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/estilos.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>

<?php
require_once("usuario.class.php");

$mensaje="";

if(isset($_POST["Enviar"]))
{
	$login=$_POST["login"];
	$clave=$_POST["passw"];
	
	if(trim($login)=="" || trim($clave)=="")
	{
		$mensaje="El login y la clave no pueden ser espacios en blanco";
	}
	else{
		try{
			$objUsuario = new Usuario();
			$existeUsuario = $objUsuario->validarUsuario($login,$clave);
			if($existeUsuario)
			{
				session_start();
				
				$_SESSION["nombre"]=$objUsuario->getNombre()." ".$objUsuario->getApellido();
				header("Location: principal.php");
			}
			else
				$mensaje="Login o clave inválidos";
		}
		catch (Exception $e){
			echo $e->getMessage();
			exit();
		}
	}
}

?>
</head>

<body>
 <p id="inicial">
  Pagina Inicial
 </p>
<form id="form1" name="form1" method="post" action="index.php">
  <table width="32%" border="0" align="center">
    <tr>
      <td colspan="2"><?php echo $mensaje?></td>
    </tr>
    <tr>
      <td width="33%"><span class="datos">login:</span></td>
      <td width="67%"><label>
        <input type="text" name="login" />
      </label></td>
    </tr>
    <tr>
      <td><span class="datos">password:</span></td>
      <td><input type="password" name="passw" /></td>
    </tr>
    <tr>
      <td colspan="2"><label>
      <div align="center">
        <input name="Enviar" type="submit" id="Enviar" value="Enviar" />
      </div>
      </label></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
