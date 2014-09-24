var locations;
function inicializa() {
	//************************ Carga la tabla en locations ****************************
	<?php
	// Create connection
	$con=mysqli_connect("localhost","root","ninedata","freakeando");
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
	// Consulta Select * from farmacias_csv
	$result = mysqli_query($con,"SELECT COUNT(*) as contador, distrito FROM farmacias_csv WHERE distrito != '' GROUP BY distrito ORDER BY 1");

	
	$row = mysqli_fetch_array($result);
	echo "locations = [ ['" . $row['contador'] . "', '" .
							  $row['distrito'] . "']";
	while($row = mysqli_fetch_array($result)) {
		echo ",\n\t\t\t\t\t\t\t\t";
		echo "['" . $row['contador'] . "', '" .
					$row['distrito'] . "']";
	}
	echo "];\n\n\t";
	// Consulta Select * from distritobarrio
	$result2 = mysqli_query($con,"SELECT * FROM distritobarrio where ID_Barrio = 0");

	
	$row2 = mysqli_fetch_array($result2);
	echo "distritobarrio = [ ['" . $row2['ID_Distrito'] . "', '" .
							$row2['ID_Barrio'] . "', '" .
							$row2['Nombre'] . "', '" .
							$row2['Superficie'] . "', '" .
							$row2['Densidad'] . "', '" .
							$row2['Poblacion'] . "']";
	while($row2 = mysqli_fetch_array($result2)) {
		echo ",\n\t\t\t\t\t\t\t\t";
		echo "['" . $row2['ID_Distrito'] . "', '" .
					$row2['ID_Barrio'] . "', '" .
					$row2['Nombre'] . "', '" .
					$row2['Superficie'] . "', '" .
					$row2['Densidad'] . "', '" .
					$row2['Poblacion'] . "']";
	}
	
	
	mysqli_close($con);
	echo "];";
	?>
}


function cuantiza(criterio, distrito)  {
	switch (criterio) {
		case "farmacias":
			for (var i = 0; i<locations.length; i++) {
				if (locations[i][1]===distrito) {
					var color = d3.scale.linear()
										.domain([0, 139])
										.range([0,21])
					return "f" + parseInt(color(locations[i][0]));
				}
			}
			break;
		case "densidad":	
			for (var i = 0; i<distritobarrio.length; i++) {
				if (distritobarrio[i][2]===distrito) {
					var color = d3.scale.linear()
							.domain([0, 296])
							.range([20,255]);
					return "d" + parseInt(color(distritobarrio[i][4]));
				}
			}
			break;
		case "personasporfarmacia":
			for (var i = 0; i<locations.length; i++) {
				if (locations[i][1]===distrito) {
					var farmacias = locations[i][0];
				}
			}
			for (var i = 0; i<distritobarrio.length; i++) {
				if (distritobarrio[i][2]===distrito) {
					var poblacion = distritobarrio[i][5];
				}
			}
			var personasxfarmacia = poblacion/farmacias;
			var color = d3.scale.linear()
							.domain([1000, 3000])
							.range([20,255]);
			return "r" + parseInt(color(personasxfarmacia));
			break;
		case "farmaciasporkm":
			for (var i = 0; i<locations.length; i++) {
				if (locations[i][1]===distrito) {
					var farmacias = locations[i][0];
				}
			}
			for (var i = 0; i<distritobarrio.length; i++) {
				if (distritobarrio[i][2]===distrito) {
					var superficie = distritobarrio[i][3]/1000;
				}
			}
			var farmaciasxkm = farmacias/superficie;
			var color = d3.scale.linear()
							.domain([0, 255])
							.range([50,255]);
			return "b" + parseInt(color(farmaciasxkm));
			break;			
		default:
			break;
	}
}

function cuantiza_densidad_poblacion(distrito) {

}
	
