<?php
require_once "login.php";
session_start();
$myid=$_SESSION['id'];
$myname=$_SESSION['name'];
if (isset($_POST['friendname'])&&isset($_POST['smsMessage']))
{
	$friendname=$_POST['friendname'];
	$message=$_POST['smsMessage'];
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
$query="select * from users where username='$friendname' ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $friendid=$row['id'];
}
$query1="insert into chat(my_id,friend_id,message) values('$myid','$friendid','$message') ";
$conn->query($query1);

$query2="select * from users where (my_id='$myid' and friend_id='$friendid') or (my_id='$friendid' and friend_id='$myid') ";
$result=$conn->query($query2);
if(!$result) die($conn->error);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   if($row['my_id']=$myid)
   {
   	echo<<<_end



_end;

   }
   else
   {
   	echo<<<_end


_end;
   }
}
}
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