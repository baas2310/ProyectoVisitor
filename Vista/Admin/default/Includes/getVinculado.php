<?php
	
	require ('../conexion.php');

$IdVisitante = $_POST['IdVisitante'];
	
	$queryM = "SELECT tbregistro.IdRegistro, TD, tbtipointerno.TipoInterno,tbinterno.Nombre1,tbinterno.Apellido1 FROM `tbvinvulo`INNER JOIN tbregistro on tbregistro.IdRegistro = tbvinvulo.IdVisitado INNER JOIN tbtipointerno on tbregistro.IdTipoInterno = tbtipointerno.IdTipoInterno INNER JOIN tbinterno ON tbinterno.IdInterno = tbregistro.IdRegistrado WHERE tbvinvulo.IdVisitante = '$IdVisitante' ";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Interno</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['IdRegistro']."'>"." ".$rowM['TD']."  ".$rowM['TipoInterno']."  ".$rowM['Nombre1']." ".$rowM['Apellido1']."</option>";
	}
	
	echo $html;
?>		