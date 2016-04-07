<?php
        session_start();
        include "dbConfig.php";
        $userName = $_SESSION['username'];
        $_SESSION['check'] = false;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `SMP`.`notes_".$userName."` (`note_id`, `date`, `title`, `content`) VALUES (NULL, '".$date."', '".$title."', '".$content."')";
        mysqli_query($dbcnx, $query);
        mysqli_close($dbcnx);
        header("Location:main.html");
    ?>
