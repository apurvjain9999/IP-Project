<?php
require_once "login.php";
if(isset($_POST['id']))
{
	$id=$_POST['id'];
}
$sta=1;	
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="select * from users";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $sid=$row['id'];
   if($id==$sid)
   {
   	$sta=0;
   	break;
   }
}
echo "$sta";
?>