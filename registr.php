<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $email = $_POST['email'];
    include "dbConfig.php";
    $query = "INSERT INTO `SMP`.`users` (`name`, `password`, `email`, `user_id`) VALUES ('".$username."', '".$password."', '".$email."', NULL)";
    echo $query;
    mysqli_query($dbcnx,$query);
    $query = "CREATE TABLE `SMP`.`notes_".$username."` ( `note_id` INT(20) NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL , `title` CHAR(60) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`note_id`)) ENGINE = InnoDB;";
    mysqli_query($dbcnx,$query);
    mysqli_close($dbcnx);
?>
