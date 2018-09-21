<html>
<head>
 <?php  include '../common/meta.html';?>
<link rel="stylesheet" href="../list-template/assets/css/article-lists/article-list-vertical.css">

<style>

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
<div style="background-color:black;"><h2 style="color:white;margin-left:200px;">Remove Books</h2></div>
	
<?php
	session_start();
	
	if(isset($_SESSION["S_ID"]) && !empty($_SESSION['S_ID']))	
	{
		$flag=true;
	}
	else
	{
		$flag=false;
	}
	
if($flag == true)
{
	$servername = "localhost";
	$username = "root";
	$password = ""; 
	$dbname = "DBMS_PROJECT";
	
	$conn = new mysqli($servername, $username, $password,$dbname);

	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	}

	$php_sid=$_SESSION['S_ID'];
		

//S		echo "php sid".$php_sid."<br/>";
    
   
 
	$sql = "SELECT *  from BOOK natural join BOOKSUPPLIED where s_id= '$php_sid'  ";
		
	$res = $conn->query($sql);

	if( $res == TRUE )
	{

			if ( $res->num_rows  >= 1) 
			{
		    $row = $res->fetch_assoc();
			

					while(($row))
					{
						//$i = 0; //no of col

						echo '
							<ul class="article-list-vertical">
							<li>
					

								<div style="padding-right:0px;">
									<span style="color:purple;font-size:30px;">'.$row["BOOKTITLE"].'</span>

									<p style="font-size:20px;font-family:cursive">this is the just a small preveiw of book</p>
									
									<span>
									<form action="final_remove.php" method="POST">
									<input type="hidden" name="bookid" value='.$row['BOOKID'].'>
									<input type="submit" value="remove">
									</form>
									</span>
								</div>

							</li>
							</ul>		
								';
						 $row = $res->fetch_assoc();		
					}
			} 
			else
			{
				echo "<hr><marquee><h3 style='color:red;'>No Book Found!</h3></marquee><hr>";
			}	

		}
		else
		{
			echo "query not run".$conn->error;
		}
	echo '
	 <a href="../SUPPLIER/sinterface.php"><button class="button btnlogin" style="margin-left:20%;float:left;margin-top:10%;"><span>Go Back </span></button> </a>';
			
	echo '
	 <a href="../common/logout.php"><button class="button btnlogin" style="vertical-align:middlemargin-left:50%;"><span>LOGOUT </span></button> </a>';
		
}
else
{	
	
	echo '
		<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="../SUPPLIER/supplierlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
}
	echo'<section style="margin-left:180px;margin-top:10%;">';	
	include '../common/footer.php';	
	echo '</section>';

	?>

</body>
</html>


