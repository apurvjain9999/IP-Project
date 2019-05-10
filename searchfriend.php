<?php
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
if(isset($_POST['fname']) && isset($_POST['lname']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$query="select * from users where fname='$fname' and lname='$lname'";
}
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $fname=row['fname'];
   $lname=row['lname'];
   $random=row['random'];
   $conn1=new mysqli($hn,$un,$pw,$db2);
   $query1="select address from p".$random." where Sno='1' ";
   $result1=$conn1->query($query1);
   $rows1=$result1->num_rows;
	for($k=0;$k<$rows;$k++)
	{
		$result1->data_seek($k);
   		$row1=$result1->fetch_array(MYSQLI_ASSOC);
   		$picaddress=row1['address'];
   	}
   	echo"
<html>
<head>
</head>
<body>
".$j."
<img src=".$picaddress."alt='Hi'/>
<a href=''>".$fname." ".$lname."</a>
</br>
</br>
</body>
</html>
";
}

?>