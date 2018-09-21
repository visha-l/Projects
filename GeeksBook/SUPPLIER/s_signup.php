<?php 

$servername = "localhost";
$username = "root";
$password = "";


$dbname = "DBMS_PROJECT";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$php_id=$_POST['s_id'];
$php_uname=$_POST['s_name'];
$php_pwd=$_POST['s_pwd'];
$php_email=$_POST['s_email'];
$php_no=$_POST['contact'];



$sql = "INSERT INTO s_signup (s_id, s_name, s_pwd, s_email, contact)
VALUES  ('$php_id', '$php_uname', '$php_pwd', '$php_email', '$php_no') " ;



if ($conn->query($sql) == TRUE) {
	session_start();
	$_SESSION["ssignedup"]=1;
	$_SESSION["S_ID"] =$php_id;
  header('Location:sinterface.php');
  
} 
else
{
    echo "Errorss: supplier -signup" . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?>
