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
	
		if(isset($_SESSION["S_ID"]) && !empty($_SESSION["S_ID"]) )
		{
			$flag=1;
			$php_sid=$_SESSION["S_ID"];
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

	if ($conn->connect_error) 
	{
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

	/*$sql = "UPDATE   BOOK set BOOKLINK='mano.pdf' where BOOKID=45678 ";
	$res = $conn->query($sql);
	if(!$res)
	{
	echo "query of book ALTER TABLE not working".$conn->error ;
	}

	$sql = "UPDATE  BOOK set BOOKLINK='ca.pdf' where BOOKID=45679 ";
	$res = $conn->query($sql);
	if(!$res)
	{
	echo "query of book delete not working".$conn->error ;
	}

	$sql = "UPDATE  BOOK set BOOKLINK='korth.pdf' where BOOKID=45689 ";
	$res = $conn->query($sql);
	if(!$res)
	{
	echo "query of book delete not working".$conn->error ;
	}

*/




	$sql = "select * from BOOK natural join BOOKSUPPLIED where s_id='$php_sid'";
	$res = $conn->query($sql);
	
	if(!$res)
	{
	echo "query of book select not working".$conn->error ;
	}



	//echo "<section class='alg'><table>";
$row = $res->fetch_assoc();


	while($row)
	{

		
			//<a href="#" ><img src=""width=50%;height:50%;/></a>
			echo '
			<ul class="article-list-vertical" >
		    <li>
		    	

		        <div style="padding-right:0px;">
		            <span style="color:purple;font-size:30px;">'.$row["BOOKTITLE"].'</span>
					<span style="color:purple;font-size:30px;">Category:'.$row["CATEGORY"].'</span>
					<span style="color:purple;font-size:30px;">'.$row["PUBLICATION"].'</span>
				
		            <p style="font-size:20px;font-family:cursive">this is the just a small preveiw of book</p>
		        </div>';
									if($row["READABLE"]==1)
									{
									
									echo "<button class='button ' style='vertical-align:middle;font-size:15px;margin-top:30px;' onclick = 'f(" .'"'. $target_dir = "uploads/".$row["Booklink"] . '"'. ")'><span>Read</span></button>";
				
									}
									else
									{
										echo "<div style='margin-top:15px;font-size:15px;color:purple;'>No Preview Avaiable</div>";
									}

		    echo'</li>
			</ul>		
				';
			
				

			$row = $res->fetch_assoc();

		

	}
	//echo "</table></section>";
	echo '
	 <a href="../SUPPLIER/sinterface.php"><button class="button btnlogin" style="margin-left:20%;float:left;margin-top:10%;;"><span>Go Back </span></button> </a>';
		
	echo '
	 <a href="../common/logout.php"><button class="button btnlogin" style="vertical-align:middle;"><span>LOGOUT </span></button> </a>';
	echo '<section class="foot1" style="margin-left:180px;margin-bottom:0px;">';	
	include "../common/footer.php";
	echo '</section>';
	
	}		
	else
	{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="../SUPPLIER/supplierlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
	 
	echo'<section style="margin-left:180px;margin-top:390px;">';	
	include '../common/footer.php';	
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
