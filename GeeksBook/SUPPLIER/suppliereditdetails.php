 
<html>
<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../sign-up/css/style.css">
    
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="sign-up/css/normalize.css">-->
<?php include '../common/meta.html';?>
	<title>
	account
	</title>
</head>
<body>

<?php 
session_start();
include '../common/sidebar.php';
	if(isset($_SESSION['S_ID']) && !empty($_SESSION['S_ID'])) {
		$flag=true;
	}
	else
	{
		//echo "not logged in ";

		$flag=false;
	}



if($flag==true)
{

		$php_sid=$_SESSION['S_ID'];


		$servername = "localhost";
		$username = "root";
		$password = "";


		$dbname = "DBMS_PROJECT";
		$conn = new mysqli($servername, $username, $password,$dbname);

		if ($conn->connect_error) {
		   die("Connection failed: " . $conn->connect_error);
		} 


		$sql = "SELECT * FROM s_signup where s_id='$php_sid' ";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		     //   echo "u_name: " . $row["u_name"]. " " ."upwd" . $row["u_pwd"]. " " . "u_email". $row["u_email"]. "<br>";

				$php_sname=$row['s_name'];
				$php_pwd=$row['s_pwd'];
				$php_email=$row['s_email'];
				$php_contact = $row['contact'];
		    }
		}
		else 
		{
		    echo "<center>wrong user is doing this  0 results</center>";
		}
		
		/*form is included here*/
		
		
   echo'   <form action="../SUPPLIER/s_editdetails.php" method="POST">
      
        <h1>Edit Details</h1>
        
        <fieldset>
          <legend><span class="number">!</span>Your basic info</legend>
          <label for="name">Name</label>
          <input type="text" id="name" name="s_name" value="'.$php_sname.'" pattern="[a-zA-Z\s]{4,30}"  title="Enter name properly" required>
          
  
          <label for="password">Password:</label>
          <input type="password" id="password" name="s_pwd" value="'.$php_pwd.'" required>
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="s_email" value="'.$php_email.'" pattern="[a-zA-Z0-9]{1,20}@[a-zA-Z]{3,20}.[a-zA-Z]{1,20}"  title="Enter Correct Email" required>
          
          <label for="number">Contact:</label>
          <input type="text" id="number" name="contact" value="'.$php_contact.'" pattern="[0-9]{9,10}"  title="Enter ten characters" required>
        </fieldset>
        <button type="submit">Submit</button>
      </form>';
	
}

else
{
	echo '<div class="blank"></div>
		  <div style="padding-top:10px;background-color:black;margin-left:350px;width:50%;font-family:cursive;font-size:30px;color:white;">
		  you are not logged in.......</div>
		  <a href="../USER/userlogin.php">
		 <button class="button btnlogin" style="vertical-align:middle;float:right;width:15%;">
		 
		 <span style="color:white; ">LOGIN PLEASE</span> 
		 </button></a>';
	 
	echo'<section style="margin-left:180px;margin-top:480px;">';	
	include '../common/footer.php';	
	echo '</section>';	
}
echo'<section style="margin-left:180px;margin-top:10px;">';	
	include '../common/footer.php';	
	echo '</section>';	
?>



</body>
</html>

