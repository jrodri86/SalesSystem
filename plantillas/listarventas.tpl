<html>
  <head>
    <title>M&oacute;dulo de Ventas</title>
  </head>
  <body>
  <center><strong>M&Oacute;DULO DE VENTAS</strong></center>
  <br>
  <br>
    <!-- BEGIN error_query -->
      ERROR: no se ha podido ejecutar la búsqueda de usuarios: <br>
      {error_query.mensaje}
    <!-- END error_query -->
	
    <table align="center" cellspacing="4" cellpadding="8">
        <tr >
         <th >Nombre</th>
         <th>Tipo</th>
         <th>Producto</th>
          <th>Valor</th>
       </tr>
        <!-- BEGIN filaventas -->
        <tr>
         
          <td>{filaventas.nombre}</td>
          <td>{filaventas.tipo}</td>
          <td>{filaventas.producto}</td>
          <td>{filaventas.valor}</td>
        </tr>
      <!-- END filaventas -->
    </table>
    <p align><a href="redirecReporteVentas.php"><center>Imprimir Reporte de Ventas</center></a></p>
    <p align><a href="redirecPrincipal.php"><center>Volver a la p&aacute;gina principal</center></a></p>
    <p align><a href="cerrarsesion.php"><center>Cerrar Sesi&oacute;n</center></a></p>
       
  </body>
</html>



