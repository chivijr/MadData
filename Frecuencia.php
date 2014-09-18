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
	mysqli_close($con);
	echo "];";
	?>
	

	/* Se puede borrar*/
var svg = d3.select("body").selectAll("path");
    $(document).ready(function(){
		$("#Centro").click(function() {
			d3.select("body").select("#Centro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
        $("#FuencarralElPardo").click(function() {
			d3.select("body").select("#FuencarralElPardo").attr("class", "q"+Math.floor(Math.random() * 8));
		});				
        $("#MoncloaAravaca").click(function() {
			d3.select("body").select("#MoncloaAravaca").attr("class", "q"+Math.floor(Math.random() * 8));
		});
        $("#Arganzuela").click(function() {
			d3.select("body").select("#Arganzuela").attr("class", "q"+Math.floor(Math.random() * 8));
		});				
		$("#Latina").click(function() {
			d3.select("body").select("#Latina").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Carabanchel").click(function() {
			d3.select("body").select("#Carabanchel").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Usera").click(function() {
			d3.select("body").select("#Usera").attr("class", "q"+Math.floor(Math.random() * 8));			
		});
		$("#Villaverde").click(function() {
			d3.select("body").select("#Villaverde").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#VillaVallecas").click(function() {
			d3.select("body").select("#VillaVallecas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Vicalvaro").click(function() {
			d3.select("body").select("#Vicalvaro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Moratalaz").click(function() {
			d3.select("body").select("#Moratalaz").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Retiro").click(function() {
			d3.select("body").select("#Retiro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#SanBlas").click(function() {
			d3.select("body").select("#SanBlas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Salamanca").click(function() {
			d3.select("body").select("#Salamanca").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Barajas").click(function() {
			d3.select("body").select("#Barajas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Hortaleza").click(function() {
			d3.select("body").select("#Hortaleza").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#CiudadLineal").click(function() {
			d3.select("body").select("#CiudadLineal").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Chamartin").click(function() {
			d3.select("body").select("#Chamartin").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Tetuan").click(function() {
			d3.select("body").select("#Tetuan").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Chamberi").click(function() {
			d3.select("body").select("#Chamberi").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#PuenteVallecas").click(function() {
			d3.select("body").select("#PuenteVallecas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
	});
	/*Se puede borrar */
	
}

function todos() {
	var svg = d3.select("body").selectAll("path").attr("class", "q"+Math.floor(Math.random() * 8));
}

function pinchando() {	
	var svg = d3.select("body").selectAll("path");
    $(document).ready(function(){
		$("#Centro").click(function() {
			d3.select("body").select("#Centro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
        $("#FuencarralElPardo").click(function() {
			d3.select("body").select("#FuencarralElPardo").attr("class", "q"+Math.floor(Math.random() * 8));
		});				
        $("#MoncloaAravaca").click(function() {
			d3.select("body").select("#MoncloaAravaca").attr("class", "q"+Math.floor(Math.random() * 8));
		});
        $("#Arganzuela").click(function() {
			d3.select("body").select("#Arganzuela").attr("class", "q"+Math.floor(Math.random() * 8));
		});				
		$("#Latina").click(function() {
			d3.select("body").select("#Latina").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Carabanchel").click(function() {
			d3.select("body").select("#Carabanchel").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Usera").click(function() {
			d3.select("body").select("#Usera").attr("class", "q"+Math.floor(Math.random() * 8));			
		});
		$("#Villaverde").click(function() {
			d3.select("body").select("#Villaverde").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#VillaVallecas").click(function() {
			d3.select("body").select("#VillaVallecas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Vicalvaro").click(function() {
			d3.select("body").select("#Vicalvaro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Moratalaz").click(function() {
			d3.select("body").select("#Moratalaz").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Retiro").click(function() {
			d3.select("body").select("#Retiro").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#SanBlas").click(function() {
			d3.select("body").select("#SanBlas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Salamanca").click(function() {
			d3.select("body").select("#Salamanca").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Barajas").click(function() {
			d3.select("body").select("#Barajas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Hortaleza").click(function() {
			d3.select("body").select("#Hortaleza").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#CiudadLineal").click(function() {
			d3.select("body").select("#CiudadLineal").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Chamartin").click(function() {
			d3.select("body").select("#Chamartin").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Tetuan").click(function() {
			d3.select("body").select("#Tetuan").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#Chamberi").click(function() {
			d3.select("body").select("#Chamberi").attr("class", "q"+Math.floor(Math.random() * 8));
		});
		$("#PuenteVallecas").click(function() {
			d3.select("body").select("#PuenteVallecas").attr("class", "q"+Math.floor(Math.random() * 8));
		});
	});

}
