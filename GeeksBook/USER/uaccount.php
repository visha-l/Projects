<html>
<head>
<?php include '../common/meta.html';?>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: black;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 25px;
  padding: 0px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 0px;
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

.foot1{
	margin-left : 180px;
	margin-top:10%;
	
	}
.footer-distributed {
	background-color:navy;
}
.img-circle {
	border-radius : 50%
}

.float-left-area  {
		  width: 70%;
		  float: left;
		  }
.alg{
	padding-top:75px;
	margin-top:0px;
}
.float-right-area {
		  width: 30%;
		  float: left;
		  }

.inner-left	  {
		  padding: 5px 5px 5px 5px;
		  margin-right: 10px;
		  border: #999999 1px solid;
		  min-height: 60px;
		  }

.inner-right	  {
		  font-size: 11px;
		  padding: 5px 5px 5px 5px;
		  border: #999999 1px solid;
		  min-height: 60px;
		  }

.clear-floated	  { clear: both; height: 1px; font-size: 1px; line-height: 1px; padding: 0; margin: 0; }

</style>
</head>
<body>
<?php include '../common/sidebar.php'; ?>

<?php
session_start();
if(isset($_SESSION["usignedup"]))
{
	echo '<script>alert("You have registered successfuly")</script>';
	unset($_SESSION["usignedup"]);
}
$_SESSION["bna"]=-1;
if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
{
	$flag=true;
}
else
{	echo "yes not set<br>";
	$flag=false;
}

if($flag == true)
{	

$servername = "localhost";
$username  = "root";
$password = "";
$dbname = "DBMS_PROJECT";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
	die("Connection failed: ".$conn->connect_error);
}
 
echo '
<div class="alg" >
<div class="photo" style="float:left;">
         <div class="grow">
             <a href="../USER/usereditdetails.php"><div width="400px" height="400px"style="color:red;font-size:40px;font-family:cursive;">Edit Details</div></a>
  
        </div>
</div>

<div class="photo" style="float:right">
         <div class="grow">
              <a href="../USER/uphistory.php"><div width="400px" height="400px"style="color:red;font-size:40px;font-family:cursive;">Purchase History</div></a>
  
         </div>
</div>
</div>
<div class="clearfix"></div>
<br>';

$conn->close();
}
else
{
	header("Location:../USER/userlogin.php");
}
/*<div class="float-left-area">
<div class="inner-left">

Left content. Add your main body of content to this side.

</div>
</div>

<div class="float-right-area">
<div class="inner-right">

Right content. Add your images or sidebar text to this side.

</div>
</div>

<div class="clear-floated"></div>
*/
?>

<!--footer is included here-->

<section class="foot1">
<?php include '../common/footer.php' ;?>
</section>

</body>
</html>
