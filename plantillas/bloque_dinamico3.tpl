<html>
  <head>
    <title>Repeticion de bloques dinamicos</title>
  </head>
  <body>
    <!-- BEGIN error_query -->
      ERROR: no se ha podido ejecutar la búsqueda de usuarios: <br>
      {error_query.mensaje}
    <!-- END error_query -->
	
    <table>
        <tr>
          <td>Cedula</td>
          <td>Nombres</td>
          <td>Apellidos</td>
          <td>Login</td>
          <td>Password</td>
        </tr>
        <!-- BEGIN fila -->
        <tr>
          <td>{fila.cedula}</td>
          <td>{fila.nombre}</td>
          <td>{fila.apellido}</td>
          <td>{fila.login}</td>
          <td>{fila.clave}</td>
        </tr>
      <!-- END fila -->
    </table>
	
  </body>
</html>




