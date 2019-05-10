<?php
echo<<<_end
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Create New Account</title>
	<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	}

    function exist()
    {
      document.getElementById("btn").disabled=true;
      document.getElementById("warn").innerHTML="Id already exists.Please set a different id.";
    }
    function notexist()
    {
      document.getElementById("btn").disabled=false;
      document.getElementById("warn").innerHTML="Its alright.";
    }




  var XMLHttpRequestObject = false;   
    if (window.XMLHttpRequest)
     { 
      XMLHttpRequestObject = new XMLHttpRequest();
     } 
     else if (window.ActiveXObject)
      { 
        XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
      }  
      function getData(dataSource)
      {
        var a=document.getElementById("identity").value;

        if(XMLHttpRequestObject) 
            {
              XMLHttpRequestObject.open("POST", dataSource);
            XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');   

            XMLHttpRequestObject.onreadystatechange =function()    
             { 
               if (XMLHttpRequestObject.readyState == 4 &&
                XMLHttpRequestObject.status == 200)
                 { 
                   var b = XMLHttpRequestObject.responseText;
                   if(b==1)
                   {
                    notexist();
                   }
                   else if(b==0)
                   {
                    exist();
                   }
                 } 
             }   
          XMLHttpRequestObject.send("id="+a);       
             } 
       }  
	</script>
	<link rel="stylesheet" href="newaccount.css">

</head>

<body>
	<header>
		<h1>F</h1>
    </header>
    <div class="main-content">
    	 <form class="form-labels-on-top" method="post" action="newaccount.php">

            <div class="form-title-row">
                <h1>Sign Up</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>First Name</span>
                    <input type="text" name="fname"/>
                </label>
            </div>

			<div class="form-row">
                <label>
                    <span>Last Name</span>
                    <input type="text" name="lname"/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>ID:</span>
                    <input type="text" name="id" id="identity" onblur="getData('uniqueid.php')" required="required"/>
                </label>
            </div>
            <div id="warn" class="form-row">
            </div>
			
            <div class="form-row">
                <label>
                    <span>Password:</span>
                    <input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /input type="text" name="id" required="required"/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                   <input type="checkbox" onclick="myFunction()"/><span>Show Password</span>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Birthday:</span>
                    <input type="date" name="dob" value="1960-01-01"/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Security Question</span>
                    <select name="sques">
                        <option value="1">What is your first teacher's name?</option>
                        <option value="2">What is your mother's birth place?</option>
                        <option value="3">Who is your favorite actor, musician, or artist?</option>
                        <option value="4">In what city or town did your mother and father meet?</option>
                        <option value="5">What is your maternal grandmother's maiden name?</option>
                        <option value="6">In what city or town was your first job?</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Ans:</span>
                    <input type="text" name="ans"/>
                </label>
            </div>

            <div class="form-row">
                <label><span>Gender</span></label>
                <div class="form-radio-buttons">

                    <div>
                        <label>
                            <input type="radio" name="gender" value="male"/>
                            <span>Male</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="gender" value="female" />
                            <span>Female</span>
                        </label>
                    </div>
                    
                </div>
            </div>

            <div class="form-row">
                <button type="submit" id="btn" value="submit">Sign Up</button>
            </div>

        </form>

    </div>

</body>

</html>
_end;
?>