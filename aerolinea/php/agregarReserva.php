<?php
	require_once 'conexion.php';
	$conexion = new conexion();
	$conexion->abrir();
	$id = $_GET['id'];
	$nombre = $_GET['nombre'];
	$edad = $_GET['edad'];
	$origen = $_GET['origen'];
	$destino = $_GET['destino'];
	$clase = $_GET['clase'];
	$valorV = $_GET['valorV'];	//TARIFA
	$valorIncremento = $_GET['valorIncremento'];
	$valorTI = $_GET['valorTI'];	//TOTALTI(total tarifa + incremento)
	$des = $_GET['des'];
	$valorTP = $_GET['valorTP'];	//TOTALPASAJE
	$valorS = $_GET['valorS'];	//servicios
	$valorT = $_GET['valorT'];	//TOTAL
	$sql = "INSERT INTO reservas VALUES (id,'$nombre', $edad, '$origen', '$destino', '$clase', $valorV, $valorIncremento, $valorTI, $des, $valorTP, $valorS, $valorT)";
	$conexion->consulta($sql);
	$filasAfectadas = $conexion->obtenerFilasAfectadas();
	$conexion->cerrar();
	$respuesta = array();
	if ($filasAfectadas > 0) {
		$respuesta["accion"] = 1;
		$respuesta["mensaje"] = "Reserva exitosa";
		echo json_encode($respuesta);

	} else {
		$respuesta["accion"] = 0;
		$respuesta["mensaje"] = "Reserva fallida";
		echo json_encode($respuesta);
	}


?>