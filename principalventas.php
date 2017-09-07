<?php
require_once("session.php");

require_once('includes/template.php');
require_once('ventas.class.php');

try{
$template = new Template('plantillas/');

$template->set_filenames(
array('listarventas' => 'listarventas.tpl')
);

$objVentas = new Ventas();

$result=$objVentas->listarVentas();

while($row=$objVentas->obtenerArreglo($result))
{
	$template->assign_block_vars('filaventas',$row);
}

$template->pparse('listarventas');
}
catch (Exception $e){
	$template->assign_block_vars("error_query",array('mensaje'=>$e->getMessage()));
}
?>