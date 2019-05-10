<?php
session_start();
require_once "login.php";
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST[''])&&isset($_POST['']))
{
	$fname=$_POST[''];
	$lname=$_POST[''];
	$id=$_SESSION['id'];
	$query1="update users set fname="$fname" where id="$id" ";
    $query2="update users set lname="$lname" where id="$id" ";
    $conn->query($query1);
	$conn->query($query2);
	$name=$fname." ".$lname;
    $_SESSION['name']=$name;
    echo "Name updated </br> New name is ".$name;
    echo "<a href="">Click here to continue</a>";
}
else
{
 echo "Please enter both fields. <br> <a href="">Click here to again fill the fields</a>"; 
}
?>