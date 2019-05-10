<?php
require_once "login.php";
session_start();
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['']))
  $pass=hash('ripemd128','$_POST['']');
$query="select * from users where Pass="$pass" ";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $spass=$row['Pass'];
}
if($spass)
{
 if(isset($_POST[''])&&isset($_POST['']))
 {
 	if($_POST['']==$_POST[''])
    {
 	   $newpass=$_POST[''];
 	   $query1="update users set Pass="$newpass" where Pass="$pass"";
 	   $_SESSION['pass']=$pass;
 	   echo "Password Changed Successfully.<br> <a href="">Click Here to continue</a>";
    } 
    else
    {
     die(echo "Entered passwords in both fields. <br> ". "<a href="">Click here to enter fields again.</a>");
    }
 }
 else
 {
 	die(echo "Entered passwords in both fields. <br> ". "<a href="">Click here to enter fields again.</a>");
 }
}
else
{
  die(echo "Incorrect Password <br> ". "<a href="">Click here to 
 		enter fields again.</a>");
}

?>