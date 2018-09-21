import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*;
/*class Element
{
	String str;
	int priority;
	public Element(String str,int priority)
	{
		this.str=str;
		this.priority=priority;
	}
}*/

class PriorityQueue
{
	public int heapSize=0;
	public Element[] heap = new Element[50]; 
	void insert(String str,int p)
	{
		Element e = new Element(str,p);
		heap[++heapSize] = e;
		int pos=heapSize;
		while(pos!=1 && e.priority>heap[pos/2].priority)
		{
			heap[pos]=heap[pos/2];
			pos/=2;
		}
		heap[pos] = e;
	}
	public Element remove()
	{
		Element temp,item;
		int parent,child;
		parent=1;
		child=2;
		item = heap[1];
		temp = heap[heapSize--];
		while(child<=heapSize)
		{
			if(child<heapSize && heap[child].priority<heap[child+1].priority)
			child++;
			if(heap[child].priority<=temp.priority)
			break;
			heap[parent]=heap[child];
			parent=child;
			child*=2;
		}
		heap[parent]=temp;
		return item;
		//System.out.println(item.str);
		//System.out.println(item.priority);
	}
}