function rellenamapa(criterio) {
	var svg = d3.select("body").selectAll("path");
    $(document).ready(function(){
		d3.select("body").select("#Centro").attr("class", cuantiza(criterio,"CENTRO"));
		d3.select("body").select("#FuencarralElPardo").attr("class", cuantiza(criterio,"FUENCARRAL-EL PARDO"));
		d3.select("body").select("#MoncloaAravaca").attr("class", cuantiza(criterio,"MONCLOA-ARAVACA"));
		d3.select("body").select("#Arganzuela").attr("class", cuantiza(criterio,"ARGANZUELA"));
		d3.select("body").select("#Latina").attr("class", cuantiza(criterio,"LATINA"));
		d3.select("body").select("#Carabanchel").attr("class", cuantiza(criterio,"CARABANCHEL"));
		d3.select("body").select("#Usera").attr("class", cuantiza(criterio,"USERA"));			
		d3.select("body").select("#Villaverde").attr("class", cuantiza(criterio,"VILLAVERDE"));
		d3.select("body").select("#VillaVallecas").attr("class", cuantiza(criterio,"VILLA DE VALLECAS"));
		d3.select("body").select("#Vicalvaro").attr("class", cuantiza(criterio,"VICALVARO"));
		d3.select("body").select("#Moratalaz").attr("class", cuantiza(criterio,"MORATALAZ"));
		d3.select("body").select("#Retiro").attr("class", cuantiza(criterio,"RETIRO"));
		d3.select("body").select("#SanBlas").attr("class", cuantiza(criterio,"SAN BLAS-CANILLEJAS"));
		d3.select("body").select("#Salamanca").attr("class", cuantiza(criterio,"SALAMANCA"));
		d3.select("body").select("#Barajas").attr("class", cuantiza(criterio,"BARAJAS"));
		d3.select("body").select("#Hortaleza").attr("class", cuantiza(criterio,"HORTALEZA"));
		d3.select("body").select("#CiudadLineal").attr("class", cuantiza(criterio,"CIUDAD LINEAL"));
		d3.select("body").select("#Chamartin").attr("class", cuantiza(criterio,"CHAMARTIN"));
		d3.select("body").select("#Tetuan").attr("class", cuantiza(criterio,"TETUAN"));
		d3.select("body").select("#Chamberi").attr("class", cuantiza(criterio,"CHAMBERI"));
		d3.select("body").select("#PuenteVallecas").attr("class", cuantiza(criterio,"PUENTE DE VALLECAS"));
	});
}
	
function pinchandotodos() {
	var svg = d3.select("body").selectAll("path").attr("class", cuantiza(criterio,"CENTRO"));
}

