<?php
	require_once 'conexion.php';
	$conexion = new conexion();
	$conexion->abrir();
	//$nombre = $_GET['nombre'];
	$sql = "SELECT * FROM servicios ";
	$conexion->consulta($sql);
	$result = $conexion->obtenerResult();
	$conexion->cerrar();
	if ($result->num_rows > 0) {
		$respuesta["servicios"] = array();
		while ($fila = $result->fetch_object()) {
			$servicio = array();
			$servicio["nombre"] = $fila->nombre;
			$servicio["valor"] = $fila->valor;
			array_push($respuesta["servicios"], $servicio);
			// $respuesta["valor"] = $fila->valor;

		}
		$respuesta["accion"] = 1;
		echo json_encode($respuesta);
	} else {
		$respuesta["accion"] = 0;
		$respuesta["mensaje"] = "No se han encontrado servicios";
		echo json_encode($respuesta);

	}

?>	