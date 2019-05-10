<?php
require_once "login.php";
session_start();
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['id']) && isset($_POST['password']) isset($_POST['gender']) isset($_POST['dob']) && isset($_POST['sques']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$id=$_POST['id'];
	$password=hash('ripemd128','$_POST['password']');
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$forgot=$_POST['sques'];
    $answer=$_POST['ans']
}
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
$query="insert into users values('$fname','$lname','$id','$gender','$password','$forgot','TO_DATE('$dob','DD/MM/YYYY')','$answer')";
$result=$conn->query($query);
$query1="insert into photo values('$id','null')";
$conn->query($query1);
if($result)
{
	$_SESSION['id']=$id;
	$_SESSION['pass']=$password;
	$name=$fname." ".$lname;
    $_SESSION['name']=$name;
    echo "WELCOME $name";
    die("<a href="">Click here to continue.</a>")
}
else
{
	echo "Some error has occured .";
	die("<a href="">Back to login page.</a>");
}
$conn->close();
$result->close();
?>