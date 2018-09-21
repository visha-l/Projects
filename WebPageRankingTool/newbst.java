import java.io.*;
import java.awt.*;  
import java.net.*;
import java.util.*; 

public class newbst{
   	public static node root;
   	public newbst(){
   		this.root=null;
   	}
   	
    public static boolean find(String str){
		node current=root;
		while(current!=null){
			if(str.compareToIgnoreCase(current.data)<0)
				current=current.left;
			else if(str.compareToIgnoreCase(current.data)>0)
				current=current.right;
			else
				return true;
		}
		return false;	
	}
	
	
	public void display(node root){
		if(root!=null){
			display(root.left);
			System.out.println(root.data);
			display(root.right);
		}
   	 }
    public void Display(){
   		display(root);
   	}	
   		
    public static void insert(String str){
	
		node newnode=new node(str);
		if(root==null)
		{
			root=newnode;
			return;			
		}
		node current=root;
		node parent=null;
		while(true){
			parent=current;
			if(str.compareToIgnoreCase(current.data)>0){
				current=current.right;
				if(current==null){
					parent.right=newnode;
					return ;
				}
			}
			else{
				current=current.left;
				if(current==null){
					parent.left=newnode;
					return ;
				}
			}
		}
	}
 }	/*	
class node{
	String data;
	int frequency;
	node left;
	node right;
	public node(String data){
		this.data=data;
		frequency=1;
		left=null;
		right=null;
		}
}*/
