import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import javax.swing.event.*;
import javax.swing.border.*;
import java.util.*;

class UFrame extends JFrame implements ActionListener
{
	JLabel l1,l2,l3,l4;
	JButton b1,b2;
	JPanel p1,p2,p3,p4,p,gap,gap1,borderPanel;
	JTextArea area;
	public UFrame(String str) throws Exception
	{
		setTitle("Search Engine");
		try
		{	
			data d = new data();
    		String st = d.dataString(str);
    		
			p1 = new JPanel();
			p2 = new JPanel();
			//p3 = new JPanel();
			
			URLclass uc = new URLclass();
			boolean flag;
			flag = uc.urlclass(str);
			String s;
			if(flag == true)
			s = str;
			else
			s = "Sorry Enter Any Other URL...";
			//System.out.println(s);
			Font F1=new Font("Lucida Calligraphy",Font.ITALIC,15);
			Font F2=new Font("Lucida Calligraphy",Font.BOLD,20);
			
			//l1=new JLabel("");
			//l1.setBounds(400,50,400,50);
			//l1.setFont(F2);
			//p1.add(l1);	
			
			b1=new JButton("Back");
			//b1.setBounds(50,800,100,50);
			b1.setFont(F1);
			p2.add(b1);
			b1.addActionListener(this);
			
			b2=new JButton("Close");
			//b2.setBounds(850,800,100,50);
			b2.setFont(F1);
			b2.addActionListener(this);
			p3= new JPanel( new GridLayout(0,1,50,100));
			p3.setBorder( BorderFactory.createEmptyBorder(40,500,100,500));
			borderPanel = new JPanel( new BorderLayout(50,40));
       	 	borderPanel.setOpaque(true);
       		borderPanel.setBackground(Color.WHITE);
       		borderPanel.add(b2,BorderLayout.CENTER);
   			p3.add(borderPanel);
   			p3.setBackground(Color.orange);
			add(p3);
			
			b2.addActionListener(new ActionListener()
			{
				public void actionPerformed(ActionEvent a)
				{
				  System.exit(0);
				}
			});
			
			l4=new JLabel(s, JLabel.CENTER);
			l4.setForeground(Color.black);
			//l4.setBounds(350,200,400,100);
			l4.setFont(F1);
			p3.add(l4);
		/*	add(p1,BorderLayout.NORTH);
			p1.setPreferredSize( new Dimension(250,40));
			p1.setBackground(Color.green);
		//	p1.pack();
			p1.setVisible(true);*/
			add(p2,BorderLayout.SOUTH);
			add(p3,BorderLayout.CENTER);
			area= new JTextArea(3,40);
			area.setText(st);
			area.setLineWrap(true);
			area.setEditable(false);
			add(area);
			setVisible(true);
			setLayout(new FlowLayout());
			setSize(900,400);
			setDefaultCloseOperation(EXIT_ON_CLOSE);
			getContentPane().setBackground(Color.orange);
		}
		catch (Exception e)
        {
            System.out.println(e+"uframe");
        }
	}
	public void actionPerformed(ActionEvent ae)
	{
		if(ae.getSource()==b1)
		{
			Frame f =new Frame();
			this.setVisible(false);
			f.setVisible(true);
		}
	}
}
class QFrame extends JFrame implements ActionListener
{
	//JFrame  ff;
	JLabel l1,l2;
	JTextArea area,aa;
	JButton b1,b2;
	JPanel p1,p2,p3,borderPanel,pa1,pa2,pa3,pa4,panel;
	JScrollPane scrollPane; 
	public QFrame(String str) throws Exception
	{
		try
		{
			panel = new JPanel();
			p1 = new JPanel();
			p2 = new JPanel();
			setTitle("Search Engine");
			setLayout(new FlowLayout());
			setVisible(true);
			//setResizable(false);
			setSize(900,700);
			setDefaultCloseOperation(3);
			getContentPane().setBackground(Color.white);
			
			//System.out.println(str);
			//ff = new JFrame();
			String [] splitedString =str.split("\\s+");
			query q = new query();
			Element []e = new Element[50];
			String s[] = new String[50];
			//browser b = new browser();
			e = q.processQuery(splitedString);
			int len = 0;
			for(int i=0;i<q.val;i++){
				if(e[i].priority>5){
					s[i]=e[i].str;
					System.out.println(e[i].str+" "+e[i].priority);
				}
				else{
					len=i;
					break;
				}
			}
			
		/*	System.out.println(len);
			System.out.println("hi");*/
			for(int i=0;i<len;i++)
				System.out.println(s[i]);
			//System.out.println(s.length);
			//super("Search Engine");
			
			Font F1=new Font("sansarif",Font.BOLD,35);
			Font F2=new Font("Lucida Calligraphy",Font.ITALIC,20);
    		
			l1=new JLabel("URL WINDOW");
			l1.setLocation(50,10);
			l1.setSize(86,14);
			l1.setFont(F1);
			l1.setLayout(null);
			//l1.setVisible(true);
			add(l1);	
			
			b1=new JButton("Back");
			b1.setBounds(50,800,100,100);
			b1.setFont(F2);
		//	add(b1);
			b1.addActionListener(this);
			
			b2=new JButton("Close");
			b2.setBounds(750,800,100,100);
			b2.setFont(F2);
			
			b2.addActionListener(this);
			
		/*	l2 = new JLabel(e[0].str, JLabel.CENTER);
			l2.setForeground(Color.black);
			//l4.setBounds(350,200,400,100);
			l2.setFont(F1);
			add(l2);*/
			area=new JTextArea(20,30);
			scrollPane = new JScrollPane(area);
			JScrollBar bar = new JScrollBar();
			scrollPane.add(bar);
			panel.add(scrollPane,BorderLayout.SOUTH);
			
			
    		area.setSize(100,100);    
    		area.setBackground(Color.black);  
    		area.setForeground(Color.yellow); 
    		System.out.println(e[0].str);
    		
    		data d = new data();
    		String st = d.dataString(e[0].str);
    		
    		area.setFont(F2);
    		aa=new JTextArea();
    		aa.setBounds(150,300,70,70);    
    		aa.setBackground(Color.black);  
    		aa.setForeground(Color.orange); 
    		
    		
    		area.setText(st);
    		area.setLineWrap(true);
    		area.setEditable(false);
    		for(int i=0;i<len;i++)
			{
				aa.append(s[i]+"\n");
			}
			aa.setEditable(false);
			aa.setFont(F2);
			pa1= new JPanel( new GridLayout(0,1,50,40));
			pa1.setBorder( BorderFactory.createEmptyBorder(10,100,100,500));
			pa2 = new JPanel( new BorderLayout(300,100));
        	pa1.setOpaque(true);
        	pa1.setBackground(Color.black);
        	pa1.add(aa,BorderLayout.CENTER);
        	
        //	borderPanel.add(b2,BorderLayout.LINE_END);
        
   			pa2.add(pa1);
   			pa2.setBackground(Color.white);
			add(pa2);
			
			//add(area);
    		//add(aa);
    	/*	pa3= new JPanel( new GridLayout(0,1,50,100));
			pa3.setBorder( BorderFactory.createEmptyBorder(10,500,100,500));
			pa4 = new JPanel( new BorderLayout(200,100));
        	pa3.setOpaque(true);
        	pa3.setBackground(Color.WHITE);
        	pa3.add(area,BorderLayout.CENTER);
        //	borderPanel.add(b2,BorderLayout.LINE_END);
   			pa4.add(pa3);
   			pa4.setBackground(Color.white);
			add(pa4);*/
    		
			p3= new JPanel( new GridLayout(0,1,50,100));
			p3.setBorder( BorderFactory.createEmptyBorder(10,500,100,500));
			borderPanel = new JPanel( new BorderLayout(300,70));
        	borderPanel.setOpaque(true);
        	borderPanel.setBackground(Color.WHITE);
        	borderPanel.add(b1,BorderLayout.LINE_START);
        	borderPanel.add(b2,BorderLayout.LINE_END);
   			p3.add(borderPanel);
   			p3.setBackground(Color.white);
   			
   			
			add(p3);
			add(panel);
    		
			b2.addActionListener(new ActionListener()
			{
				public void actionPerformed(ActionEvent a)
				{
			  		System.exit(0);
				}
			});
			/*l2.setText(e[0].str);
			l2.setForeground(Color.black);
			//l2.setBounds(350,200,650,60);
			l2.setFont(F2);
			add(l2);*/
			
			//add(area); 
		}
		catch (Exception e)
        {
            System.out.println(e+"qframe");
        }
	}	
	public void actionPerformed(ActionEvent ae)
	{
		if(ae.getSource()==b1)
		{
			Frame f =new Frame();
			this.setVisible(false);
			f.setVisible(true);
		}
	}
}

