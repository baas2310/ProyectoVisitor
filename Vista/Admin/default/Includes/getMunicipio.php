<?php
	
	require ('../conexion.php');

$id_departamento = $_POST['id_departamento'];
	
	$queryM = "SELECT id_municipio, municipio FROM municipios WHERE departamento_id = '$id_departamento' ORDER BY municipio";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_municipio']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>		