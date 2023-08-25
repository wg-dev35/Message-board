<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Message Board</title>
</head>
<body>
    <h1>Message Board</h1>
    <?php
        //data validotrion check
        if(file_exists("messages.txt") === false || filesize("messages.txt")=== 0){
            echo "<p>Sorry, there are no messages posted.</p>";
        }else {
            $messageArray = file("messages.txt");
            echo "<table style='background-color: lightgray;' border='1' width='100%'>\n";
            //message counter
            $count = count($messageArray);

            //build message board based on posts
            for($i = 0; $i < $count; ++$i) {
                $currMsg = explode("~", $messageArray[$i]);

                echo "<tr>\n";
                echo "<th width = '5%'>", ($i + 1), "</th>";
                echo "<td width = '95%'>Name: ", htmlentities($currMsg[0]), "<br>\n";
                echo "<span style= 'font-weight: bold; text-decoration: underline;'>Subject: ", htmlentities($currMsg[1]), "<br>\n";
                echo "<stong>Message: </strong><br>", htmlentities($currMsg[2]), "</td>\n";
                echo "<tr>\n";
            }
            echo "</table>\n";
        }
    ?>
    <p><a href="postMessage.php">Post New Message</a></p>
</body>
</html>