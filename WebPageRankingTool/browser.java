import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*; 
import org.jsoup.*;
import org.jsoup.helper.*;
import org.jsoup.nodes.*;
import org.jsoup.select.*;

class URLContent
{
	String str;
	node root;
	public void URLContent(String str,node root)
	{
		this.str=str;
		this.root=root;
	}
}
public class browser 
{
	newbst ignoreTree = new newbst();
	porter obj = new porter();
	static int Count = 0;
	URLContent [] urlList = new URLContent[50];
	String []URLstring = new String[50];
	//bst b = new bst();
	public browser() throws Exception
	{
		try
		{
			Count = 0;
			for(int i=0;i<50;i++)
			{
				urlList[i] = new URLContent();
			}
			File ignore = new File("ignore.txt");
			File urls = new File("url.txt");
			
			Scanner s1 = new Scanner(ignore);
			Scanner s2 = new Scanner(urls);
		
			bst b = new bst();
			
			while(s1.hasNext())
			{
				String s = s1.next().trim();
				ignoreTree.insert(s);
			}
			//ignoreTree.Display();
			while(s2.hasNext())
			{
				String str = s2.next();
				URLstring[Count] = str;
				System.out.println(str);
				bst bt = new bst();
				URLConnection ucon = new URLConnection();		
				String []ustr = new String [5000];
				ustr=ucon.urlString(str);
				//System.out.println(ustr.length+"hi");
				for(int i=0;i<ustr.length;i++)
				{
					//System.out.println(ustr[i]);
					if(ignoreTree.find(ustr[i])==false)
					{
						String s = ustr[i].toLowerCase();
						s = obj.stripAffixes(s);
						s = s.trim();
						bt.insert(s);
					}
				}
				urlList[Count].URLContent(str,bt.returnRoot());
				Count++;
			}
			/*
			for(int i=0;i<Count;i++)
			{
				System.out.println(urlList[i].str);
			}*/
			/*for(int i=0;i<Count;i++)
			{	
				b.display(urlList[i].root);
				System.out.println("*********************************");
			}*/
		}
		catch (Exception e)
        {
            System.out.println(e+"browser");
        }	
	}
	/*
	public void query(String []str)
	{
		bst br = new bst();
		int [] sum= new int[50];	
		for(int i=0;i<Count;i++)
		{
			for(int j=0;j<str.length;j++)
			{
				
				if(ignoreTree.find(str[j])==false)
				{
					String s = obj.stripAffixes(str[j]);
					sum[i] = br.count(urlList[i].root,s);
				}
			}
		}
		int max=-1,pos=0;
		for(int i=0;i<Count;i++)
		{
			if(max<sum[i])
			{
				max=sum[i];
				pos=i;
			}
		}
		System.out.println(urlList[pos].str);
	}
	
	public static void main(String []args)
	{
		try
		{
			browser b = new browser();
			String str[] = {"is","this","computer", "science"};
			b.query(str);
		}
		catch (Exception e)
		{
			System.out.println(e);
        }	
	}
	*/
}
				
					
					
					
					
					
