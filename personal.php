<?php
    session_start();
    $username = $_SESSION['username'];
    echo $username."*";
    include("dbConfig.php");
    $userId = (string)$_SESSION['userid'];
    $query = "SELECT * FROM notes WHERE `user_id` =".$userId;
    $notesDounter = 0;
    $us = mysqli_query($dbcnx, $query);
    if($us)
            {
                while($notes = mysqli_fetch_array($us, MYSQLI_ASSOC))
                {
                    $notesCounter++;
                }
    }
    $query = "SELECT * FROM users WHERE `user_id` =".$userId;
    $us = mysqli_query($dbcnx, $query);
    $users = mysqli_fetch_array($us, MYSQLI_ASSOC);
    echo $notesCounter."+".$users['email']."%";

?>
