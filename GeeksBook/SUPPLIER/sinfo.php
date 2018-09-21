<html>
<head>
<title>supplier information</title>
	<?php include '../common/meta.html';?>

<style>
.button {
  display: inline-block;
  border-radius: 2px;
  background-color: navy;
  border: none;
  color: white;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 150px;
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
p{
	display: block;
	margin-top : 1em;
	margin-bottom : 1em;
	margin-left : 3em;
	margin-right: 3em;	
	text-indent: 0px;
	font-family :verdana;
	color: white;  
}
.img-circle {
	border-radius : 50%
}
.sec-right {
	
	margin-top: 50px;
	margin-left : 220px;
	margin-right: 200px;
	background-color:#888;
	height: 300px;
}
.foot1{
	margin-left : 180px;
	margin-top:180px;
	
	}
.footer-distributed {
	background-color:navy;
}
.button-margin {
	float:right;
	padding-top:30px;
}

.heading{
	background-color:#111;
	color:white;
	font-family:'Lily Script One', cursive;
	font-size:3em;
}
</style>
</head>
<body>

<?php include '../common/sidebar.php'; ?>

<?php
	session_start(); 
	if(isset($_SESSION["S_ID"]))
		$link="../SUPPLIER/sinterface.php";
	else
		$link="../SUPPLIER/supplierlogin.php";	
	//echo '<div style="padding-left:400px;">'.$_SESSION["S_ID"].'</div>';	
?>

<section  class="button-margin">
<div><a href= "../SUPPLIER/suppliersignup.php" ><button class="button" style="vertical-align:middle"><span> SignUp </span></button> </a></div> 

<div><a href= "<?php echo $link; ?>" ><button class="button" style="vertical-align:middle"><span> SignIn </span></button> </a></div>
</section>
<section class="sec-right" >

<center class="heading">Seller</center>

<p>This website provides a platform for seller to sell their books @ online </p>
</section>	


<section class="foot1">
<?php include '../common/footer.php' ;?>
</section>


</body>
</html>
</html>
