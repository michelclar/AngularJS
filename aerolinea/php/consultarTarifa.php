<?php
	require_once 'conexion.php';
	$conexion = new conexion();
	$conexion->abrir();
	$origen = $_GET['origen'];
	$destino = $_GET['destino'];
	$sql = "SELECT valor FROM tarifas WHERE origen = '$origen' AND destino = '$destino'";
	$conexion->consulta($sql);
	$result = $conexion->obtenerResult();
	$conexion->cerrar();
	if ($result->num_rows > 0) {
		$respuesta["valor"] = array();
		while ($fila = $result->fetch_object()) {
			// $tarifa = array();
			// $tarifa["valor"] = $fila->valor;
			// array_push($respuesta["tarifas"], $tarifa);
			$respuesta["valor"] = $fila->valor;
		}
		$respuesta["accion"] = 1;
		echo json_encode($respuesta);
	} else {
		$respuesta["accion"] = 0;
		$respuesta["mensaje"] = "No se han encontrado tarifas";
		echo json_encode($respuesta);

	}

?>	