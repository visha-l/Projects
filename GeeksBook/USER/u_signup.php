<?php 

$servername = "localhost";
$username = "root";
$password = "";

//Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 


// Create database	
$sql = "CREATE DATABASE DBMS_PROJECT";

//$sql = "CREATE DATABASE user_signup";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} 


$conn->close();

$dbname = "DBMS_PROJECT";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 



$php_uname=$_POST['u_name'];
$php_uid=$_POST['u_id'];
$php_pwd=$_POST['u_pwd'];
$php_email=$_POST['u_email'];


$sql = "INSERT INTO u_signup (u_name, u_id, u_pwd,u_email)
VALUES  ('$php_uname', '$php_uid', '$php_pwd',  '$php_email') " ;


if ($conn->query($sql) === TRUE)
{  
	session_start();
	$_SESSION["usignedup"]=1;
	$_SESSION["u_id"]=$php_uid;
	header('Location:readinterface.php');
    echo "You are Successfully Registered";
    echo "<a href='userlogin.php'><h3 style='color:red'>Sign In</h3></a>";
    
} 
else 
{
    echo "Errorss: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?> 
