import java.io.*;
import java.awt.*; 
import java.net.*;
import java.util.*;
import java.net.HttpURLConnection;
import java.net.URL; 
import org.jsoup.Jsoup;

public class URLConnection {	
	String text;
	String[] splitstr=new String[5000];
	StringBuilder  sbuild = new StringBuilder();
	URL url=null;
	HttpURLConnection urlcon=null;
	InputStream stream=null;
	BufferedReader buffread=null;
	public String[] urlString(String str){
		try{	
			url=new URL(str);
			//System.out.println(str+"ki");
			urlcon=(HttpURLConnection)url.openConnection();
			stream=urlcon.getInputStream();
			buffread = new BufferedReader(new InputStreamReader(stream));
			String line;
			
			while((line=buffread.readLine())!=null){
				sbuild.append(line);
			}
			String text = Jsoup.parse(sbuild.toString()).text();
			//System.out.println(text);
			String result = text.replaceAll("[-)(}?{';`|>@#!&<*/.^:,]","");
			//System.out.println(result);
			splitstr=result.split("\\s+");
			return splitstr;
		}
		catch(Exception e){System.out.println(e);}
		
		return splitstr;
	}
}		
