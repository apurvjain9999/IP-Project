<?php
session_start();
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$name=$_SESSION['name'];
$id=$_SESSION['id'];
$query="select * from users where id='$id'";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $image=$row['propic'];
}

$query1="select * from biodata where id='$id' ";
$result1=$conn->query($query1);
$rows1=$result1->num_rows;
for($k=0;$k<$rows1;$k++)
{
   $result1->data_seek($k);
   $row1=$result1->fetch_array(MYSQLI_ASSOC);
   $hometown=$row1['hometown'];
   $current=$row1['currentcity'];
   $work=$row1['work'];
}




echo<<<_end
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  .data {
  margin-left: 1.5cm;
  font-weight: bold;
  font-size: 1cm;
  
}
.edit {
  text-decoration-color: blue;
  text-decoration: none;
}
.post {
  border: 50px solid;
  width: 300px;
  border-radius: 5px;
}

.post::-webkit-scrollbar{
  width: 10px;
}

.post::-webkit-scrollbar-thumb{
  border-radius: 5px;
  background: rgba(0,0,0,.1);
}

  </style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">			
			<li class="active"><a href="first.php">Home</a></li>
			<li class="active"><a href="allfriends.php">Friends</a></li>
			<li class="active" style="word-spacing:3px" ><a href="userson.php">All Users</a></li>
			<li class="active"><a href="loadfriends.php">Messages</a></li>
      <li class="active"><a href="myposts.php">My posts</a></li>
			<li class="active"><a href="">Notifications</a></li>
			<li class="active"><a href="exsettings.php">Settings</a></li>
			<li class="active"><a href="logout.php">Logout</a></li>
		</ul>
		<form method="post" class="navbar-form navbar-right" role="search" action="search.php">
        <div class="form-group input-group">
          <input type="text" name="sname" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
    </div>
   </div>
</nav>
<div style="border:2px solid; width:36%; height:485px; position:sticky">
<div class="container text-center" >    
  <div class="row">
    <div class="col-sm-5">
      <div class="well">
        <p>My Profile</p>
        <img src="$image" alt="Profile Photo" class="img-circle" height="200px" width="200px"/>
      </div>
      <div class="well">
      	<p>
      		<span class="label label-default">
      			Name &nbsp; &nbsp; :</span> 
      			<br/><br/>
      		<span class="label label-primary">$name</span>
      	</p>
      	<p>
	      	<span class="label label-default">
	      		Hometown &nbsp; : $hometown </span> 
	      	<br/>
	      	<span class="label label-success"></span>
	    </p>
      	<p>
	      	<span class="label label-default">
	      		Current City: $currentcity </span> 
	      	<br/>
	      	<span class="label label-warning"></span>
	    </p>
	    <p>
	      	<span class="label label-default">
	      		Work At: $work </span> 
	      	<br/>
	      	<span class="label label-danger"></span>
	    </p>
      </div>
    </div>
    <div>
_end;
$u=0;
$random=$_SESSION['random'];
$propic=$_SESSION['propic'];
$conn=new mysqli($hn,$un,$pw,$db3);
$conn1=new mysqli($hn,$un,$pw,$db);
$conn2=new mysqli($hn,$un,$pw,$db4);
$query="select * from f".$random." ";

echo<<<_end
	   <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
