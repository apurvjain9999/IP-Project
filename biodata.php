<?php
echo<<<_end
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bio Data</title>
	<link rel="stylesheet" href="newaccount.css">

</head>

<body>
	<header>
		<h1>F</h1>
    </header>
    <div class="main-content">
    	 <form class="form-labels-on-top" method="post" action="biodata.php">

            <div class="form-title-row">
                <h1>Enter Your Details</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
            </div>

			<div class="form-row">
                <label>
                    <span>Phone</span>
                    <input type="digit" name="phone" maxlength="10" min="1000000000" max="9999999999" size="20"/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Hometown</span>
                    <input type="text" name="home" required/>
                </label>
            </div>
			
           
			
            <div class="form-row">
                <label>
                    <span>Current City</span>
                    <input type="text" name="current" required/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Work at:</span>
                    <input type="text" name="work" required/>
                </label>
            </div>
            
        

            <div class="form-row">
                <button type="submit" value="submit">Sign Up</button>
            </div>

        </form>

    </div>

</body>

</html>
_end;
?>