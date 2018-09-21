<?php

$servername = "localhost";
$username = "root";
$password = "";


$dbname = "DBMS_PROJECT";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$sql="CREATE TABLE PRICE (
SUPPLEIRID INT(6) NOT NULL,	
BOOKID INT PRIMARY KEY NOT NULL,
COST  INT(4) NOT NULL
)"; 
 $res = $conn->query($sql);
 
 if($res)
 {
 	echo "price is created<br>";
 	
 	//$sql="create table ";
 }
 
 else
 {
 	echo "price is not created<br>";
 }
/*
$sql="CREATE TABLE book_read (
BOOKID INT  NOT NULL,
USERID  INT(6) NOT NULL
)";

$res= $conn->query($sql);

if($res)
{
	echo "booksupplied is created<br>";
	
}
else
{
	echo "booksupplied is not created" .$conn->error();
}
*/

?>