function pinchando() {
	var svg = d3.select("body").selectAll("path");
    $(document).ready(function(){
		$("#Centro").click(function() {
			d3.select("body").select("#Centro").attr("class", cuantiza(criterio,"CENTRO"));
		});
        $("#FuencarralElPardo").click(function() {
			d3.select("body").select("#FuencarralElPardo").attr("class", cuantiza(criterio,"FUENCARRAL-EL PARDO"));
		});				
        $("#MoncloaAravaca").click(function() {
			d3.select("body").select("#MoncloaAravaca").attr("class", cuantiza(criterio,"MONCLOA-ARAVACA"));
		});
        $("#Arganzuela").click(function() {
			d3.select("body").select("#Arganzuela").attr("class", cuantiza(criterio,"ARGANZUELA"));
		});				
		$("#Latina").click(function() {
			d3.select("body").select("#Latina").attr("class", cuantiza(criterio,"LATINA"));
		});
		$("#Carabanchel").click(function() {
			d3.select("body").select("#Carabanchel").attr("class", cuantiza(criterio,"CARABANCHEL"));
		});
		$("#Usera").click(function() {
			d3.select("body").select("#Usera").attr("class", cuantiza(criterio,"USERA"));			
		});
		$("#Villaverde").click(function() {
			d3.select("body").select("#Villaverde").attr("class", cuantiza(criterio,"VILLAVERDE"));
		});
		$("#VillaVallecas").click(function() {
			d3.select("body").select("#VillaVallecas").attr("class", cuantiza(criterio,"VILLA DE VALLECAS"));
		});
		$("#Vicalvaro").click(function() {
			d3.select("body").select("#Vicalvaro").attr("class", cuantiza(criterio,"VICALVARO"));
		});
		$("#Moratalaz").click(function() {
			d3.select("body").select("#Moratalaz").attr("class", cuantiza(criterio,"MORATALAZ"));
		});
		$("#Retiro").click(function() {
			d3.select("body").select("#Retiro").attr("class", cuantiza(criterio,"RETIRO"));
		});
		$("#SanBlas").click(function() {
			d3.select("body").select("#SanBlas").attr("class", cuantiza(criterio,"SAN BLAS-CANILLEJAS"));
		});
		$("#Salamanca").click(function() {
			d3.select("body").select("#Salamanca").attr("class", cuantiza(criterio,"SALAMANCA"));
		});
		$("#Barajas").click(function() {
			d3.select("body").select("#Barajas").attr("class", cuantiza(criterio,"BARAJAS"));
		});
		$("#Hortaleza").click(function() {
			d3.select("body").select("#Hortaleza").attr("class", cuantiza(criterio,"HORTALEZA"));
		});
		$("#CiudadLineal").click(function() {
			d3.select("body").select("#CiudadLineal").attr("class", cuantiza(criterio,"CIUDAD LINEAL"));
		});
		$("#Chamartin").click(function() {
			d3.select("body").select("#Chamartin").attr("class", cuantiza(criterio,"CHAMARTIN"));
		});
		$("#Tetuan").click(function() {
			d3.select("body").select("#Tetuan").attr("class", cuantiza(criterio,"TETUAN"));
		});
		$("#Chamberi").click(function() {
			d3.select("body").select("#Chamberi").attr("class", cuantiza(criterio,"CHAMBERI"));
		});
		$("#PuenteVallecas").click(function() {
			d3.select("body").select("#PuenteVallecas").attr("class", cuantiza(criterio,"PUENTE DE VALLECAS"));
		});
	});
}

function pinchandoazar() {	
	var svg = d3.select("body").selectAll("path");
    $(document).ready(function(){
		$("#Centro").click(function() {
			d3.select("body").select("#Centro").attr("class", cuantiza(criterio,"CENTRO"));
		});
        $("#FuencarralElPardo").click(function() {
			d3.select("body").select("#FuencarralElPardo").attr("class", cuantiza(criterio,"CENTRO"));
		});				
        $("#MoncloaAravaca").click(function() {
			d3.select("body").select("#MoncloaAravaca").attr("class", cuantiza(criterio,"CENTRO"));
		});
        $("#Arganzuela").click(function() {
			d3.select("body").select("#Arganzuela").attr("class", cuantiza(criterio,"CENTRO"));
		});				
		$("#Latina").click(function() {
			d3.select("body").select("#Latina").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Carabanchel").click(function() {
			d3.select("body").select("#Carabanchel").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Usera").click(function() {
			d3.select("body").select("#Usera").attr("class", cuantiza(criterio,"CENTRO"));			
		});
		$("#Villaverde").click(function() {
			d3.select("body").select("#Villaverde").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#VillaVallecas").click(function() {
			d3.select("body").select("#VillaVallecas").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Vicalvaro").click(function() {
			d3.select("body").select("#Vicalvaro").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Moratalaz").click(function() {
			d3.select("body").select("#Moratalaz").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Retiro").click(function() {
			d3.select("body").select("#Retiro").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#SanBlas").click(function() {
			d3.select("body").select("#SanBlas").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Salamanca").click(function() {
			d3.select("body").select("#Salamanca").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Barajas").click(function() {
			d3.select("body").select("#Barajas").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Hortaleza").click(function() {
			d3.select("body").select("#Hortaleza").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#CiudadLineal").click(function() {
			d3.select("body").select("#CiudadLineal").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Chamartin").click(function() {
			d3.select("body").select("#Chamartin").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Tetuan").click(function() {
			d3.select("body").select("#Tetuan").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#Chamberi").click(function() {
			d3.select("body").select("#Chamberi").attr("class", cuantiza(criterio,"CENTRO"));
		});
		$("#PuenteVallecas").click(function() {
			d3.select("body").select("#PuenteVallecas").attr("class", cuantiza(criterio,"CENTRO"));
		});
	});

}
