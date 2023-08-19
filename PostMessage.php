<!-- Chapter Message Board Project -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post A Message</title>
</head>
<body style="text-align: center;">
	<?php
		// Check first to see if the form has even been submitted
		if(isset($_POST["submit"])) {
			$name = stripslashes($_POST["name"]);
			$subject = stripslashes($_POST["message"]);
			$message = stripslashes($_POST["message"]);

			// Replace any '~' with '-' characters
			$name = str_replace("~", "-", $name);
			$subject = str_replace("~", "-", $subject);
			$message = str_replace("~", "-", $name);

			// Combine the three variables into one string
			$messageRecord = "$name~$subject~$message\n";

			// let's create a variable to store a new file's data
			$messageFile = fopen("messages.txt", "a");

			// Check that there are no issues with the file before we aadd the new message to it
			if($messageFile === false) {
				echo "<h3 style='color: red;'>There was an error saving your message!</h3>";
			} else {
				fwrite($messageFile, $messageRecord);
				fclose($messageFile);
				echo "<h3>Your message has been saved!</h3>";
			}
		}
	?>

	<h1>Post New Message</h1>
	<hr/>
	<form action="PostMessage.php" method="post">
		<label style="font-weight: bold;" for="user">User's Name:</label>
		<input type="text" id="user" name="name" />
		<br/>
		<br/>
		<label style="font-weight: bold;" for="subject">Subject:</label>
		<input type="text" id="subject" name="subject" />
		<br/>
		<br/>
		<textarea name="message" rows="6" cols="80"></textarea>
		<br/>
		<br/>
		<input type="submit" name="submit" value="Post Message" /> &nbsp; &nbsp;
		<input type="reset" value="Reset Form" />
		</form>
		<hr/>
		<p><a href="MessageBoard.php">View Messages</a></p>  
</body>
</html>