public class Frame extends JFrame implements ActionListener,FocusListener
{
	JButton ub,qb,b1;
	JTextField t1,t2;
	JLabel l1,l2,l3;
	JPanel p1,p2,p3,p4,p,gap,gap1,borderPanel;
	public  Frame()
	{
		setTitle("Search Engine");
		
		gap = new JPanel( new GridLayout(0,1,50,100));
		gap.setBorder( BorderFactory.createEmptyBorder(40,500,100,500));
		gap.setBackground(Color.pink);
		gap1 = new JPanel( new GridLayout(0,1,50,100));
		gap1.setBorder( BorderFactory.createEmptyBorder(40,500,100,500));
		gap1.setBackground(Color.pink);
		
	
		p  = new  JPanel();
		p1 = new JPanel();
		p2 = new JPanel();
		p4 = new JPanel();
		
		Font F1=new Font("Lucida Calligraphy",Font.BOLD,50);
		Font F2=new Font("Lucida Calligraphy",Font.BOLD,25);
		Font F3=new Font("Lucida Calligraphy",Font.BOLD,15);
		
		l1 = new JLabel("SEARCH  ENGINE");
		l1.setBounds(400,200,200,50);
		l1.setFont(F1);
		l2 = new JLabel("");
		l3 = new JLabel("");
		p.add(l1);
		add(l2);
		add(l3);
		
		t1= new JTextField(10);
		t2= new JTextField(30);
		//t1.setBounds(300,300,300,50);
		//t2.setBounds(300,500,300,50);
		t1.setFont(F2);
		t1.addFocusListener(this);
		t2.setFont(F2);
		t2.addFocusListener(this);
		p1.add(t1);
		p2.add(t2);
		
		qb = new JButton("query");
		ub = new JButton("url");
		b1 = new JButton("CLOSE");
 		//b1.setBounds(700,300,100,50);
		//b2.setBounds(700,500,100,50);
		//b3.setBounds(700,700,100,50);
		qb.addActionListener(this);
		ub.addActionListener(this);
		b1.addActionListener(this);
		qb.setFont(F3);
		ub.setFont(F3);
		b1.setFont(F3);
		p2.add(ub);
		p1.add(qb);
		
		add(p , BorderLayout.NORTH);
		add(gap1);
		add(p2,BorderLayout.CENTER);
		add(gap);
		
		add(p1,BorderLayout.SOUTH);
		p1.setPreferredSize( new Dimension(380,40));
			p1.setBackground(Color.white);
		//	p1.pack();
			p1.setVisible(true);
			p3= new JPanel( new GridLayout(0,1,50,100));
		p3.setBorder( BorderFactory.createEmptyBorder(40,500,100,500));
		borderPanel = new JPanel( new BorderLayout(50,40));
        borderPanel.setOpaque(true);
        borderPanel.setBackground(Color.WHITE);
        borderPanel.add(b1,BorderLayout.CENTER);
   		p3.add(borderPanel);
   		p3.setBackground(Color.pink);
		add(p3);
		
		b1.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent ae)
			{
				System.exit(0);
			}
		});
		setSize(1024,970);
		setVisible(true);
		//setLayout(null);
		setLayout(new FlowLayout());
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		getContentPane().setBackground(Color.pink);
	}
	public void focusGained(FocusEvent fe)
	{
		if(fe.getSource()==t1)
		t1.setBackground(Color.GRAY);
		else if(fe.getSource()==t2)
		t2.setBackground(Color.GRAY);
	}
	public void focusLost(FocusEvent fe)
	{
		if(fe.getSource()==t1)
		t1.setBackground(Color.WHITE);
		else if(fe.getSource()==t2)
		t2.setBackground(Color.WHITE);
	}
	public void actionPerformed(ActionEvent ae)
	{
		Font F1=new Font("Lucida Calligraphy",Font.BOLD,30);
		if(ae.getSource()==qb)
		{
			l2.setText("Analysis. . . . .");
			//l3.setBounds(400,300,200,50);
			l2.setFont(F1);
		try
			{
				Thread.sleep(1000);
			}
			catch(InterruptedException ex)
			{
				Thread.currentThread().interrupt();
			}
			try
			{
				//l2.setText("");
				String s = t1.getText();
				//System.out.println(s+"it's");
				if(s==null)
				{
				}
				else
				{
				QFrame  f = new QFrame(s);
				this.setVisible(false);
				f.setVisible(true);
				}
			}
			catch (Exception a) {System.out.println(a);}
		}
		if(ae.getSource()==ub)
		{
			l2.setText("Analysing. . . . .");
			//l2.setBounds(400,300,200,50);
			l2.setFont(F1);
			try
			{
				Thread.sleep(1000);
			}
			catch(InterruptedException ex)
			{
				Thread.currentThread().interrupt();
			}
			
			try
			{
				l2.setText("");
				String s = t2.getText();
				UFrame  f = new UFrame(s);
				this.setVisible(false);
				f.setVisible(true);
			}
			catch (Exception a) {System.out.println(a+"mainframe");}	
		}
	}
	public static void main(String []args)
	{
		Frame f = new Frame();
		
	}
}
