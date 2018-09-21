<?php 

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBMS_PROJECT";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error)
{
   die("Connection failed: " . $conn->connect_error);
} 
/*
$query_file = 'sql_supplyquery.txt';
   
   $fp = fopen($query_file, 'r');
   $sql = fread($fp, filesize($query_file));
   fclose($fp); 

if ($conn->query($sql) === TRUE) {
    echo "Tables  created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

$php_sid = $_SESSION['S_ID'];


$php_bid=$_POST['bookid'];
$php_auth=$_POST['author'];
$php_pub=$_POST['publication'];
$php_cat = $_POST['category'];
$php_qnty=$_POST['qnty'];
$php_price=$_POST['price'];
$php_title=$_POST['title'];
$php_read; 
if(isset($_POST['readtag']))
{
	$php_read=1;
}
else 
{
	$php_read=0;
}

$php_link = $_POST['addbook'];

$sql = "INSERT INTO BOOK (bookid,author, publication,category,readable,booktitle,Booklink,QUANTITY)
VALUES  ('$php_bid', '$php_auth', '$php_pub', '$php_cat' ,'$php_read','$php_title','$php_link',$php_qnty) " ;



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
    echo "Errorss: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO BOOKSUPPLIED (BOOKID, S_ID)
VALUES  ('$php_bid', '$php_sid')";


if ($conn->query($sql) == TRUE) {
  echo "New record created successfully @booksupplied";
} else {
    echo "Errorss: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO PRICE (BOOKID, S_ID,price)
VALUES  ('$php_bid', '$php_sid','$php_price')";


if ($conn->query($sql) == TRUE) {
  echo "New record created successfully @ price"; 
  header('Location:../SUPPLIER/viewbooks.php');
} else {
    echo "Errorss: " . $sql . "<br>" . $conn->error;
}



$sql = "SELECT *  from BOOK natural join BOOKSUPPLIED where s_id= '$php_sid'  ";
		
	$res = $conn->query($sql);

	if( $res == TRUE )
	{
//			echo "res=true<br/>";
//			echo "numofrows=".$res->num_rows."<br/>" ;

			if ( $res->num_rows  >= 1) 
			{
//		    echo "res rows==1<br/>";

		//    $row = $res->fetch_assoc();
//		    echo $res->num_rows ,"<br/>";

		    $row = $res->fetch_assoc();
//				echo "helo".$row["BOOKID"];

					echo "<table border='2' bordercolor='blue'>";
				

					while(($row))
					{
						$i = 0; //no of col

						echo "<tr>";

						while(($i <3 && ($row)) )
						{
 							if($row["READABLE"]==1) $php_str="preview "; 
 							else $php_str="NO Preview Available";

							echo "
								<td>

								<table border='3' bordercolor='yellow'>
								<tr>
									<td>BOOKID -> ".$row["BOOKID"]."</td>
								</tr>	
								<tr>	
									<td>BOOKTITLE -> ".$row["BOOKTITLE"]."</td>
							
								</tr>
								<tr>	
									<td>
										AUTHOR -> ".$row["AUTHOR"]."
									</td>
	
								</tr>
								<tr>	
									<td>
										PUBLICATION -> ".$row["PUBLICATION"]."
									</td>
									
								</tr>
								<tr>	
									<td>
										CATEGORY -> ".$row["CATEGORY"]."
									</td>
									
								</tr>	
								<tr>
									<td>
									 ".$php_str."
									</td>
									
								</tr>
								<tr>						
									<td>
										READ -> 
									<form action='../SUPPLIER/final_remove.php' method='get'>
									<input type='hidden' name='bookid' value=". "'".$row["BOOKID"]."'" .">
									</form>

									</td>					
								</tr>
								</table>
							</td>
							" ;
							$i = $i + 1;
//							echo "i".$i;
							$row = $res->fetch_assoc();
						}
						echo "</tr>";	

						$i = 0;
					}
					echo "</table>";
				echo "<a href='../SUPPLIER/sinterface.php'><font color='red' face='verdana'>Back</font></a>"	;

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

/*
$sql = "SELECT * FROM book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "supplier_id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "password " . $row["s_pwd"]. " email" . $row["s_email"].  "contact " . $row["contact"]. "<br>" ;
    }
} else {
    echo "0 results";
}
*/
$conn->close();
?>





