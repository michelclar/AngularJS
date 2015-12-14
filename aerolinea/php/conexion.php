<?php

class Conexion {
	private $mySQLI;
	private $sql;
	private $result;
	private $filasAfectadas;
	public function abrir(){
		$this->mySQLI = new mysqli("localhost","root","","aerolinea");
		if (mysqli_connect_error()) {
			return 0;
		} else {
			return 1;
		}

	}

	public function cerrar(){
		$this->mySQLI->close();
	}

	public function consulta($sql){
		$this->sql = $sql;
		$this->result = $this->mySQLI->query($this->sql);
		$this->filasAfectadas = $this->mySQLI->affected_rows;
	}

	public function obtenerResult (){
		return $this->result;

	}

	public function obtenerFilasAfectadas(){
		return $this->filasAfectadas;
	}


}


?>