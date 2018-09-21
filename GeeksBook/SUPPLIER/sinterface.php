<html>
<head>

<?php include '../common/meta.html';?>

<style>
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
<body >

<?php
session_start();

if(isset($_SESSION["ssignedup"]))
{
		echo '<script>alert("you have registerd successfully")</script>';	
	unset($_SESSION["ssignedup"]);
}
	
if(isset($_SESSION['S_ID']) && !empty($_SESSION['S_ID']))
{
	$flag=true;
}
else
{
	$flag=false;
}

if($flag == true)
{	
echo '

<nav class="navbar navbar-inverse ">
    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span style="color:white;"  class="navbar-brand" >GEEKSBOOK</span>
        </div>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="mainNavBar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../HOME/home.php">Home</a></li>
                <li><a href="../HOME/about.php">About</a></li>
                <li><a href="../HOME/contact.php">Contact</a></li>
            </ul>
        </div>

    </div>
</nav>

<div style="margin-left:0px;">
<a href="../SUPPLIER/saccount.php"><button class="button" style="vertical-align:middle"><span> ACCOUNT </span></button> </a>
</div>



<div class="alg" style="margin-bottom:0px;">
<div class="photo">
         <div class="grow">
               <a href="../SUPPLIER/suppliersupply.php"> <img src="../jpgfiles/addb.jpg" alt="Showroom picture 1" width="400px" ></a>
        </div>

</div>

<div class="photo">
         <div class="grow">
             <a href="../SUPPLIER/s_remove.php"><img src="../jpgfiles/removeb.jpg" alt="Showroom picture 1" width="400px" height="400px"></a>
         </div>
       
</div>

<div class="photo">
         <div class="grow">
             <a href="../SUPPLIER/viewbooks.php"><img src="../jpgfiles/view.png" alt="Showroom picture 1" width="400px" height="400px"></a>
         </div>
       
</div>
</div>
<div class="clearfix"></div>

<div style="margin-top:140px; margin-bottom:0px;">
<a href="../common/logout.php"><button class="button" style="vertical-align:middle"><span> LOGOUT </span></button> </a>
</div>
';

}
else
{
	header("Location:../common/supplierlogin.php");
}
?>
<div class='foot1'>
<?php include '../common/footer.php';?>
</div>

</body>
</html>
