<?php
	require_once 'conexion.php';
	$conexion = new conexion();
	$conexion->abrir();
	//$nombre = $_GET['nombre'];
	$sql = "SELECT * FROM ciudad ";
	$conexion->consulta($sql);
	$result = $conexion->obtenerResult();
	$conexion->cerrar();
	if ($result->num_rows > 0) {
		$respuesta["ciudades"] = array();
		while ($fila = $result->fetch_object()) {
			$ciudad = array();
			$ciudad["id"] = $fila->id;
			$ciudad["nombre"] = $fila->nombre;
			array_push($respuesta["ciudades"], $ciudad);
			// $respuesta["valor"] = $fila->valor;

		}
		$respuesta["accion"] = 1;
		echo json_encode($respuesta);
	} else {
		$respuesta["accion"] = 0;
		$respuesta["mensaje"] = "No se han encontrado ciudades";
		echo json_encode($respuesta);

	}

?>	