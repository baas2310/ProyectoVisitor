<?php
	
	require ('../conexion.php');

$IdCarcel = $_POST['IdCarcel'];
	
	$queryM = "SELECT IdUbicacionInterno, Patio, Seccion, Celda FROM tbUbicacionInterno WHERE IdCarcel = '$IdCarcel' ORDER BY Patio";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Ubicacion</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['IdUbicacionInterno']."'>"."Patio: ".$rowM['Patio']." Seccion: ".$rowM['Seccion']." Celda: ".$rowM['Celda']."</option>";
	}
	
	echo $html;
?>		