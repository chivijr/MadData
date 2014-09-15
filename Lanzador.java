package aplicacion;

public class Lanzador {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Descargador desc = new Descargador();
		int estado = 0;
		String url, ruta;
		
		ruta = "C:/Users/Chivijr/workspace/DescargaDatosAbiertos/";
		
		/***************************************************************
		 * INICIO DESCARGA FICHEROS DE FARMACIAS DE GUARDIA
		 ***************************************************************/
		// Descarga CSV Farmacias de guardia
		url = "http://datos.madrid.es/egob/catalogo/207619-0-farmacias-guardia.csv";
		estado += desc.descargar(url,ruta);
		// Descarga GEO Farmacias de guardia
		url = "http://datos.madrid.es/egob/catalogo/207619-0-farmacias-guardia.geo";
		estado += desc.descargar(url,ruta);
		// Descarga RDF Farmacias de guardia
		url = "http://datos.madrid.es/egob/catalogo/207619-0-farmacias-guardia.rdf";
		estado += desc.descargar(url,ruta);
		// Descarga XML Farmacias de guardia
		url = "http://datos.madrid.es/egob/catalogo/207619-0-farmacias-guardia.xml";
		estado += desc.descargar(url,ruta);
		/***************************************************************
		 * FIN DESCARGA FICHEROS DE FARMACIAS
		 ***************************************************************/
		
		/***************************************************************
		 * INICIO DESCARGA FICHEROS DE CENTROS DE SALUD
		 ***************************************************************/
		// Descarga CSV Farmacias
		url = "http://datos.madrid.es/egob/catalogo/201544-0-centros-salud.csv";
		estado += desc.descargar(url,ruta);
		// Descarga GEO Farmacias
		url = "http://datos.madrid.es/egob/catalogo/201544-0-centros-salud.geo";
		estado += desc.descargar(url,ruta);
		// Descarga RDF Farmacias
		url = "http://datos.madrid.es/egob/catalogo/201544-0-centros-salud.rdf";
		estado += desc.descargar(url,ruta);
		// Descarga XML Farmacias
		url = "http://datos.madrid.es/egob/catalogo/201544-0-centros-salud.xml";
		estado += desc.descargar(url,ruta);		
		/***************************************************************
		 * FIN DESCARGA FICHEROS DE CENTROS DE SALUD
		 ***************************************************************/
		
		
		System.out.println("Código de retorno " + estado);
		
		switch(estado) {
		case 0:
			/*Parseador parse = new Parseador();
			//parse.Parsear(ruta+fichero);
			parse.Parsear(fichero);*/
			break;
		case -1:
			System.out.println("Finalizó KOKOKOKO Gallina McFly!!!!");
			break;
		default:
			break;
		}
		
	}

}
