<?php
	session_start();


	if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
	{
		$flag=true;
	}
	else
	{
		echo "not logged in ";

		$flag=false;
	}

if($flag==true)
{
			$servername = "localhost";
			$username = "root";
			$password = "";	
			$dbname="DBMS_PROJECT";

			$conn = new mysqli($servername,$username,$password,$dbname);

			if($conn->connect_error)
			{
				die("Connection Failed:" . $conn->connect_error);
			}	


			$php_uid = $_SESSION['u_id'];

			//$php_bookid = $_POST['bookid'];
			$php_address = $_POST["address"];
			$php_email = $_POST['u_email'];
			$php_contact = $_POST['u_contact'];
echo $php_uid;
			$sql = "Select u_name, u_email from u_signup where u_id ='$php_uid'";

			$res = $conn->query($sql);
			if($res == TRUE)
			{
				echo "query run  is correct";
							
							if($res->num_rows > 0)
							{

								$sql = "select * from  u_purchase where u_id='$php_uid'";
								$res=$conn->query($sql);
								

										if($res == TRUE)
										{
											 if($res->num_rows==0)
											 {
													$sql = "insert into u_purchase values('$php_uid', '$php_contact', '$php_address','$php_email')";
													$res=$conn->query($sql);
	
													if($res == TRUE)
													{
														echo "A new record is inserted into u_purchase<br>";
														header('Location:../USER/readinterface.php');
													}
													else
													{
														echo "Error insert u_purchase--> " . $sql . "" . $conn->error;
													}
											 
											 }
											 else
											 {
													$sql = "update u_purchase set  contact='$php_contact'  ,address= '$php_address',u_email= '$php_email' where u_id='$php_uid' ";
													
													$res=$conn->query($sql);
	
													if($res == TRUE)
													{
														echo "A  record is upted into u_purchase<br>";
														header('Location:../USER/readinterface.php');
													}
													else
													{
														echo "Error insert u_purchase--> " . $sql . "" . $conn->error;
													}
											 
											 
											 }
										}
										else
										{
											echo "Error select u_purcrchase " . $sql . "" . $conn->error;
										}


							}
							else
							{
								echo "error in signup queryl ".$conn->error;
							}

			}
			else
			{
				echo "Error" . $sql . "" . $conn->error;
			}

}

else
{
	echo 'not logged in';
	header('Location:../USER/userlogin.php');
}
$conn->close();
?>

