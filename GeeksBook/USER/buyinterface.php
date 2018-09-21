<html>
<head>

<?php include('../common/meta.html');?>
<link rel="stylesheet" href="../list-template/assets/css/article-lists/article-list-vertical.css">
<link rel="stylesheet" href="../USER/cart.css">

<style>
.background {
    background:url('mg/bg/diagonalnoise.png');
    position: relative;
}

.layer {
    background-color: rgba(248, 247, 216, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.alg{
	width:600px;
	text-align:right;
	margin:auto;
	margin-top:10px;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: blue;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 25px;
  padding: 0px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 0px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.foot1{
	margin-left : 180px;
	margin-top:100px;
	
	}
.footer-distributed {
	background-color:navy;
}
.img-circle {
	border-radius : 50%
}

.btnlogin{
margin-left:80%;
}
.blank {
	padding-top:100px;
	padding-left:180px;
	background-color:white;
}

</style>

</head>
<body>
<?php include('../common/sidebar.php');?>
<?php //include '../common/sidebar.php'; ?>

<?php

session_start();


	if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
	{
		$flag=true;
	}
	else
	{
		echo "not logged in ";

		$flag=false;
	}




if($flag==true)
{
	$php_uid=$_SESSION['u_id'];
	
	$servername = "localhost";
	$username  = "root";
	$password = "";
	$dbname = "DBMS_PROJECT";

	$conn = new mysqli($servername, $username, $password, $dbname);




		if($conn->connect_error)
		{
			die("Connection failed: ".$conn->connect_error);
		}
 
 	echo "<div style='padding-left:80%;background-color:navy;'><a href='../USER/view_cart.php'> <button class='button' style='vertical-align:middle'><span>View Cart</span>   </button> </a></div>";



echo "	<div style='padding-right:0px; margin-left:900px;width:200px;'>

		<form action='../USER/buyinterface.php' method='POST'>
			<fieldset>
				<legend> FILTERS </legend>
				
				CATEGORY:<br>
				<input type='text' name='category' > <br>
				
				AUTHOR:<br>
				<input type='text' name='author' > <br>
				
				TITLE:<br>
				<input type='text' name='title' > <br>
				
				PUBLICATION:<br>
				<input type='text' name='publication' > <br>
				PRICE RANGE:<br>
				<pre><input type='number' name='pricemin' min='0' max='100000'><input type='number' name='pricemax' min='0' max='100000'></pre>
				
				<input type='submit' value='APPLY'>
			</fieldset>	
		</form>

	</div>	";



	$php_categ='%';
	$php_author='%';
	$php_title='%';
	$php_pub='%';
	$php_pmin=0;
	$php_pmax=100000;
	
	if(isset($_POST['category'])  &&  !empty($_POST['category']) )
	{

	$php_categ=$_POST['category'];
//	echo 'inside'.var_dump($res).'<br>';
	}

	if(isset($_POST['author'])  &&  !empty($_POST['author']) )
	{

	$php_author=$_POST['author'];
	}
	

	if(isset($_POST['title'])  &&  !empty($_POST['title']) )
	{
	$php_title=$_POST['title'];
	}


	if(isset($_POST['publication'])  &&  !empty($_POST['publication']) )
	{
	$php_pub=$_POST['publication'];
	}
	
	if(isset($_POST['pricemin'])  &&  !empty($_POST['pricemin']) )
	{
	$php_pmin=((int)($_POST['pricemin']));
	}
	if(isset($_POST['pricemax'])  &&  !empty($_POST['pricemax']) )
	{
	$php_pmax=((int)($_POST['pricemax']));
	}


 						
 						
//		$sql = "SELECT *  from BOOK";
$sql = "select * from BOOK natural join PRICE where CATEGORY like '". $php_categ."' and  AUTHOR like '". $php_author."'and  BOOKTITLE like '".$php_title."'and  PUBLICATION like'".$php_pub."'and price between $php_pmin and $php_pmax ";				
			$res = $conn->query($sql);

			if( $res == TRUE )
			{
					if ( $res->num_rows  >= 1) 
					{

				    $row = $res->fetch_assoc();
				
						while(($row))
						{
								$bi=$row["BOOKID"];
								$sql = "select price from PRICE where BOOKID='$bi'";
								$res1 = $conn->query($sql);

								if( $res1 == TRUE )
								{	
									$row1=$res1->fetch_assoc();
								}
								
								if($row["QUANTITY"]<=0)
								{
									echo '
									<ul class="article-list-vertical">
									<li>
										<img src="../jpgfiles/out.jpg"width=30%;height:30%;/>
										<div>
											<span style="color:purple;font-size:30px;">'.$row["BOOKTITLE"].'</span><br>
											<span style="color:purple;font-size:30px;">Author : '.$row["AUTHOR"].'</span><br>
											<span style="color:purple;font-size:30px;">Publication : '.$row["PUBLICATION"].'</span><br>
											<span style="color:purple;font-size:30px;">Category : '.$row["CATEGORY"].'</span><br>
											<span style="color:purple;font-size:30px;">Price : '.$row1["price"].'</span><br>
										</div>

									</li>
									</ul>		
										';
										
								}
								else
								{
								echo '
							<ul class="article-list-vertical">
							<li style="height:180px;">
								<div style="float:left;padding:0px;width:200px;"><img src="../jpgfiles/buy2.png"width=30% height=40%/></div>
								
								<div style="background-color:blue;float:right;width:350px;height:180px;">
									<sapn style="color:white;font-size:30px;">'.$row["BOOKTITLE"].'</span><br>
									<span style="color:white;font-size:20px;">Category : '.$row["CATEGORY"].'</span><br>
									<span style="color:white;font-size:20px;">Publication : '.$row["PUBLICATION"].'</span><br>
									<span style="color:white;font-size:20px;">Author : '.$row["AUTHOR"].'</span><br>
									<span style="color:white;font-size:20px;">Price : '.$row1["price"].'</span><br>	
							  </div>
							 	<div class="clearfix"></div>
		
							  <div style="padding:0px;">
										<form action="../USER/click.php" method="POST">
										<input type="hidden" name ="book" value="'.$row['BOOKID'].'"></input>
										<input type="number" name ="quantity" min="1" max="'.$row["QUANTITY"].'" style="height:30px;width:100px;margin-top:0px;" ></input>
										
										<a href="../USER/userlogin.php"> <button class="button" style="vertical-align:middle;  font-size: 15px; width:80px;max-width:100px;"><span>add to cart</span></button></a>
										</form>
								</div>
							</li>
							</ul>		
								';
							
						
			
			
								if(isset($_SESSION['bna']) )
									{
									$php_var=$_SESSION["bna"];
									if($php_var==1)
									{
										echo "<script type='text/javascript'>alert('This book is not avaible any more')</script>";
										unset($_SESSION["bna"]);
									}
								}
								
								}
								$row = $res->fetch_assoc();
							
						}
						
						
					}
					
					else
					{
						echo "no books";
					}
			}
			else
			{
				echo "error".$conn->error;
			}
echo '
	 <a href="../USER/readinterface.php"><button class="button btnlogin" style="margin-left:20%;float:left;margin-top:1%;color:white;background-color:black;"><span>Go Back </span></button> </a>';
$conn->close();
}
else
{
	echo "<a href='../USER/userlogin.php'> <button class='button' style='vertical-align:middle'><span>LOGIN</span></button> </a>";
}

?>
<section class="foot1">
<?php include '../common/footer.php' ;?>
</section>
</body>
</html>
