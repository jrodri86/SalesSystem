<?php
	function imprimirEncabezado($margenizq) {
		global $pdf, $aC1, $aC2, $aC3, $aC4;
		
		//Imprimir Titulo antes de la tabla
		$pdf->Ln(15);
		$pdf->SetFont("helvetica","b",12);
		$pdf->Cell(0, 5, "USUARIOS DEL SISTEMA", 0, 0, "C", 0);
		$pdf->Ln(15);
		
		//Imprimir Fila de Título en la tabla
		$pdf->SetX($margenizq);
		$pdf->SetTextColor(255,255,255);
		$pdf->MultiCell($aC1,8,"NOMBRE",1,"C",1,0);
		$pdf->MultiCell($aC2,8,"APELLIDO",1,"C",1,0);
		$pdf->MultiCell($aC3,8,"LOGIN",1,"C",1,0);
		$pdf->MultiCell($aC4,8,"CLAVE",1,"C",1,1);
		
		//Tipo de Fuente para el resto de las filas
		$pdf->SetFont("helvetica","",11);
		$pdf->SetTextColor(0,0,0);
	}
	

	require_once('tcpdf/tcpdf.php');
	
	
	//Se obtiene la información de la base de datos
	
	$idc = mysqli_connect("localhost","root","");
	mysqli_select_db("php_sistema",$idc);
	$sql = "SET NAMES utf8";
	$res = 	mysqli_query($sql,$idc);
	
	$sql = "SELECT * FROM usuarios";
	$res = 	mysqli_query($sql,$idc);
	
	//Creación de un documento nuevo TCPDF
	$pdf = new TCPDF("L"); //Orientación Horizontal
	
	/* PRIMER PASO */
	//Se define el encabezado y pie de página
	$pdf->SetHeaderData("logo.png",12, "Josman Rodriguez", "CI: V-17907688", array(0,0,0), array(0,64,128));
	$pdf->SetFooterData(array(0,0,0), array(0,64,128));
	
    //Establecer la fuentes para el encabezado y pie de página
	$pdf->SetHeaderFont(array("times",'I',13));
	$pdf->SetFooterFont(array("times",'BI',9));
	
	/* SEGUNDO PASO */
	//Establece la fuente con que se escribirá el texto
	$pdf->SetFont("helvetica","",12);
	
	//Establece los márgenes
	$pdf->SetMargins(25,30,25);
	$pdf->SetHeaderMargin(10);
	$pdf->SetFooterMargin(15);
	
	
	/* TERCER PASO */
	
	//Add a page
	$pdf->AddPage();
	
	//Ancho de las columnas
	$aC1 = 40;
	$aC2 = 40;
	$aC3 = 50;
	$aC4 = 30;
	
	//Se determina el margen izquierdo para que la tabla quede centrada
	$ancho = $pdf->getPageWidth();
	$margenes = $pdf->getMargins();
	$ancho -= $margenes["left"] - $margenes["right"];
	$margenizq = ($ancho - $aC1 - $aC2 - $aC3 - $aC4) / 2;
	
	//Imprimir el encabezado de la tabla
	imprimirEncabezado($margenizq);
	
	//Imprimir el contenido de la tabla
	
	while ($registro = mysqli_fetch_array($res)) {
		$pdf->SetX($margenizq);
		$pdf->MultiCell(40,8,$registro["nombre"],1,"L",0,0);
		$pdf->MultiCell(40,8,$registro["apellido"],1,"C",0,0);
		$pdf->MultiCell(50,8,$registro["login"],1,"L",0,0);
		$pdf->MultiCell(30,8,$registro["clave"],1,"R",0,1);
		$y = $pdf->GetY();
		$ret=$pdf->getMargins();
		$altoPagina = $pdf->GetPageHeight() - $ret["bottom"];
		
		if (($y+16) >$altoPagina) {
			$pdf = AddPage();
			imprimirEncabezado($margenizq);
			$y = 0;
		}
	}
	
	/* CUARTO PASO */
	//Permitir que salga el archivo
	$pdf->Output('tcpdf_1.pdf', 'I');
?>