<!DOCTYPE html>


<html>
<head>
<!-- form links-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../sign-up/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

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
<body >

<?php include '../common/sidebar.php'; ?>

<?php include '../SUPPLIER/signup-form.html'; ?>
<!--
old form
<form action="s_signup.php" method="GET">
<fieldset>
Supplier ID<br>
<input type="text" name="s_id">
<br>Supplier Name<br>
<input type="text" name="s_name">
<br>Supplier Password<br>
<input type="password" name="s_pwd">
<br>Supplier Email<br>
<input type="text" name="s_email">
<br>Supplier Contact<br>
<input type="text" name="contact">
<br>
<pre><input type="submit">       <input type="reset"></pre>
</fieldset>
</form>-->


<section class="foot1">
<?php include '../common/footer.php' ;?>
</section>
</body>
</html>

