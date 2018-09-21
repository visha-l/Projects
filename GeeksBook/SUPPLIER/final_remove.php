<?php
	session_start();
	
	if(isset($_SESSION['S_ID']) && !empty($_SESSION['S_ID'])) {
		$flag=true;
	}
	else
	{
		echo "not logged in ";

		$flag=false;
	}
?>

<html>
<head>
	<title></title>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
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
</style>




</head>
<body>
final remove




<?php

if($flag==true)
{
$php_bookid=$_POST['bookid'];


$servername = "localhost";
$username = "root";
$password = "";


$dbname = "DBMS_PROJECT";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 


$sql = "DELETE  from BOOK where BOOKID = '$php_bookid'";
$res = $conn->query($sql);

if( $res == TRUE )
{


$sql = "SELECT * from BOOK  ";
$res = $conn->query($sql);

if( $res == TRUE )
{

while($row = $res->fetch_assoc())
{
	echo "booktitle".$row['BOOKTITLE'];
}
	
	$sql = "DELETE  from BOOKSUPPLIED where BOOKID = '$php_bookid'";
	$res = $conn->query($sql);
	if($res == false)
	{
			echo 'delete booksupplied query not executed properly'.$conn->error;

	}
	$sql = "DELETE  from PRICE where BOOKID = '$php_bookid'";
	$res = $conn->query($sql);
	if($res == false)
	{
			echo 'delete booksupplied query not executed properly'.$conn->error;
	}
	else
	{
		header('Location:s_remove.php');
	}
}

else
{
	echo 'select query not executed properly'.$conn->error;	
}


}
else
{
	echo 'delete query not executed properly'.$conn->error;
}

}

else
{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="supplierlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
}
?>
</body>
</html>
