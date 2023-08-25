<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Message</title>
</head>
<body style="text-align:center;">
<?php
    //form submission check
    if(isset($_POST["submit"])){
        $name = stripslashes($_POST["user_id"]);
        $subject = stripslashes($_POST["subject"]);
        $message = stripslashes($_POST["message"]);
        // replace ~ with -
        $name = str_replace("~","-",$name);
        $subject = str_replace("~","-",$subject);
        $message = str_replace("~","-",$message);
        //concatenate and save strings
        $messageRecord = "$name~$subject~$message\n";
        $messageFile = fopen("messages.txt" ,"a");

        //error check file
        if($messageFile === false){
            echo "<h3 style='color: red;'> There was an error saving your message</h3>";
        } else{
            fwrite($messageFile, $messageRecord);
            fclose($messageFile);
            echo "<h3>Your message has been saved</h3>";
        }
    }
?>
<h1>Post New Message</h1>
<hr>
<form action="postMessage.php" method="post">
    <label" for="user">User's Name:</label>
    <input type="text" name="user_id" id="user">
    <br>
    <br>
    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject">
    <br>
    <br>
    <textarea name="message" rows="6" cols="80"></textarea>
    <br>
    <br>
    <input type="submit" value="Post Message" name="submit">
    &nbsp; &nbsp; 
    <input type="reset" value="Reset Form">
</form>
<hr>
<p><a href="messageBoard.php">View Messages</a></p>



</body>
</html>