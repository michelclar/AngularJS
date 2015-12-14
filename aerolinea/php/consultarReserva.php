<?php
	require_once 'conexion.php';
	$conexion = new conexion();
	$conexion->abrir();
	$sql = "SELECT id, nombre, origen, destino, clase, totalti, descuento, servicios, totalpagar FROM reservas";
	$conexion->consulta($sql);
	$result = $conexion->obtenerResult();
	$conexion->cerrar();
	if ($result->num_rows > 0) {
		$respuesta["reservas"] = array();
		while ($fila = $result->fetch_object()) {
			$reserva = array();
			$reserva["id"] = $fila->id;
			$reserva["nombre"] = $fila->nombre;
			$reserva["origen"] = $fila->origen;
			$reserva["destino"] = $fila->destino;
			$reserva["clase"] = $fila->clase;
			$reserva["totalti"] = $fila->totalti;
			$reserva["descuento"] = $fila->descuento;
			$reserva["servicios"] = $fila->servicios;
			$reserva["totalpagar"] = $fila->totalpagar;
			array_push($respuesta["reservas"], $reserva);
		}
		$respuesta["accion"] = 1;
		echo json_encode($respuesta);
	} else {
		$respuesta["accion"] = 0;
		$respuesta["mensaje"] = "No se han encontrado reservas";
		echo json_encode($respuesta);

	}

?>	