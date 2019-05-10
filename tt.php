<?php
echo<<<_end
<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<link rel="stylesheet" type="text/css" href="chat.css"/>
</head>
<body>
		<div class="chatbox">
			<div class="chatlogs">

		   		<div class="chat self">
		    	    <div class="user-photo"></div>
				    <p class="chat-message"></p>
	    	    </div>
				<div class="chat friend">
					<div class="user-photo"></div>
					<p class="chat-message"></p>
				</div>

			</div>
			<form action="youchat.php" method="POST">
			<div class="chat-form">
				<textarea name="smsMessage"></textarea>
				<input type="hidden" name="identity" value='$fid'/>
				<button type="submit">Send</button>
			</div>	
			</form>
		
		 </div>			

</body>
</html>
_end;
?>