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



$php_uid = $_POST["u_id"]; 
$php_pwd = $_POST["u_pwd"];

/*

echo "uid=".$php_uid;
echo "pwd=".$php_pwd;


*/
/*$sql = "SELECT * from u_signup ";

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
}*/




$sql = "SELECT u_id,u_pwd from u_signup where u_id= '$php_uid' ";
$result = $conn->query($sql);

if( $result == TRUE )
{
	if ( $result->num_rows  == 1) 
	{
    
   		 $row = $result->fetch_assoc();
    	 if($row["u_pwd"] == $php_pwd)	
   		 {
    	
    	/*echo "YOU are welcome with correct password";
   		echo "<a href='readinterface.php'><h3 style='color:blue'><u>BOOKS STORE</u></h3></a>";
   		*/
   			$_SESSION["userloginflag"]=1;
   			$_SESSION['u_id']=$php_uid;
   			header('Location:../USER/readinterface.php');
    	 }
   		 else
    	 {	
    /* echo "Error:wrong password";
     echo "<a href='userlogin.php'><h3 style='color:blue'>TRY AGAIN</h3></a>";
     */		
     		 $_SESSION["uloginflag"]=5;
    		 $_SESSION["userloginflag"]=2;
    		 header('Location: ../USER/userlogin.php');
   		 }
	} 
	else 
	{
    	/*echo "<h2 style='color:red'>Error:wrong username</h2>";
    	echo "<a href='userlogin.php'><h3 style='color:blue'>TRY AGAIN</h3></a>";
    	*/
    	$_SESSION["userloginflag"]=3;
    	$_SESSION["uloginflag"]=5;
    	header('Location:../USER/userlogin.php');
	}

}

else
{
	echo "Query not successfull". $conn->error."<br/>";
}

$conn->close();

?>
