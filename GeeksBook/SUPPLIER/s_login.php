<html>
<head>
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

<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";


$dbname = "DBMS_PROJECT";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 



$php_sid = $_POST["s_id"]; 
$php_spwd = $_POST["s_pwd"];



echo "sid=".$php_sid;
echo "spwd=".$php_spwd;



/*
$sql = "SELECT * from u_signup ";

$result = $conn->query($sql);

if( $result == TRUE )
{

		if ($result->num_rows > 0) {
		    while ($row =  $result->fetch_assoc() ) {
		        print_r($row);
		    }
		}

}

else
{
	echo "result not successfull". $conn->error."<br/>";
}
*/




$sql = "SELECT s_id,s_pwd from s_signup where s_id= '$php_sid' ";
$result = $conn->query($sql);

if( $result == TRUE )
{
	if ( $result->num_rows  == 1) 
	{
    
    $row = $result->fetch_assoc();
    if($row["s_pwd"] == $php_spwd)
    {	
    	echo "YOU are welcome with correct password";
    	$_SESSION['S_ID']=$php_sid;
    	$_SESSION["supplierloginflag"]=1;
    	header('Location:sinterface.php');
    }
    else
    {	
    	$_SESSION["sloginflag"]=10;
    	$_SESSION["supplierloginflag"]=2;
    	header('Location:supplierlogin.php');
   
	}
	}	 
	else 
	{
		$_SESSION["sloginflag"]=10;
		$_SESSION["supplierloginflag"]=3;
		header('Location:supplierlogin.php');
   
    //echo "Error:wrong username";
    //echo "<h3 color='navy'>Login Please!</h3><br>";
	//echo '<a href="supplierlogin.php"><button class="button" style="vertical-align:middle"><span> LOGIN PAGE</span></button> </a>';
	}

}

else
{
	echo "result not successfull". $conn->error."<br/>";
}


$conn->close();


?>
</body>
</html>
