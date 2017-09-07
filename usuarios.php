<?php
require_once("session.php");

require_once('includes/template.php');
require_once('usuario.class.php');

try{
$template = new Template('plantillas/');

$template->set_filenames(
array('listar' => 'listar.tpl')
);

$objUsuario= new Usuario();

$result=$objUsuario->listarUsuarios();

while($row=$objUsuario->obtenerArreglo($result))
{
	$template->assign_block_vars('fila',$row);
}

$template->pparse('listar');
}
catch (Exception $e){
	$template->assign_block_vars("error_query",array('mensaje'=>$e->getMessage()));
}
?>