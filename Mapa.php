function initialize() {

	//************************ PARÁMETROS JAVASCRIPT ***********************************
	var zoom_mapa = 12;
	//************************ PARÁMETROS JAVASCRIPT ***********************************
	
	//************************ Carga la tabla en locations ****************************
	<?php
	//************************ PARÁMETROS PHP *****************************************
	$limitado=False;
	$limite_busquedas=50;
	//************************ PARÁMETROS PHP *****************************************
	
	// Create connection
	$con=mysqli_connect("localhost","root","*","freakeando");
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	// Consulta Select * from farmacias_csv
	if ($limitado) {
		$result = mysqli_query($con,"SELECT NOMBRE, LATITUD,
		LONGITUD FROM farmacias_csv WHERE `LATITUD` != '' AND `LONGITUD` != '' LIMIT " . $limite_busquedas);
	} else {
		$result = mysqli_query($con,"SELECT NOMBRE, LATITUD,
		LONGITUD FROM farmacias_csv WHERE `LATITUD` != '' AND `LONGITUD` != ''");
	}

	
	$row = mysqli_fetch_array($result);
	echo "locations = [ ['" . $row['NOMBRE'] . "', " . $row['LATITUD'] . "," . $row['LONGITUD'] . "]";
	while($row = mysqli_fetch_array($result)) {
		echo ",\n";
		echo "['" . $row['NOMBRE'] . "', " . $row['LATITUD'] . "," . $row['LONGITUD'] . "]";
	}
	mysqli_close($con);
	echo "];";
	?>
	//************************ Carga la tabla en locations ****************************
	

	//************************ PINTA EL MAPA ***********************************
	var mapOptions = {
		center: new google.maps.LatLng(40.444882, -3.6942995),
		zoom: zoom_mapa,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
		pos = new google.maps.LatLng(position.coords.latitude,
										position.coords.longitude);
		
		var infowindow = new google.maps.InfoWindow({
			map: map,
			position: pos,
			content: 'Estás aquí.'
		});
	
		google.maps.Map.prototype.markers = new Array();
			
		map.setCenter(pos);
	
		}, function() {
			handleNoGeolocation(true);
		});
	} else {
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	};
	//************************ PINTA EL MAPA ***********************************
}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function actualiza_web() {
	pinta_puntos();
	borra_tabla("container");
	pinta_tabla("container");
}	

function pinta_tabla(tableID) {
	var filapar = true;
	for (var i=0; i < locations.length; i++) {
		distancia = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locations[i][1],locations[i][2]), new google.maps.LatLng(pos.lat(), pos.lng()));
		if(distancia <= distancia_tope) {
			if (filapar) {
				addRow(locations[i], tableID, null);
				filapar=false;
			} else {
				addRow(locations[i], tableID, "alt");
				filapar=true;
			}				
		}
	}
	
}

//************************ INICIO PARÁMETROS JAVASCRIPT ***********************************
// Pinta en el mapa todos los puntos que estén a una distancia igual o menor que la indicada por el formulario distancia.
//************************ INICIO PARÁMETROS JAVASCRIPT ***********************************
function pinta_puntos() {

	//************************ PARÁMETROS JAVASCRIPT ***********************************
	var icono_marcador = 'images/farmacia.png';
	distancia_tope = document.getElementById('dist').value * 1000;
	//************************ PARÁMETROS JAVASCRIPT ***********************************
	
	//************************ BORRA LOS PUNTOS DEL MAPA ***********************************
	for (var i = 0; i < google.maps.Map.prototype.markers.length; i++) {
		google.maps.Map.prototype.markers[i].setMap(null);
    }
	google.maps.Map.prototype.markers = [];
	//************************ BORRA LOS PUNTOS DEL MAPA ***********************************	

	
	//**************************************************************************************************
	//* Recorre el array de todas las localizaciones y sólo muestra aquellas que estan a menos distancia 
	//* del parametro "distancia_tope" del punto geolocalizado
	//**************************************************************************************************
	var marker;
	for (i = 0; i < locations.length; i++) { 
		distancia = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locations[i][1],locations[i][2]), new google.maps.LatLng(pos.lat(), pos.lng()));
		if(distancia <= distancia_tope) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1],locations[i][2]),
				map: map,
				icon: icono_marcador, 
				title: locations[i][0] + " está a " + distancia.toString().substring(0,6) + " metros."
			});
			google.maps.Map.prototype.markers.push(marker);
		}
	};
}//************************ FIN PARÁMETROS JAVASCRIPT ***********************************
// Pinta en el mapa todos los puntos que estén a una distancia igual o menor que la indicada por el formulario distancia.
//************************ FIN PARÁMETROS JAVASCRIPT ***********************************