_end;
      $result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows>0)
{
  echo<<<_end
  <div style=" border:2px solid;">
      <span style="margin-top: 25px; margin-bottom: 25px ; margin-left: 31% ;text-align:center ; font-weight: bolder; font-size: 40px; color: hsla(143,97%,49%,0.8); border-bottom: 5px groove indigo">Friends posts</span><br/><br/><br/>
_end;
 for($i=0;$i<$rows;$i++)
  {
      $result->data_seek($i);
      $row=$result->fetch_array(MYSQLI_ASSOC);
      $fid=$row['friendid'];
      $query1="select * from users where id='$fid' ";
      $result1=$conn1->query($query1);
      $result1->data_seek(0);
      $row1=$result1->fetch_array(MYSQLI_ASSOC);
      $fran=$row1['random'];
      $fname=$row1['username'];       
      $query2="select * from posts".$fran." order by post_on desc ";
      $result2=$conn2->query($query2);
      $rows2=$result2->num_rows;
    echo<<<_end
    <span style=" margin-top: 20px ;margin-left: 35% ;text-align:center ; font-weight: bold; font-size: 25px; color: hsla(11,98%,16%,0.7); border-bottom: 5px groove indigo">$fname Posts</span><br/><br/>
_end;

   for($j=0;$j<$rows2;$j++)
   {
        $result2->data_seek($j);
        $row2=$result2->fetch_array(MYSQLI_ASSOC);
        $tpost=$row2['tpost'];
        $ppost=$row2['ppost'];
        $time=$row2['post_on'];
      $k=$u+1;

    echo<<<_end
    <span style=" margin-top: 20px ;margin-left: 47% ;text-align:center ; font-weight: bold; font-size: 20px; color: hsla(222,97%,24%,0.8); border-bottom: 5px groove indigo">Post $k</span>
_end;

  if($rows2==0)
    {
      echo<<<_end
          <div class="post" style="background-color: hsla(289,97%,49%,0.3) ; border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 26% ; width: auto; max-width: 300px ;height: auto; max-height: 400px ; min-height: 100px ; overflow: scroll ; padding: 10px ; border: 0px ; padding: 10px ; font-family: cursive,sans-serif; font-size: 20px">No posts from this friend.</div>      
_end;
    }

    if($ppost!="NULL" && $tpost!="NULL")
    {

      echo<<<_end
      <div style="border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 5% ; border: 0px ; height:auto ; width: auto; max-width:2000px; max-height:2000px ">
      <div style=" margin: 30px;  width: auto; max-width: 500px ;height: auto; max-height: 600px ; min-height: 100px ;"><img src="$ppost" height=600px width=500px>
      </div>
      <div class="post" style="background-color: hsla(289,97%,49%,0.3) ; width: auto; max-width: 300px ; height: auto; max-height: 400px ; border : 0px ;  font-family: cursive,sans-serif; font-size: 20px ; overflow: scroll; margin: 30px">$tpost</div>
      </div>
      <div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
      <hr size="6px" noshade color="black">
_end;
    }

    else if($tpost!="NULL")
    {
    echo<<<_end
          <div class="post" style="background-color: hsla(289,97%,49%,0.3) ; border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 5% ; width: auto; max-width: 300px ;height: auto; max-height: 400px ; min-height: 100px ; overflow: scroll ; padding: 10px ; border: 0px ; padding: 10px ; font-family: cursive,sans-serif; font-size: 20px">$tpost</div>
          <div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 39% ; font-size:15px">$time</span></div>
                <hr size="6px" noshade color="black">
_end;
    }

    else if($ppost!="NULL")
    {
    echo<<<_end
      <div style=" border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 10% ; width: auto; max-width: 500px ;height: auto; max-height: 400px ; min-height: 100px ;"><img src="$ppost" height=400px width=500px></div>
      <div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
            <hr size="6px" noshade color="black">
_end;
    }
    
$u=$u+1;
   }
 }
 echo "</div>";
}


echo<<<_end
            </div>
          </div>
        </div>
       </div>
_end;

echo<<<_end
   <div class="col-sm-12">
            <div class="panel-body">
          <div class="well">
          	<ul style="list-style-type: none" >
			<li class="display"><a href="myposts.php">My Posts</a></li>
            &nbsp; &nbsp; &nbsp; &nbsp;
			<li class="display"><a href="otherposts.php">Other Posts</a></li>
			</ul>
			</div>
		</div>
	</div>
</body>
</html>
_end;
?>