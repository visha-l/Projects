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
	

	if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) {
		$flag=1;
	}
	else
	{
		echo "not logged in ";

		$flag=0;
	}
if($flag == 1)
{	
$php_rating=$_POST["rating"];
//$php_area = $_POST["review"];
$php_bid = $_POST["bid"];

$sql = "select *from  reviews  where BOOKID='$php_bid'";
$res = $conn->query($sql);

if($res)
{
		
		
		if($res->num_rows>0)
		{
		$row=$res->fetch_assoc();
		$val1 =$row["num"];
		$valr = $row["rating"];
		
		$x= $val1*$valr;
		$val1=$val1+1;
		$x=$x+$php_rating;
		$x=$x/($val1);
		
				$sql = "update reviews set  rating='$x' , num='$val1'   where BOOKID='$php_bid'";

					$res = $conn->query($sql);

					if($res)
					{
							header('Location:../USER/uphistory.php');
					}
					else
					{
					echo 'not run'.$conn->error;

					}
		
		
		}
		else
		{
		
				$sql = "insert into reviews values('$php_bid','$php_rating' ,1)";

					$res = $conn->query($sql);

					if($res)
					{
							header('Location:../USER/uphistory.php');
					}
					else
					{
					echo 'not run'.$conn->error;

					}


		}
		
}
else
{
	echo 'not run'.$conn->error;
}



}
else
{
echo 'no loggedin';
}
?>
