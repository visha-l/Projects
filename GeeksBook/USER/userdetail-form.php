
      <form action="../USER/u_editdetails.php" method="POST">
      
        <h1>Edit Details</h1>
        
        <fieldset>
          <legend><span class="number">!</span>Your basic info</legend>
          <label for="name">Name</label>
          <input type="text" id="name" name="u_name" value="'.$php_uname.'" pattern="[a-zA-Z]{4,20}"  title="Enter name properly" required>
          
  
          <label for="password">Password:</label>
          <input type="password" id="password" name="u_pwd" value="'.$php_pwd.'" required> 
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="u_email" value="'.$php_email.'" pattern="[a-zA-Z]{1,20}@[a-zA-Z]{3,20}.[a-zA-Z]{1,20}"  title="Enter Correct Email" required>
          
        </fieldset>
        <button type="submit">Submit</button>
      </form>
