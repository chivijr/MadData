package aplicacion;

import java.io.FileOutputStream;
import java.io.IOException;
import java.net.URL;
import java.nio.channels.Channels;
import java.nio.channels.ReadableByteChannel;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;

public class Descargador {
	
	public int descargar(String url, String ruta) {
		try {
			
			String extension, fichero, fecha;
			
			DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
			Calendar cal = Calendar.getInstance();
			// reemplazamos en la fecha los espacios por "_"
			fecha = dateFormat.format(cal.getTime()).replace(" ", "_");
			// reemplazamos en la fecha los ":" por "_"
			fecha = fecha.replace(":", "_");
			// reemplazamos en la fecha los "/" por "-"
			fecha = fecha.replace("/", "-");			
			extension = url.substring(url.lastIndexOf(".")); 		
			fichero = url.substring(url.lastIndexOf("/")+1,url.lastIndexOf("."))+"-"+fecha+extension;
			
			URL urlsite = new URL(url);
			ReadableByteChannel rbc = Channels.newChannel(urlsite.openStream());
			FileOutputStream fos = new FileOutputStream(ruta+fichero);
			fos.getChannel().transferFrom(rbc, 0, Long.MAX_VALUE);
			fos.close();
			return 0;
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return -1;
		}	
	}

}
