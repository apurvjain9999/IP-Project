<?php
session_start();
$myname=$_SESSION['name'];
echo<<<_end
<!DOCTYPE html>
 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="msgstyle.css" type="text/css" />
  </head>
  <body>
   <div id="container">
    <h1>Sending SMS with PHP</h1>
    <form action="chattry.php" method="post">
     <ul>
      <li>
       <label for="phoneNumber">Friend Name</label>
       <input type="text" name="friendname" id="friendname" placeholder="Abhinav" /></li>
      <li>
      <label id="carrier">$myname</label>
      </li>
      <li>
       <label for="smsMessage">Message</label>
       <textarea name="smsMessage" id="smsMessage" cols="45" rows="15"></textarea>
      </li>
     <li><input type="submit" name="sendMessage" id="sendMessage" value="Send Message" /></li>
    </ul>
   </form>
  </div>
 </body>
</html>
_end;
?>