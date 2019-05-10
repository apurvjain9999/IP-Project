<?php
session_start();
echo<<<_end
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Username</title>
<style type="text/css">
.h1 {
	margin-left: 0%;
	position: absolute;
	margin-top: 5%;
	color: #0C6;
	left: 136px;
	top: 30px;
	width: 313px;
	height: 169px;
}
.h1 {
	font-family: Palatino Linotype, Book Antiqua, Palatino, serif;
}
.new_user {
	margin-top: 10%;
	margin-left: 20%;
	position: absolute;
}
.data {
	color: #09F;
	margin-left: 20%;
	position: absolute;
}
   #go a{
      margin-right: 12px;
      color:white;
      text-decoration: none;
    }

 #go a button{
      display: inline-block;
      height: 40px;
      background-color: black;
      color:white;
      border:0px;
      font-family: sans-serif;
      font-size: 15px;
    }
</style>
</head>

<body>
<div style="border:2px solid; width:100%; margin-bottom:10px; height:50px;
background-color: black" >
  <a href="first.php"><button>Home</button></a>
  <a href="allfriends.php"><button>Friends</button></a>
  <a href="userson.php"><button>All Users</button></a>
  <a href="loadfriends.php"><button>Messages</button></a>
  <a href="myposts.php"><button>My Posts</button></a>
  <a href="otherposts.php"><button>Other Posts</button></a>
  <a href="exsettings.php"><button>Settings</button></a>
  <a href="logout.php"><button>Logout</button></a>
</div>
    <form method="post" action="changename.php">
	<h1 align="center" class="h1">&nbsp;</h1>
	<p>&nbsp;</p>
<p>&nbsp;</p>
	<h1 align="center" class="h1">&nbsp;</h1>
	<p>&nbsp;</p>
	<h1 align="center" class="h1"><span class="h1">Change <strong>Username</strong></span><strong></strong></h1>
	<p>&nbsp;</p>
    <br/><br/><br/>
    <label class="data">Enter your New Firstname</label>
	<input name="newfname" type="text" class="new_user" placeholder="Enter your new fname" maxlength="20"/>
	<label class="data">Enter your New Lastname</label>
	<input name="newlname" type="text" placeholder="Enter your new lname" maxlength="20"/>
	<input type="submit" value="change">
	</form>
</body>
</html>
_end;
?>