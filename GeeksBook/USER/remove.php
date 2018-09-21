<html>
<head>
<?php include '../common/meta.html';?>
	<title>
	Cart 
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

//include 'sidebar.php';

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

			/*$sql = "select QUANTITY from BOOK where BOOKID='$php_id'";
			$res=$conn->query($sql);
				$row=$res->fetch_assoc();
				$nr=$row["QUANTITY"];
				
				
			if($nr>0)
			{
					$nr=$nr-1;
				$sql ="update BOOK set  QUANTITY='$nr' where BOOKID='$php_id'";
				$res= $conn->query($sql);
			//	echo "nr=$nr";
			}
			else
			{
				$_SESSION["bna"] = 1;
				//echo "not added";
				header("Location:buyinterface.php");
			}
			*/

//			echo $php_uid . '<br>';
//			echo $php_id . '<br>';


			$sql = "select qty from cart where u_id='$php_uid' and  BOOKID='$php_id'";
			$res = $conn->query($sql);

			if( $res -> num_rows >0 )
			{
				$row = $res->fetch_assoc();
				$qt1 = $row["qty"];
				$qt1=  $qt1 - $php_qnty;
				
				
						if($qt1<=0)
						{
							echo $php_uid.' <br>'.$php_id;
							echo '<br>';
							$sql="delete from cart where u_id='$php_uid' and BOOKID='$php_id'  ";
							$res = $conn->query($sql);
							
							if(!$res)
								{
									echo 'query not run successfully'.$conn->error;
								}
								else
								{
									echo $qt1;
									echo  'successdasd';
									$sql = "select * from cart where u_id='$php_uid' and  BOOKID='$php_id'";
					
									$res1 = $conn->query($sql);
									while($row1 = $res1->fetch_assoc())
									{
										echo 'yes'.$row1["qty"];
									
									}
								header("Location:../USER/view_cart.php");	
								}
						}
						else
						{
								$sql="update cart set qty='$qt1' where u_id='$php_uid' and BOOKID='$php_id'";
								$res=$conn->query($sql);
								if(!$res)
								{
									echo 'query not run successfully'.$conn->error;
								}
								else
								{
									echo $qt1;
									echo  'success';
									header("Location:../USER/view_cart.php");	
								}
						}	
				}
				else
				{
					echo "query not run successfully". $conn->error;
				} 


			/*
			$sql="insert into cart values($php_uid,$php_id,$php_qnty)";

			$res=$conn->query($sql);

			if($res==true)
			{
				echo "yes it is added<br>";
				header("Location:buyinterface.php");
			}

			else
			{
				echo "no book is added into cart<br>";
				
			}*/


			$conn->close();

}
else
{
	echo "<a href='../USER/userlogin.php'> <button class='button' style='vertical-align:middle'><span>LOGIN</span>   </button> </a>";

}

?>




</body>
</html>




