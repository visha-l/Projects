<html>
<head>
<?php include '../common/meta.html';?>
<link rel="stylesheet" href="../list-template/assets/css/article-lists/article-list-vertical.css">
<link rel="stylesheet" href="../USER/cart.css">

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

.cell{
	width:40%;
}
</style>



	<title>

	</title>



</head>
<body>

<?php
	
$servername = "localhost";
$username = "root";
$password = "";	
$dbname="DBMS_PROJECT";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
{
	die("Connection Failed:" . $conn->connect_error);
}	


session_start();
include '../common/sidebar.php';
if(!(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])))
{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="../USER/userlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
	 
	echo'<section style="margin-left:180px;margin-top:480px;">';	
	include '../common/footer.php';	
	echo '</section>';	
}

else
{

	

	
		echo '<div class="wrapper" style="float:left;margin-left:20%;">

									  <div class="table">

										<div class="row header">
										  <div class="cell">
											Book Title
										  </div>
										  <div class="cell">
											Quantity
										  </div>
										  <div class="cell" style="margin-left:40%;">
											Cost
										  </div>
										</div>';
								
/*		$i = 0; //no of col
		
		echo "<tr>";

		while(($i <3 && ($row)) )
		{	
*/




	echo "<form action='../USER/userpurchase.php' method='POST'>";
	echo "<table>";

	$qty_overflow=0;
	$php_uid = $_SESSION['u_id'];
	$sql = "Select * from cart  natural join BOOK  natural join PRICE where u_id ='$php_uid'";
	$res = $conn->query($sql);


	if(!$res)
	{
		echo 'query not run successfully'.$conn->error;
	}


	if($res->num_rows > 0 )
	{

		$i=0;

		while($row=$res->fetch_assoc())
		{
					if($row['QUANTITY'] < $row['qty'])
			{
				$qty_overflow=1;
				$items=$row['QUANTITY'];
				$warning="max no of items u can purchase are".$items;
				$price = $row['QUANTITY'] * $row['price'];
			}
			else
			{
				$items=$row['qty'];
				$price = $row['qty'] * $row['price'];	
				$warning='';
			}



													 echo ' <div class="row">

															  <div class="cell">'
																	.$row["BOOKTITLE"].'
															  </div>
															  <div class="cell">';
														echo		"<input type='number' style='width:100px;'name='".$i."q' class='sad'  id =".$i." value='".$items."' onchange ='myfunc(\"". $row['price']."\",\"".$i ."\")' min='0' max=".$row['QUANTITY']. ">".
					$warning;
								echo'							  </div>
															  <div class="cell">';
													echo		  "<div id='".$i."p'> ".$price ."</div> ";
													
													echo'			  </div>
															  <div class="cell">
																<input type="hidden"  name="u_id"  value='.$php_uid.'> 
									
															  </div>

															  <div class="cell">';
														echo "<input type='hidden' name='".$i."b' value='".$row['BOOKID']."''>";
															echo	'</div>				  
															  </form>
															</div>';


	$i=$i+1;
			
		}
//	echo "<input type='hidden' name='total_row' value='".$j."'>";
	echo "<input type='hidden' name='total_row' value='".$i."'>";
	echo '<a href="../USER/userpurchase.php"><button class="button" style="vertical-align:middle;font-size:15px;width:100%;height:30px;"><span> PLACE ORDER </span></button> </a>'  ;
	echo "</form>";

$conn->close();
	}
else
{
	echo "YOUR CART IS EMPTY <a href='../USER/buyinterface.php'>ADD </a>SOME ITEMS ";

}


}


?>


<script>
	function myfunc( price,ids)
	{
		//var x =document.getElementsByClassName('sad');
		var x =document.getElementById(ids);
		var y=document.getElementById(ids+'p');
		//var asd='00';
		
		//alert('00' +' '+typeof '00'+' '+ids+' ' + typeof ids );	

		//if(asd=='00')
		//alert('hello');	

		//if(ids =="00")
		//alert('hello'+' '+ ids + ""+ x.value);
		//alert(x.value*price); 
		//alert('hello'+ typeof ids + " " +ids);
		y.innerHTML = x.value*price;

	}
</script>

</body>
</html>

