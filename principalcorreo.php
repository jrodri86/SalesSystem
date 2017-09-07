<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Envío de correo con un archivo adjunto</title>
  </head>

  <body>
	<b><center>Envío de un correo con un archivo adjunto:</center></b>
    
    <form action="enviarcorreo.php" method="post" enctype="multipart/form-data">
      <p>Para:   <input type="text" name="para" size="25"></p>
      <p>Asunto: <input type="text" name="asunto" size="25"></p>
      <p>Mensaje:<br>
      <textarea name="mensaje" cols="50" rows="5"></textarea></p>
      <p>Archivo adjunto: <input type="file" name="adjunto" ></p>
	  <p><input type="submit" name="Submit" value="Enviar"></p>
    <p align><a href="redirecPrincipal.php"><center>Volver a la p&aacute;gina principal</center></a></p>
      <p align><a href="cerrarsesion.php"><center>Cerrar Sesi&oacute;n</center></a></p>
      
     </form>
      
  </body>
</html>