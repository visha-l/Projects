<html>
<head>
<!-- form links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../sign-up/css/style.css">
    
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="sign-up/css/normalize.css">-->

<?php include '../common/meta.html';?>
<style>
.foot1{
	margin-left : 180px;
	margin-top:100px;
	
	}
.footer-distributed {
	background-color:navy;
}
.img-circle {
	border-radius : 50%
}

</style>
</head>
<body>

<?php include '../common/sidebar.php'; ?>

<?php include '../USER/user-signup-form.html'; ?>

<section class="foot1">
<?php include '../common/footer.php' ;?>
</section>
<!--
<div id="nav"><br>
<div id="nav_wrapper">
 <ul>
	<li><a href="http://localhost/home.php">Home</button></a></li>
	<li><a href="http://localhost/suppliersignup.php">Supplier</a></li>
	<li><a href="http://localhost/supplierlogin.php">S-login</a></li>
	<li><a href="http://localhost/usersignup.php">Customer</a></li>
	<li><a href="http://localhost/userlogin.php">C-login</a></li>
  </ul>
</div>	
</div>
<form action="u_signup.php" method="GET">
<fieldset>
Name<br>
<input type="text" name="u_name"><br>

UserID<br>
<input type="text" name="u_id"><br>
Password<br>
<input type="password" name="u_pwd"><br>
Email<br>
<input type="text" name="u_email"><br>
<pre><input type="submit">      <input type="reset"></pre>

</fieldset>
</form>
-->

</body>
</html>

