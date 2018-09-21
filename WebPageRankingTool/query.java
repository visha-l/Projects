import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*; 
public class query
{	
	static int val;
	/*
	public static void main(String []args) throws Exception
	{
		try
		{
			String []str={"java","is","science"};
			query q = new query();
			q.processQuery(str);
		}
		catch(Exception e)
		{
			System.out.println("Soo sorry");
		}
	}
	*/
	public Element[] processQuery(String []qstr) throws Exception
	{
		//String []str = new String[2];
		Element[] element = new Element[50]; 
		Element[] el = new Element[50]; 
		Element[] et = new Element[5];
		et[0] = new Element("",0);
		
		try
		{
			browser b = new browser();
			val = b.Count;
			int [] sum= new int[50];
			for(int i=0;i<50;i++)
				sum[i] = 0;
			PriorityQueue pq = new PriorityQueue();
			for(int i=0;i<b.Count;i++)
			{
				for(int j=0;j<qstr.length;j++)
				{
					if(b.ignoreTree.find(qstr[j])==false)
					{
						bst bt = new bst();
						String s = b.obj.stripAffixes(qstr[j]);
						sum[i] = sum[i] + bt.count(b.urlList[i].root,s);
					}
				}
				//System.out.println(sum[i]);	
				pq.insert(b.urlList[i].str,sum[i]);
			}
			/*
			int max=-1,pos=0;
			for(int i=0;i<b.Count;i++)
			{
				//sSystem.out.println(sum[i]);	
				if(max<sum[i])
				{
					max=sum[i];
					pos=i;
				}
			}
			System.out.println(b.urlList[pos].str);*/
			/*
			for(int i=0;i<2;i++){
				str[i]=pq.remove();
			}
			return str;*/
			//Element element,element1;
			System.out.println(b.Count);
			for(int i=0;i<b.Count;i++)
			element[i] = pq.remove();
			/*for(int i=0;i<b.Count;i++)
			{
				if(element[i].priority>5)
				{
					el[i] = element[i];
				}
				else
				break;
			}*/
			/*element[0] = pq.remove();
			element[1] = pq.remove();
			element[2] = pq.remove();*/
			return element;
			/*element1 = pq.remove();
			System.out.println(element.str);
			System.out.println(element.priority);
			System.out.println(element1.str);
			System.out.println(element1.priority);*/
			//pq.remove();
		}
		catch(Exception e)
		{
			System.out.println(e+" query_class");
		}
		return et;
		//return str;
	}
	
}
