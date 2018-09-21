<form action="../HOME/contact.php" method="POST">
      
        
        <fieldset>
          
          <label for="name">Name</label>
          <input type="text" name="v_name" pattern="[a-zA-Z\s]{4,20}"  title="Enter name properly" required>
          
          <label for="name">contact</label>
          <input type="text" name="v_contact" pattern="[0-9]{9,10}"  title="Enter ten characters" >
          
          <label for="name">Email ID</label>
          <input type="email" name="v_email" pattern="[a-zA-Z0-9]{1,20}@[a-zA-Z]{3,20}.[a-zA-Z]{1,20}"  title="Enter Correct Email"required>
          
          <label><span class="number">M</span><span style="font-family:'Lily Script One', cursive;"> Write your message here-</span></label>
          <label for="name"></label>
          <textarea name="message" rows="10" cols="30" required>
          </textarea>
          
        </fieldset>
        
        <button type="submit">Send</button>
</form>
