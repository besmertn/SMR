<?php
        session_start();
        include "dbConfig.php";
        $userName = $_SESSION['username'];
        $userId = $_SESSION['userid'];
        $_SESSION['check'] = false;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `SMP`.`notes` (`note_id`, `date`, `title`, `content`, `user_id`) VALUES (NULL, '".$date."', '".$title."', '".$content."', ".$userId.")";
        mysqli_query($dbcnx, $query);
        mysqli_close($dbcnx);
        header("Location:main.html");
    ?>
