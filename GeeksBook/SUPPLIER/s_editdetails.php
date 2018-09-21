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


if(isset($_SESSION['S_ID']) && !empty($_SESSION['S_ID'])) {
		$flag=true;
	}
	else
	{
		//echo "not logged in ";

		$flag=false;
	}



if($flag==true)
{

/*$query_file = 'sql_squery.txt';
   
   $fp = fopen($query_file, 'r');
   $sql = fread($fp, filesize($query_file));
   fclose($fp); 
*/

/*if ($conn->query($sql) === TRUE) {
    echo "Tables  created successfully";
} else {
    echo "Error creating tablesa: " . $conn->error;
}*/


$php_sname=$_POST['s_name'];
$php_pwd=$_POST['s_pwd'];
$php_email=$_POST['s_email'];
$php_no=$_POST['contact'];

$php_id=$_SESSION['S_ID'];

$sql = "UPDATE s_signup  SET  s_name= '$php_sname' , s_pwd='$php_pwd' , s_email='$php_email'  , contact='$php_no'
WHERE   s_id ='$php_id' " ;



if ($conn->query($sql) == TRUE)
{
  echo " record updated successfully";
  header('Location:../SUPPLIER/saccount.php');
}
/*
$sql = "SELECT * FROM s_signup" ;

$result=$conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  //      echo "supplier_id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "password " . $row["s_pwd"]. " email" . $row["s_email"].  "contact " . $row["contact"]. "<br>" ;
    }
} else {
    echo "0 results";
}

*/
else {
    echo "Errorss: " . $sql . "<br>" . $conn->error;
}



/*
$sql = "SELECT * FROM s_signup";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "supplier_id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "password " . $row["s_pwd"]. " email" . $row["s_email"].  "contact " . $row["contact"]. "<br>" ;
    }
} else {
    echo "0 results";
}
*/
}
else
{
	header('Location:../SUPPLIER/supplierlogin.php');
}


$conn->close();

 ?> 











