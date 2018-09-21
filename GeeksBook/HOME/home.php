<html>
<head>
<title>Home Page</title>
<?php include('../common/meta.html');?>

<style>
.foot1
{
	margin-left   : 0px;
	margin-top	: 120px;
}
</style>
</head>

<body>

<?php include '../HOME/navbar.php'; ?>

<div class="alg">
	<div class="photo" style="border-radius:50%;margin-right:10px;">
         <div class="grow">
               <a href="../SUPPLIER/sinfo.php"> <img src="../jpgfiles/a.jpg" alt="picture 1" ></a>
        </div>
       <span class="write">Way To Seller</span>
	</div>

	<div class="photo" style="border-radius:50%;">
         <div class="grow">
             <a href="../USER/uinfo.php">   <img src="../jpgfiles/cart.jpg" alt=" picture 2"></a>
         </div>
        <span class="write">Be The Customer</span>
	</div>
</div>

<div class="clearfix"></div>
<br>
<section class="foot1">
<?php include('../common/footer.php');?>
</section>

</body>
</html>
