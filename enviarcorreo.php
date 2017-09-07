<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Envío de correo con un archivo adjunto</title>
  </head>

  <body>
  <?php
  	$para = $_POST['para'];
    $asunto = $_POST['asunto'];
	
	//procedemos a subir el archivo adjunto al servidor
	
	$origen = $_FILES['adjunto']['tmp_name'];
  	$destino = "tmp/".$_FILES['adjunto']['name'];
	
	if(!@move_uploaded_file($origen,$destino)) {
		die("Error al intentar subir el archivo");
	}
	
	//abrimos el archivo y lo leemos
	$fp = fopen($destino,'rb');
	$data = fread($fp,$_FILES['adjunto']['size']);
	fclose($fp);
	
	//aplicamos el formato RFC 2045
	$data = chunk_split(base64_encode($data));
	
	//inicializamos el borde multiparte
    $borde_mime = "BORDE_MULTIPARTE_123";
	
	//DIFINICION DEL \r\n
	$ent = chr(13).chr(10);
	
	//se indica el tipo multiparte y se le indica el nombre del borde
	$headers = "Content-Type: multipart/mixed; "."boundary=".chr(34).$borde_mime.chr(34);
	
	//se crea el cuerpo del mensaje
	
	$mensaje = "--$borde_mime".$ent;
	$mensaje .= "Content-Type: text/html; "."charset=".chr(34)."iso-8859-1".chr(34).";".$ent-$ent;
	$mensaje .= $_POST['mensaje'].$ent.$ent;
	
	//se inserta en nuevo borde, la información del archivo y la data
	$mensaje .= "--$borde_mime".$ent;
	$mensaje .= "Content-Type: ".$_FILES['adjunto']['type'].";"."name=".chr(34).$_FILES['adjunto']['name'].chr(34).";".$ent;
	$mensaje .= "Content-Transfer-Encoding: base64 ".$ent;
    $mensaje .= "Content-Disposition: attachement; "."filename=".chr(34).$_FILES['adjunto']['name'].chr(34).";".$ent.$ent;
	
    $mensaje .= "$data".$ent;
	
	
	// se incluye el fin de los contnenedores
	$mensaje .= "--$borde_mime--".$ent;
	
	if(!$enviado = mail($para,$asunto,$mensaje,$headers)) {
		echo "Error al intentar envíar el correo\n";
	}
	else {
		echo "Correo enviado con éxito\n";
	}
		
	?>
  </body>
</html>