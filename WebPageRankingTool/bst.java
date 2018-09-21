import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*; 

public class bst
{
   	public static node root;
   	public bst()
   	{
   		this.root=null;
   	}
	public static int count(node root,String str)
	{
		node current=root;
		while(current!=null)
		{
			if(str.compareToIgnoreCase(current.data)<0)
				current=current.left;
			else if(str.compareToIgnoreCase(current.data)>0)
				current=current.right;
			else
				return current.frequency;
		}
		return 0;	
	}	
	
    public static boolean find(String str)
    {
		node current=root;
		while(current!=null)
		{
			if(str.compareToIgnoreCase(current.data)<0)
				current=current.left;
			else if(str.compareToIgnoreCase(current.data)>0)
				current=current.right;
			else
			{
				current.frequency+=1;
				return true;
			}
		}
		return false;	
	}			
  	/*  public void incfreq(String str){
	node current=root;
	while(current!=null){
		if(str.compareToIgnoreCase(current.data)<0)
			current=current.left;
		else if(str.compareToIgnoreCase(current.data)>0)
			current=current.right;
		else{
			current.frequency+=1;
			return ;
			}
		}
	}*/
				
    public static void insert(String str)
    {
		boolean t=find(str);
		if(t!=true)
		{
			node newnode=new node(str);
			if(root==null)
			{
				root=newnode;
				return;			
			}
			node current=root;
			node parent=null;
			while(true)
			{
				parent=current;
				if(str.compareToIgnoreCase(current.data)>0)
				{
					current=current.right;
					if(current==null)
					{
						parent.right=newnode;
						return ;
					}
				}
				else
				{
					current=current.left;
					if(current==null)
					{
						parent.left=newnode;
						return ;
					}
				}
			}
		}
	}
					
    public static void display(node root)
    {
		if(root!=null)
		{
			display(root.left);
			System.out.println(root.data+" =  "+root.frequency);
			display(root.right);
		}
    }
    public void Display()
    {
   		display(root);
   }
   public static node returnRoot()
    {
   		return root;
    } 
  /*  public static void main(String arg[]){
		bst b = new bst();
		b.insert("abc");b.insert("bca");
		b.insert("cba");b.insert("bba");b.insert("cac");b.insert("cba");b.insert("bbb");b.insert("aaa");
		
		System.out.println("Original Tree : ");
		b.display(b.root);		
		System.out.println("");
		System.out.println("Check whether Node with value 4 exists : " + b.find("aaa"));
		}*/
 } 					

