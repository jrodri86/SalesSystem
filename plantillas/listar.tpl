<html>
  <head>
    <title>Listado de Usuarios</title>
  </head>
  <body>
  <center><strong>M&Oacute;DULO DE USUARIOS</strong></center>
  <br>
  <br>
    <!-- BEGIN error_query -->
      ERROR: no se ha podido ejecutar la búsqueda de usuarios: <br>
      {error_query.mensaje}
    <!-- END error_query -->
	
    <table align="center" cellspacing="4" cellpadding="3">
        <tr >
         <th >Nombre</th>
         <th>Apellido</th>
         <th>Login</th>
          <th>Clave</th>
       </tr>
        <!-- BEGIN fila -->
        <tr>
         
          <td>{fila.nombre}</td>
          <td>{fila.apellido}</td>
          <td>{fila.login}</td>
          <td>{fila.clave}</td>
        </tr>
      <!-- END fila -->
    </table>
    <p align><a href="redirecReporteU.php"><center>Imprimir Reporte de Usuarios</center></a></p>
    <p align><a href="redirecPrincipal.php"><center>Volver a la p&aacute;gina principal</center></a></p>
    <p align><a href="cerrarsesion.php"><center>Cerrar Sesi&oacute;n</center></a></p>

  </body>
</html>




