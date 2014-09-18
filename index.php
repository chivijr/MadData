<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!--  Importamos el css -->	
		<link rel="stylesheet" href="styles.css">

		<!--  Javacript de Google para el mapa -->
		<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places&sensor=false"></script>
		
		<!-- Javascript NineDATA -->
		<script type="text/javascript" src="Mapa.php"></script>
		<script type="text/javascript" src="Tabla.php"></script>
	</head>
	
	<body onload="initialize()">
		<div id="header">
			<div class="Data">NineDATA</div>
		</div>
		<a href="/Coropleta/Frecuencia.html" target="_self" class="enlace">
			Distritos
		</a>		
		<div id="centro">
			<div id="texto">
			<!--	<p id="parrafo">Lorem fistrum ahorarr pecador papaar papaar no te digo trigo por no llamarte Rodrigor a gramenawer apetecan. Ese pedazo de a gramenawer a wan papaar papaar qué dise usteer a peich. Va usté muy cargadoo de la pradera diodeno quietooor te voy a borrar el cerito caballo blanco caballo negroorl. La caidita me cago en tus muelas por la gloria de mi madre te voy a borrar el cerito caballo blanco caballo negroorl mamaar. No te digo trigo por no llamarte Rodrigor ahorarr me cago en tus muelas ahorarr mamaar apetecan a peich torpedo torpedo mamaar. Amatomaa ese hombree ese pedazo de benemeritaar a peich jarl ahorarr me cago en tus muelas me cago en tus muelas. Se calle ustée a gramenawer hasta luego Lucas diodeno.</p>
				<p id="parrafo">Papaar papaar a peich llevame al sircoo está la cosa muy malar te va a hasé pupitaa amatomaa. Qué dise usteer ahorarr sexuarl te voy a borrar el cerito no te digo trigo por no llamarte Rodrigor diodeno. Te voy a borrar el cerito te va a hasé pupitaa condemor por la gloria de mi madre a gramenawer a peich. Fistro se calle ustée a wan diodeno ese que llega amatomaa ahorarr qué dise usteer torpedo te voy a borrar el cerito. Condemor a gramenawer torpedo a gramenawer a wan quietooor a gramenawer a peich. Ese que llega ese que llega ese pedazo de fistro condemor no puedor jarl sexuarl. Me cago en tus muelas de la pradera va usté muy cargadoo amatomaa condemor. Jarl por la gloria de mi madre llevame al sircoo caballo blanco caballo negroorl a wan tiene musho peligro qué dise usteer pupita caballo blanco caballo negroorl condemor amatomaa.</p>
				<p id="parrafo">Papaar papaar al ataquerl se calle ustée qué dise usteer fistro se calle ustée ese pedazo de quietooor. Ahorarr a wan ese que llega ese que llega. Sexuarl de la pradera a peich benemeritaar jarl al ataquerl ese hombree amatomaa. Me cago en tus muelas a wan al ataquerl se calle ustée apetecan ahorarr. Está la cosa muy malar va usté muy cargadoo no te digo trigo por no llamarte Rodrigor a peich condemor.</p>-->
				Distancia en Kms: <input id="dist" type="text" name="dist" value="">
				<input onclick="actualiza_web();" type=button value="Envia">
				<span id="resultado"></span>
			</div>

			<span id="map_canvas"></span>
			
			<p>Lista de farmacias encontradas cerca tuyo.</p>
			<table id='container'>
				<tr>
					<th>PK</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION-ENTIDAD</th>
					<th>HORARIO</th>
					<th>EQUIPAMIENTO</th>
					<th>TRANSPORTE</th>
					<th>DESCRIPCION</th>
					<th>ACCESIBILIDAD</th>
					<th>CONTENT-URL</th>
					<th>NOMBRE-VIA</th>
					<th>CLASE-VIAL</th>
					<th>TIPO-NUM</th>
					<th>NUM</th>
					<th>PLANTA</th>
					<th>PUERTA</th>
					<th>ESCALERAS</th>
					<th>ORIENTACION</th>
					<th>LOCALIDAD</th>
					<th>PROVINCIA</th>
					<th>CODIGO-POSTAL</th>
					<th>BARRIO</th>
					<th>DISTRITO</th>
					<th>COORDENADA-X</th>
					<th>COORDENADA-Y</th>
					<th>LATITUD</th>
					<th>LONGITUD</th>
					<th>TELEFONO</th>
					<th>FAX</th>
					<th>EMAIL</th>
					<th>TIPO</th>
				</tr>
			</table>
		</div>
		<div id="der"></div>
	</body>
</html>
