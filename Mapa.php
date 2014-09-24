function initialize(event) {

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
	$con=mysqli_connect("localhost","root","ninedata","freakeando");
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	// Consulta Select * from farmacias_csv
	if ($limitado) {
		$result = mysqli_query($con,"SELECT * FROM farmacias_csv WHERE `LATITUD` != '' AND `LONGITUD` != '' LIMIT " . $limite_busquedas);
	} else {
		$result = mysqli_query($con,"SELECT * FROM farmacias_csv WHERE `LATITUD` != '' AND `LONGITUD` != ''");
	}

	
	$row = mysqli_fetch_array($result);
	echo "locations = [ ['" . $row['PK'] . "', '" .
							  $row['NOMBRE'] . "', '" .
							  $row['DESCRIPCIONENTIDAD'] . "', '" .
							  $row['HORARIO'] . "', '" .
							  $row['EQUIPAMIENTO'] . "', '" .
							  $row['TRANSPORTE'] . "', '" .
							  $row['DESCRIPCION'] . "', '" .
							  $row['ACCESIBILIDAD'] . "', '" .
							  $row['CONTENTURL'] . "', '" .
							  $row['NOMBREVIA'] . "', '" .
							  $row['CLASEVIAL'] . "', '" .
							  $row['TIPONUM'] . "', '" .
							  $row['NUM'] . "', '" .
							  $row['PLANTA'] . "', '" .
							  $row['PUERTA'] . "', '" .
							  $row['ESCALERAS'] . "', '" .
							  $row['ORIENTACION'] . "', '" .
							  $row['LOCALIDAD'] . "', '" .
							  $row['PROVINCIA'] . "', '" .
							  $row['CODIGOPOSTAL'] . "', '" .
							  $row['BARRIO'] . "', '" .
							  $row['DISTRITO'] . "', '" .
							  $row['COORDENADAX'] . "', '" .
							  $row['COORDENADAY'] . "', " .
							  $row['LATITUD'] . ", " .
							  $row['LONGITUD'] . ", '" .
							  $row['TELEFONO'] . "', '" .
							  $row['FAX'] . "', '" .
							  $row['EMAIL'] . "', '" .
							  $row['TIPO'] . "']";
	while($row = mysqli_fetch_array($result)) {
		echo ",\n";
		echo "['" . $row['PK'] . "', '" .
					$row['NOMBRE'] . "', '" .
					$row['DESCRIPCIONENTIDAD'] . "', '" .
					$row['HORARIO'] . "', '" .
					$row['EQUIPAMIENTO'] . "', '" .
					$row['TRANSPORTE'] . "', '" .
					$row['DESCRIPCION'] . "', '" .
					$row['ACCESIBILIDAD'] . "', '" .
					$row['CONTENTURL'] . "', '" .
					$row['NOMBREVIA'] . "', '" .
					$row['CLASEVIAL'] . "', '" .
					$row['TIPONUM'] . "', '" .
					$row['NUM'] . "', '" .
					$row['PLANTA'] . "', '" .
					$row['PUERTA'] . "', '" .
					$row['ESCALERAS'] . "', '" .
					$row['ORIENTACION'] . "', '" .
					$row['LOCALIDAD'] . "', '" .
					$row['PROVINCIA'] . "', '" .
					$row['CODIGOPOSTAL'] . "', '" .
					$row['BARRIO'] . "', '" .
					$row['DISTRITO'] . "', '" .
					$row['COORDENADAX'] . "', '" .
					$row['COORDENADAY'] . "', " .
					$row['LATITUD'] . ", " .
					$row['LONGITUD'] . ", '" .
					$row['TELEFONO'] . "', '" .
					$row['FAX'] . "', '" .
					$row['EMAIL'] . "', '" .
					$row['TIPO'] . "']";
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
			InsertaBusqueda(pos,event);
		}, function() {
			handleNoGeolocation(true);
		});
	} else {
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	};
	//************************ PINTA EL MAPA ***********************************
}

function InsertaBusqueda(pos,event) {

	var xmlhttp=new XMLHttpRequest();
/*	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			console.log("Localización insertada correctamente.");
		}
	}*/
	xmlhttp.open("POST","insertaloc.php?lat="+pos.lat()+"&lng="+pos.lng()+"&time="+timeStamp(),true);
	xmlhttp.send();

}

function timeStamp() {
	// Create a date object with the current time
	var now = new Date();
	var mes = now.getMonth() + 1;
	if (mes <10 )  {
		var mes = "0"+mes;
	}
	
	var dia = now.getDate();
	if (dia <10 )  {
		var dia = "0"+dia;
	}
	
	// Create an array with the current month, day and time
	var date = [ now.getFullYear() , mes, dia];
	
	// Create an array with the current hour, minute and second
	var time = [ now.getHours(), now.getMinutes(), now.getSeconds() ];
	

	// If seconds and minutes are less than 10, add a zero
	for ( var i = 1; i < 3; i++ ) {
	if ( time[i] < 10 ) {
	time[i] = "0" + time[i];
	}
	}
	
	// Return the formatted string
	return date.join("-") + " " + time.join(":") ;
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
		distancia = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locations[i][24],locations[i][25]), new google.maps.LatLng(pos.lat(), pos.lng()));
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
	var contador = 0; 
	for (i = 0; i < locations.length; i++) { 
		distancia = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(locations[i][24],locations[i][25]), new google.maps.LatLng(pos.lat(), pos.lng()));
		if(distancia <= distancia_tope) {
			contador++;
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][24],locations[i][25]),
				map: map,
				//icon: icono_marcador, 
				title: locations[i][0] + " está a " + distancia.toString().substring(0,6) + " metros."
			});
			google.maps.Map.prototype.markers.push(marker);
		}
	};
	document.getElementById("resultado").innerHTML = "Se han encontrado " + contador + " farmacias a menos de " + distancia_tope + " metros de tí.";
}//************************ FIN PARÁMETROS JAVASCRIPT ***********************************
// Pinta en el mapa todos los puntos que estén a una distancia igual o menor que la indicada por el formulario distancia.
//************************ FIN PARÁMETROS JAVASCRIPT ***********************************
