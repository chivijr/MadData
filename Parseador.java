package aplicacion;


import java.io.IOException;
import java.io.InputStream;

import java.lang.ClassLoader;

import java.util.List;
import java.util.ArrayList;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

public class Parseador {

	public void Parsear(String xml) {
		    //Get the DOM Builder Factory
		    DocumentBuilderFactory factory = 
		    DocumentBuilderFactory.newInstance();

		    //Get the DOM Builder
		    DocumentBuilder builder;
		    Document document = null;
			try {
				builder = factory.newDocumentBuilder();
				//Load and Parse the XML document
			    //document contains the complete XML as a Tree.
				InputStream in = ClassLoader.getSystemResourceAsStream(xml);
				
			    document = builder.parse(ClassLoader.getSystemResourceAsStream(xml));
			    in.available();
			} catch (ParserConfigurationException | SAXException | IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		    List<Evento> eveList = new ArrayList<>();

		    //Iterating through the nodes and extracting the data.
		    NodeList nodeList = document.getDocumentElement().getChildNodes();

		    for (int i = 0; i < nodeList.getLength(); i++) {

		      //We have encountered an <Evento> tag.
		      Node node = nodeList.item(i);
		      if (node instanceof Element) {
		        Evento eve = new Evento();
		        eve.IdEvento = node.getAttributes().
		            getNamedItem("id").getNodeValue();

		        NodeList childNodes = node.getChildNodes();
		        for (int j = 0; j < childNodes.getLength(); j++) {
		          Node cNode = childNodes.item(j);

		          //Identifying the child tag of Evento encountered. 
		          if (cNode instanceof Element) {
		            String content = cNode.getLastChild().
		                getTextContent().trim();
		            switch (cNode.getNodeName()) {
		              case "firstName":
		                eve.Titulo = content;
		                break;
		              /*case "lastName":
		                eve.lastName = content;
		                break;
		              case "location":
		                eve.location = content;
		                break;*/
		            }
		          }
		        }
		        eveList.add(eve);
		      }

		    }

		    //Printing the Evento list populated.
		    for (Evento eve : eveList) {
		      System.out.println(eve);
		    }

	}
		

}
