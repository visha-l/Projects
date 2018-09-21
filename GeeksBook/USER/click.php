<html>
<head>
	<title>
	</title>
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

	if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) {
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
			$dbname = "DBMS_PROJECT";

			$conn = new mysqli($servername, $username, $password,$dbname);

			if ($conn->connect_error) {
			   die("Connection failed: " . $conn->connect_error);
			} 

			$php_id=$_POST["book"];
			$php_uid=$_SESSION["u_id"];
			$php_qnty=$_POST["quantity"];


			echo $php_uid . '<br>';
			echo $php_id . '<br>';


			$sql = "select qty from cart where u_id='$php_uid' and  BOOKID='$php_id'";
			$res = $conn->query($sql);
			
			if( $res ->num_rows >0 )
			{
				$row = $res->fetch_assoc();
				$qt1 = $row["qty"];
				$qt1=  $qt1 + $php_qnty;
				
				$sql = "select QUANTITY from BOOK where BOOKID= '$php_id'";
				$res = $conn->query($sql);
				
				if($res == TRUE)
				{
					$row = $res->fetch_assoc();
					$qt2 = $row["QUANTITY"];
					if($qt2 >= $qt1)
					{
						echo $qt1." ". $qt2;

						$sql="update cart set qty='$qt1' where u_id='$php_uid' and BOOKID='$php_id'";
						$res=$conn->query($sql);
						if(!$res)
						{
							echo 'query not run successfully'.$conn->error;
						}
						else
						{
											echo 'query run successfully';
						header("Location:../USER/buyinterface.php");	
						}

					}
					else
					{
						echo "getting";
						$_SESSION["bna"]=1;
						header("Location:../USER/buyinterface.php");
						
					}
				}
				else
				{
					echo "query not run ". $conn->error;
				} 
			}
			else
			{
				$sql="insert into cart values ('". $php_uid ."','" . $php_id ."','" . $php_qnty ."')";
				$res=$conn->query($sql);

				if($res == TRUE)
				{
					echo 'query run successfully';
				header('Location:../USER/buyinterface.php');
				}
				else
				{
					echo 'query not run successfully'.$conn->error;	
				}
				//header("Location:buyinterface.php");
			}
			$conn->close();

}
else
{
	echo "<a href='../USER/userlogin.php'> <button class='button' style='vertical-align:middle'><span>LOGIN</span>   </button> </a>";

}

?>




</body>
</html>




