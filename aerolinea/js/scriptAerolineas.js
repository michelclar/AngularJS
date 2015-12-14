var app = angular.module("miaplicacion", []);
app.controller('micontrol', function($scope, $http){

	$scope.alimentacion;
	$scope.internet;
	$scope.maletero;

	$scope.reservar = function() {

		$http.get("php/consultarTarifa.php?origen=" + $scope.origen + "&destino=" + $scope.destino)
		.then(function(respuesta){
			$scope.r3 = respuesta.data.valor;
				// $scope.valorV = $scope.r3;
				// alert($scope.valorV);

			
			$http.get("php/consultarServicio.php?")
			.then(function(respuesta){
				$scope.ali = parseInt(respuesta.data.servicios[0].valor);
				$scope.inter = parseInt(respuesta.data.servicios[1].valor);
				$scope.mal = parseInt(respuesta.data.servicios[2].valor);
				

				//LOGICA	
				if ($scope.edad == null ) {
					alert("Edad obligatoria");
				};
				//validacion ciudades origen destino
				if ($scope.origen == $scope.destino) {
					alert("Debe elegir destinos diferente");
				} else {
					$scope.nombre;
					$scope.edad;
					$scope.origen;
					$scope.destino;
					$scope.clase;

					$scope.valorV = parseInt($scope.r3); //TARIFA
					//alert($scope.valorV);
					
					$scope.valorIncremento = 0;
					$scope.valorTI = 0; //TOTALTI(total tarifa + incremento)
					$scope.des = 0;
					$scope.valorTP = 0; //TOTALPASAJE
					$scope.valorS = 0;	//servicios
					$scope.valorT = 0; //TOTAL
						
					//clase

					if ($scope.clase == "turista") { 
						$scope.valorIncremento = 0; //INCREMENTO	
						$scope.valorTI = $scope.valorV;	//TOTALTI(total tarifa + incremento)
					};				

					if ($scope.clase == "primera") {
						$scope.valorIncremento = $scope.valorV * 0.2; 	//INCREMENTO	
						$scope.valorTI = $scope.valorV + $scope.valorIncremento;	//TOTALTI(total tarifa + incremento)
					};				

					if ($scope.clase == "ejecutiva") {
						$scope.valorIncremento = $scope.valorV * 0.5; 	//INCREMENTO	
						$scope.valorTI = $scope.valorV + $scope.valorIncremento;	//TOTALTI(total tarifa + incremento)
					};

					// edad
			
					if ($scope.edad >= 30) {
						$scope.des = $scope.valorTI * 0.1; 		//DESCUENTO							
						$scope.valorTP = $scope.valorTI - $scope.des; 	//TOTALPASAJE

					} else {
						$scope.des = $scope.valorTI * 0.15;							
						$scope.valorTP = $scope.valorTI - $scope.des;
					};

					// servicios

					$scope.valorServicio = 0;		//valor servicios	
					if ($scope.alimentacion) {					
						$scope.valorServicio = $scope.valorServicio + $scope.ali;					
					};

					if ($scope.internet){						
						$scope.valorServicio = $scope.valorServicio + $scope.inter;
					};

					if ($scope.maletero){						
						$scope.valorServicio = $scope.valorServicio + $scope.mal;
					};

					//$scope.valorServicio = $scope.ali + $scope.inter + $scope.mal;

					$scope.valorS = $scope.valorServicio;		//SERVICIOS
					
					//Total

					$scope.valorT = $scope.valorTP + $scope.valorS;  //TOTAL A PAGAR	


					// Registro de datos
					// agregarReserva.php?id=&nombre="michel"&edad=12&origen="d"&destino="a"&clase="ass"&valorV=32&valorIncremento=2323&valorTI=2323&des=22&valorTP=3&valorS=777&valorT=999
					// 
					$scope.querystring = "php/agregarReserva.php?id=&nombre=" + $scope.nombre + "&edad=" + $scope.edad + "&origen=" + $scope.origen + "&destino=" + $scope.destino + "&clase=" + $scope.clase + "&valorV=" + $scope.valorV + "&valorIncremento=" + $scope.valorIncremento + "&valorTI=" + $scope.valorTI + "&des=" + $scope.des + "&valorTP=" + $scope.valorTP + "&valorS=" + $scope.valorS + "&valorT=" + $scope.valorT;
					$http.get($scope.querystring)
					.then(function(respuesta){
						$scope.r1 = respuesta.data;
						alert($scope.r1.mensaje);

						$http.get("php/consultarReserva.php")
						.then(function(respuesta){
							$scope.r2 = respuesta.data.reservas;
							
						}, function(respuesta){
							alert("error");
							$scope.r2 = "no fue posible establecer conexion";
						});


					}, function(respuesta){
						alert("error");
						$scope.r1 = "no fue posible establecer conexion";
					});	


				}

			}, function(respuesta){
				alert("error");
			});	


		}, function(respuesta){
			alert("error");
			$scope.r3 = "no fue posible establecer conexion";
		});	

	};

	$http.get("php/consultarReserva.php")
	.then(function(respuesta){
		$scope.r2 = respuesta.data.reservas;
	}, function(respuesta){
		alert("error");
		$scope.r2 = "no fue posible establecer conexion";
	});

	$http.get("php/consultarCiudad.php?")
	.then(function(respuesta){
		$scope.ciudad = respuesta.data.ciudades;
	}, function(respuesta){
			alert("error");
		
	});	


			
	
});