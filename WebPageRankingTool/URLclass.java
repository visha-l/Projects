import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*;
class URLclass
{
	boolean urlclass(String s) throws Exception
	{
		try 
		{	
			browser b = new browser();
			for(int i=0;i<b.Count;i++)
			{
				if((s.compareToIgnoreCase(b.URLstring[i]))==0)
				{
					//System.out.println(s);	
					return true;
				}
			}
		}
		catch (Exception e)
        {
            System.out.println(e);
        }
       // System.out.println("False");		
		return false;
	}
	/*public static void main(String []args) throws Exception
	{
		try 
		{
			URLclass u = new URLclass();
			String s="http://www.sciencemag.org/";
			boolean b = u.urlclass(s);
			System.out.println(b);
		}
		catch (Exception e)
       	{
            System.out.println(e);
        }	
	}*/
}


