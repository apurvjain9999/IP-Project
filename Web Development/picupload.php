<?php
session_start();
$id=$_SESSION['id'];
require_once "login.php";
$conn=new mysqli('$hn','$un','$pw','$db');
if($conn->connect_error) die($conn->connect_error);
if($_FILES)
{
	$name=$_FILES['filename']['name'];
    switch($_FILES['filename']['type'])
    {
    	case 'image/jpeg': $ext="jpg" ; break;
    	case 'image/png':$ext='png'; break;
        case 'image/gif':$ext='gif';break;
        default : $ext="";break;
    }
}   
else
{
	echo "File not selected.";
}

if($ext)
{	
    $name=$_FILES['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'],$name);
	echo "<html><body>Image is uploaded successfully.<br> The uploaded image is <img src='$name' alt='Unable to show image' height='300' width='300' border='3'>";
	echo "<br><a href='try.html'>Click here to continue</a></body></html>";
	$query="update photo set profilepic='$name' where id='$id' ";
	$conn->query($query);
}
else
{
	echo "Image not uploaded. <br> Please upload a image file.";
}

?>