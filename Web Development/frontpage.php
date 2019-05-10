<?php 
require_once "login.php";
session_start();
if(isset($_POST['id']) && isset($_POST['password'])
{
	$id=$_POST['id'];
	$p=$_POST['password'];
	$pass=hash('ripemd128','$p');
}
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
$query="select * from users where id="$id" and Pass="$pass" ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $name=$row['fname']. " " .$row['lname'];
   $sid=$row['id'];
   $spass=$row['Pass'];
}
if(($id==$sid)&&($pass==$spass))
{
 $_SESSION['id']=$sid;
 $_SESSION['pass']=$spass;
 $_SESSION['name']=$name;
 echo "Welcome $name ! ";
 die("<a href="">Click here to continue.</a>");  
} 
else
{
	echo "Invalid UserName or Password.";
	die("a href="">Back to login page.</a>");
}
$conn->close();
$result->close();
?>