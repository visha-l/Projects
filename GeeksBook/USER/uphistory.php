<html>
<head>

<?php include '../common/meta.html';?>
<link rel="stylesheet" href="../list-template/assets/css/article-lists/article-list-vertical.css">
<link rel="stylesheet" href="../USER/cart.css">
<style>

            .rating{
                overflow: hidden;
                vertical-align: bottom;
                display: inline-block;
                width: auto;
                height: 30px;
            }
            .rating > input{
                opacity: 0;
                margin-right: -100%;
            }
            .rating > label{
                position: relative;
                display: block;
                float: right;
                background: url('star-off-big.png');
                background-size: 30px 30px;
            }
            .rating > label:before{
                display: block;
                opacity: 0;
                content: '';
                width: 30px;
                height: 30px;
                background: url('star-on-big.png');
                background-size: 30px 30px;
                transition: opacity 0.2s linear;
            }
            .rating > label:hover:before,
            .rating > label:hover ~ label:before,
            .rating:not(:hover) > :checked ~ label:before{
                opacity: 1;
            }
            .row{
            height:42px;
            }

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 130px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 80%;
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

.btn_align{

margin-right:5px;
margin-top:50px;
}
.foot1{
margin-top:0px;
}



</style>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
		{
			$flage=1;
			
		}
else
{
	$flage=0;
}	

if($flage==1)
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

		$php_uid= $_SESSION['u_id'];
		$sql ="select *from p_history natural join BOOK  natural join PRICE where u_id='$php_uid'";
		
		$res= $conn->query($sql);
		
		if($res)
		{
				echo '<div class="wrapper" style="float:left;margin-left:0%;">
  
											  <div class="table"style="width:700px;">
		
												<div class="row header">
												  <div class="cell" style="width:25%">
													Book Title
												  </div>
												  <div class="cell" style="width:25%">
													Quantity
												  </div>
												  <div class="cell" style="width:25%">
													Price
												  </div>
												  <div class="cell" style="width:25%;padding-left:30px">
													Date of Purchase
												  </div>
											
												</div>';
				$ii=0;					
				$arr = array();
			while($row=$res->fetch_assoc())
			{
				
				 echo ' <div class="row">
						  <div class="cell " style="float:left;width:25%">
							 '.$row["BOOKTITLE"].'
						  </div>
						  <div class="cell"style="float:left;width:25%">
							'.$row["qnty"].'
						  </div>
						   <div class="cell"style="float:left;width:25%">
							'.$row["price"].'
						  </div>
						  <div class="cell"style="float:left;width:25%">
							'.$row["dop"].'
							 </div>
						</div>
						

						';
						$arr[$ii]=$row["BOOKID"];
				$ii=$ii+1;		
			}
			echo '</div></div> ';
			
			echo '<div  style="margin-left:10%;padding-top:40px;">
  
											  <div class="table"style="width:200px;float:left;" >
		
												<div class="row header" style="float:none;">
												  <div class="cell" style="width:150px;float:none;">
													Rate-book
												  </div>
												</div>';

					$j=0;						
				while($j < $ii)								
				{
					echo ' <div class="row">
								  <div class="cell " style="width:150px;float:none;padding:0px;" >
											<form name ="myform" action="review.php" method="POST">
<a href="logout.php"><button class="button" style="vertical-align:middle;width:150px;height:30px;font-size:15px;margin-left:0px;padding-left:0px;"><span> Rateus </span></button> </a>
										<input type="hidden" name="bid" value='.$arr[$j].'>
					   					 </form>  
					   					                 
  
								  </div>
							</div>
								  ';

				
					$j=$j+1;
					
				}echo'</div></div>';
		}
		else
		{
			echo 'query not run successfully'.$conn->error;
		}
echo '
	 <a href="readinterface.php"><button class="button btnlogin" style="margin-left:20%;float:left;margin-top:10%;;"><span>Go Back </span></button> </a>';		
}		
else
{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="supplierlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;">
		 
		 <span style="color:white;">LOGIN PLEASE</span> 
		 </button></a>';
	 
	echo'<section style="margin-left:180px;margin-top:390px;">';	
	include 'footer.php';	
	echo '</section>';	
}


?>
</body>
</html>
