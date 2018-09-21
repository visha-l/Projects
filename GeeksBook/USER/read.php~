<html>
<head>

<?php include '../common/meta.html';?>
<link rel="stylesheet" href="../list-template/assets/css/article-lists/article-list-vertical.css">

<style>
.alg{
	width:600px;
	text-align:right;
	margin:auto;
	margin-top:10px;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
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
<?php include '../common/sidebar.php'; ?>
<?php 

	session_start();
	
		if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']) )
		{
			$flag=1;
		}
		else
		{
			$flag=0;
		}
			
	if($flag==1)
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DBMS_PROJECT";
	$conn = new mysqli($servername, $username, $password,$dbname);

	if ($conn->connect_error) {
		echo "connection failed";
	   die("Connection failed: " . $conn->connect_error);
	} 
	//echo "connected successfully";	

	/*
	$sql = "delete  from BOOK where BOOKID=12345";
	$res = $conn->query($sql);
	if(!$res)
	{

	echo "query of book delete not working".$conn->error ;
	}

	*/
echo "	<div style='padding-right:0px; margin-left:900px;width:200px;'>

		<form action='../USER/read.php' method='POST'>
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


echo $php_pmin;
echo '<br>';
echo $php_pmax;


	$sql = "select * from BOOK natural join PRICE where CATEGORY like '". $php_categ."' and  AUTHOR like '". $php_author."'and  BOOKTITLE like '".$php_title."'and  PUBLICATION like'".$php_pub."'and price between $php_pmin and $php_pmax ";
	$res = $conn->query($sql);
	

	//echo "<section class='alg'><table>";
$row = $res->fetch_assoc();


	while($row)
	{
		$php_bid=$row["BOOKID"];
		/*$sql1 = "select price from PRICE where BOOKID='$php_bid'";
		
		$res1 = $conn->query($sql1);
		$row1= $res1->fetch_assoc();*/
				echo '
							<ul class="article-list-vertical" style="width:400px;">
							<li>
								<div style="background-color:black;height:250px;width:auto;float:left;"></div>
								<div style="background-color:blue;float:right;">
									<sapn style="color:white;font-size:30px;">'.$row["BOOKTITLE"].'</span><br>
									<span style="color:white;font-size:20px;">Category : '.$row["CATEGORY"].'</span><br>
									<span style="color:white;font-size:20px;">Publication : '.$row["PUBLICATION"].'</span><br>
									<span style="color:white;font-size:20px;">Author : '.$row["AUTHOR"].'</span><br></div>';
									
									if($row["READABLE"]==1)
									{
									
									echo "<button class='button ' style='vertical-align:middle;font-size:15px;margin-top:30px;' onclick = 'f(" .'"'. $target_dir = "uploads/".$row["Booklink"] . '"'. ")'><span>Read</span></button>";
				
									}
									else
									{
										echo "<div style='margin-top:15px;font-size:15px;color:purple;'>No Preview Avaiable</div>";
									}
				echo '

							</li>
							</ul>		
								';
			$row = $res->fetch_assoc();
		
	
	}
	//echo "</table></section>";
	echo '
	 <a href="../USER/readinterface.php"><button class="button btnlogin" style="margin-left:20%;float:left;margin-top:10%;"><span>Go Back </span></button> </a>';
	
	echo '
	 <a href="../common/logout.php"><button class="button btnlogin" style="vertical-align:middle"><span>LOGOUT </span></button> </a>';
	echo '<section class="foot1">';	
	include "../common/footer.php";
	echo '</section>';
	
	}		
	else
	{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  
		 <a href="../USER/userlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
	 
	echo'<section style="margin-left:180px;margin-top:320px;">';	
//	include  '../common/footer.php';
	include('../common/footer.php');
	echo '</section>';	
	
	}

 ?>
 
<script>
	function f(a)
	{
		//alert("im fine");
		//window.prompt("input");
		window.location=a;
	}
</script>

</body>
</html>
